<?php 
namespace App\Controllers;
use App\Core\Controller;
use App\Models\CourseModel;
use App\Core\Flash;


class CourseController extends Controller {
    private $courseObject;
    protected $request;
    protected $middlewares = [
        'index' => [LoggerMiddleware::class],
    ];

    public function __construct($request) {
        $this->courseObject = new CourseModel();
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

        $this->view('admin', [ 'courses' => $courses, 'analytics' => $analyticsData ]);

    }

    public function create() {
        $this->view('admin', []);
    }

    private function handleThumbnailUpload() {
        if(!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK):
            Flash::set('error', "Error uploading thumbnail.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
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
            Flash::set('error', "Failed to move uploaded file.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            return null;
        endif;
        return $uploadFileName;
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $thumbnailPath = $this->handleThumbnailUpload();
            if(!$thumbnailPath):
                Flash::set('error', "Error uploading thumbnail.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
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
                Flash::set('error', "Error creating course.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            Flash::set('success', "Course created successfully.");
            header("Location: /admin/courses");
            exit;

        }
    }

    public function edit($id) {
        $course = $this->courseObject->getCourseById($id);
        if(!$course):
            Flash::set('error', "Course not found.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
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
                Flash::set('error', "Error updating course.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;
            Flash::set('success', "Course updated successfully.");
            header("Location: /admin/courses");
            exit;

        endif;

    }

    public function delete($id) {
        if(!$id):
            Flash::set('error', "Error deleting course.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $result = $this->courseObject->deleteCourse($id);
        if(!$result):
            Flash::set('error', "Error deleting course.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        Flash::set('success', "Course deleted successfully.");
        header("Location: /admin/courses");
        exit;
    }

    // TODO: preg_replace()
    public function generateSlug($title) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
        return $slug;

    }

    public function show($slug){


        $course = $this->courseObject->getCourseBySlug($slug);
        if(!$course):
            Flash::set('error', "Course not found.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $this->view('course/view', ['course' => $course]);
    }
}
