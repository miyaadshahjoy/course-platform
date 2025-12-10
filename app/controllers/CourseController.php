<?php 
namespace App\Controllers;
use App\Core\Controller;
use App\Models\CourseModel;


class CourseController extends Controller {
    private $courseObject;

    public function __construct() {
        $this->courseObject = new CourseModel();
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
}
