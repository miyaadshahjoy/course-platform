<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\CourseModel; 
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Middlewares\LoggerMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\AdminMiddleware;
use App\Core\Flash;




class AdminDashboardController extends Controller {
    private $courseObject;
    private $userObject;
    private $categoryObject;
    protected $request;
    protected $middlewares = [
        'index' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'courses' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'createCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'viewCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'editCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'updateCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'publishCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'draftCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'archiveCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'deleteCourse' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'users' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'viewUser' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'deleteUser' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'settings' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],

        'categories' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],
        'createCategory' => [LoggerMiddleware::class, AuthMiddleware::class, AdminMiddleware::class],

    ];

    public function __construct($request) {
        $this->courseObject = new CourseModel();
        $this->userObject = new UserModel();
        $this->categoryObject = new CategoryModel();
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

    public function createCourse() {
        $categories = $this->categoryObject->getAllCategories();
        $this->adminView('create-course', ['categories' => $categories]);
    }

    public function viewCourse($slug){


        $course = $this->courseObject->getCourseBySlug($slug);
        if(!$course):
            Flash::set('error', "Course not found.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $this->adminView('view-course', ['course' => $course]);
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
            Flash::set('error', "Error moving uploaded file.");
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
            ];
            $result = $this->courseObject->createCourse($data);
            if (!$result):
                Flash::set('error', "Error creating course.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            Flash::set('success', "Course created successfully.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;

        }
    }

    public function editCourse($id) {

        $course = $this->courseObject->getCourseById($id);
        $categories = $this->categoryObject->getAllCategories();

        if(!$course):
            Flash::set('error', "Course not found.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;

        $this->adminView('edit-course', [
            'course' => $course,
            'categories' => $categories
        ]);

    }

    public function updateCourse() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            $id = $_POST['id'];
            $course = $this->courseObject->getCourseById($id);
            if(!$course):
                Flash::set('error', "Course not found.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $course_title = $_POST['course_title'];
            $course_description = $_POST['course_description'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $difficulty_level = $_POST['difficulty_level'];
            $duration = $_POST['duration'];
            if($_FILES['thumbnail']['error'] != 4):
                $thumbnailPath = $this->handleThumbnailUpload();
            else:
                $thumbnailPath = $course['THUMBNAIL'];
            endif;

            if (empty($course_title) || empty($course_description) || empty($category) || empty($price) || empty($difficulty_level) || empty($duration)) {
                Flash::set('error', "All fields are required.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            }


            $data = [
                'course_title' => $course_title,
                'course_description' => $course_description,
                'category' => $category,
                'price' => $price,
                'difficulty_level' => $difficulty_level,
                'duration' => $duration,
                'thumbnail' => $thumbnailPath,
                'slug' => $this->generateSlug($course_title),
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

    public function deleteCourse($id) {
        if(!$id):
            Flash::set('error', "Invalid ID.");
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

    public function publishCourse($id){
        if(!$id):
            Flash::set('error', "Invalid ID.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $result = $this->courseObject->publish($id);
        if(!$result):
            Flash::set('error', "Error publishing course.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        Flash::set('success', "Course published successfully.");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function draftCourse($id){
        if(!$id):
            Flash::set('error', "Invalid ID.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $result = $this->courseObject->draft($id);
        if(!$result):
            Flash::set('error', "Error drafting course.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        Flash::set('success', "Course drafted successfully.");
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    public function archiveCourse($id){
        if(!$id):
            Flash::set('error', "Invalid ID.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $result = $this->courseObject->archive($id);
        if(!$result):
            Flash::set('error', "Error archiving course.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        Flash::set('success', "Course archived successfully.");
        header("Location:" . $_SERVER['HTTP_REFERER']);
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

    public function viewUser($id) {

        $user = $this->userObject->findById($id);
        $this->adminView('user-details', ['user' => $user]);
    }
    public function deleteUser($id) {

        if(!$id):
            Flash::set('error', "Invalid ID.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $result = $this->userObject->deleteUser($id);
        if(!$result):
            Flash::set('error', "Error deleting user.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;

        Flash::set('success', "User deleted successfully.");
        header("Location:" . $_SERVER['HTTP_REFERER']);
        
    }
    public function settings() {
        $user = $this->userObject->findByUsername('adminuser');
        $this->adminView('account-settings', ['user' => $user]);
    }

    public function categories(){
        $categories = $this->categoryObject->getAllCategories();
        $this->adminView('categories', ['categories' => $categories]);

    }

    public function createCategory(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'):

            $category = $_POST['category_name'];
            if(empty($category)):
                Flash::set('error', "No category provided.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;
            $data = [
                'category_name' => $category
            ];
            $result = $this->categoryObject->createCategory($data);
            if(!$result):
                Flash::set('error', "Error creating category.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;
            Flash::set('success', "Category created successfully.");
            header("Location: /admin/categories");
            exit;
        endif;

    }
}

?>