<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\CourseModel; 
use App\Models\UserModel;
use App\Middlewares\LoggerMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\AdminMiddleware;



class AdminDashboardController extends Controller {
    private $courseObject;
    private $userObject;
    protected $request;
    protected $middlewares = [
        'index' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
    ];

    public function __construct($request) {
        $this->courseObject = new CourseModel();
        $this->userObject = new UserModel();
        $this->request = $request;
    }
    public function getMiddlewares($method) {
        return $this->middlewares[$method] ?? [];
    }


    public function index() {
        
        $courses = $this->courseObject->getAllCourses();

        $analyticsData = [
            'totalCourses' => $this->courseObject->getTotalCourses(),
            'publishedCourses' => $this->courseObject->getCourseCountByStatus('published'),
            'draftCourses' => $this->courseObject->getCourseCountByStatus('draft'),
            'coursesByCategory' => $this->courseObject->getCourseCountByCategories(),
        ];

        $this->adminView('dashboard', [
            'courses' => $courses,
            'analyticsData' => $analyticsData
        ]);
    }
    public function courses() {
        $courses = $this->courseObject->getAllCourses();
        $this->adminView('courses', ['courses' => $courses]);
    }

    public function create() {
        $this->adminView('create-course', []);
    }

    private function handleThumbnailUpload() {
        if(!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK):
            echo "Error uploading thumbnail.";
            exit;
        endif;
        $uploadDir = __DIR__ . '/../../public/uploads/thumbnails/';
        if (!is_dir($uploadDir)):
            mkdir($uploadDir, 0755, true);
        endif;
        $ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        $uploadFileName = basename($_FILES['thumbnail']['name'], '.' . $ext) . '-' . time() . '-' . rand(1000, 9999) . '.' . $ext;
        $uploadFilePath = $uploadDir . $uploadFileName;
        if(!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadFilePath)):
            echo "Failed to move uploaded file.";
            return null;
        endif;
        return $uploadFileName;
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $thumbnailPath = $this->handleThumbnailUpload();
            if(!$thumbnailPath):
                echo "Thumbnail upload failed.";
                exit;
            endif;
            $data = [
                'course_title' => $_POST['course_title'],
                'course_description' => $_POST['course_description'],
                'thumbnail' => $thumbnailPath,
                'category' => $_POST['category'],
                'price' => $_POST['price'],
                'slug' => $this->generateSlug($_POST['course_title']),
                'difficulty_level' => $_POST['difficulty_level'],
                'duration' => $_POST['duration'],
                'status' => $_POST['status'] 
            ];
            $result = $this->courseObject->createCourse($data);
            if (!$result):
                echo "Error creating course.";
                exit;
            endif;

            echo "✅ Course created successfully.";
            // header("Location: $_SERVER['HTTP_REFERER']");
            exit;

        }
    }

    public function edit($id) {
        $course = $this->courseObject->getCourseById($id);
        if(!$course):
            echo "Course not found.";
            exit;
        endif;

        $this->view('admin', ['course' => $course]);

    }

    public function update($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'):

            $thumbnailPath = $this->handleThumbnailUpload() ?? $_POST['thumbnail'];
            
            $data = [
                'course_title' => $_POST['course_title'],
                'course_description' => $_POST['course_description'],
                'thumbnail' => $thumbnailPath,
                'category' => $_POST['category'],
                'price' => $_POST['price'],
                'slug' => $this->generateSlug($_POST['course_title']),
                'difficulty_level' => $_POST['difficulty_level'],
                'duration' => $_POST['duration'],
                'status' => $_POST['status'] 
            ];

            $result = $this->courseObject->updateCourse($id, $data);
            if(!$result):
                echo "Error updating course.";
                exit;
            endif;
            echo "✅ Course updated successfully.";

        endif;

    }

    public function delete($id) {
        if(!$id):
            echo "Invalid course ID.";
            exit;
        endif;
        $result = $this->courseObject->deleteCourse($id);
        if(!$result):
            echo "Error deleting course.";
            exit;
        endif;
        echo "✅ Course deleted successfully.";
    }

    // TODO: preg_replace()
    public function generateSlug($title) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
        return $slug;

    }

    public function users() {

        $users = $this->userObject->getAllUsers();
        $this->adminView('users', ['users' => $users]);

    }
    public function settings() {
        $user = $this->userObject->findByUsername('adminuser');
        $this->adminView('account-settings', ['user' => $user]);
    }
}

?>