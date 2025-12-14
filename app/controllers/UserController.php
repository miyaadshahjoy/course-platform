<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;
use App\Middlewares\LoggerMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\UserMiddleware;
use App\Core\Flash;

class UserController extends Controller {

    private $userObject;
    protected $request;
    protected $middlewares = [
        'index' => [LoggerMiddleware::class, AuthMiddleware::class, UserMiddleware::class],
        'dashboard' => [LoggerMiddleware::class ,AuthMiddleware::class, UserMiddleware::class],
        'updatePicture' => [LoggerMiddleware::class ,AuthMiddleware::class],
        'updateProfile' => [LoggerMiddleware::class ,AuthMiddleware::class],
        'updatePassword' => [LoggerMiddleware::class ,AuthMiddleware::class],
    ];

    public function __construct($request) {
        $this->userObject = new UserModel();
        $this->request = $request;
    }

    public function getMiddlewares($method){
        return $this->middlewares[$method] ?? [];
    }
    public function index(){
        $id = $_SESSION['user_id'];
        $user = $this->userObject->findById($id);
        $this->view('user/account-settings', ['user' => $user]);
    }

    public function dashboard(){

        $this->userView('dashboard');
    }

    public function updatePicture(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            $imagePath = $this->handleImageUpload(); 

            if (!$imagePath):
                Flash::set('error', "Error uploading image.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                Flash::set('error', "User not found.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $data = [
                'fullname' => $user['FULLNAME'],
                'username' => $user['USERNAME'],
                'email' => $user['EMAIL'],
                'password' => $user['PASSWORD'],
                'role' => $user['ROLE'],
                'image' => $imagePath ?? $user['IMAGE'],
            ];

            $result = $this->userObject->updateUser($user['ID'], $data);

            if (!$result):
                Flash::set('error', "Error updating user picture.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            Flash::set('success', "Profile picture updated successfully.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            
        endif;
    }

    public function updateProfile(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            if(empty($fullname) || empty($username) || empty($email)):
                Flash::set('error', "All fields are required.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                Flash::set('error', "User not found.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;


            $data = [
                'fullname' => $fullname ?? $user['FULLNAME'],
                'username' => $username ?? $user['USERNAME'],
                'email' =>  $email ?? $user['EMAIL'] ,
                'password' => $user['PASSWORD'],
                'role' =>  $user['ROLE'],
                'image' =>  $user['IMAGE'],
            ];

            $result = $this->userObject->updateUser($user['ID'], $data);

            if (!$result):
                Flash::set('error', "Error updating user profile.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            Flash::set('success', "Profile updated successfully.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            
        endif;

    }

    public function updatePassword(){
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'):

            # current_password
            # new_password
            # confirm_password
            
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if(empty($current_password) || empty($new_password) || empty($confirm_password)):
                Flash::set('error', "All fields are required.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                Flash::set('error', "User not found.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            if(!password_verify($current_password, $user['PASSWORD'])):
                Flash::set('error', "Current password is incorrect.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            if($new_password !== $confirm_password):
                Flash::set('error', "New password and confirm password do not match.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            

            $data = [
                'fullname' => $user['FULLNAME'],
                'username' => $user['USERNAME'],
                'email' => $user['EMAIL'] ,
                'password' => $hashedPassword ?? $user['PASSWORD'],
                'role' =>  $user['ROLE'],
                'image' =>  $user['IMAGE'],
            ];

            $result = $this->userObject->updateUser($user['ID'], $data);

            if (!$result):
                Flash::set('error', "Error updating user password.");
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            endif;

            Flash::set('success', "Password updated successfully.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            
        endif;

    }


    private function handleImageUpload() {
        if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK):
            Flash::set('error', "Failed to upload image.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        endif;
        $uploadDir = __DIR__ . '/../../public/uploads/users/';
        if (!is_dir($uploadDir)):
            mkdir($uploadDir, 0755, true);
        endif;
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadFileName = 'user' . '-' . time() . '-' . rand(1000, 9999) . '.' . $ext;
        $uploadFilePath = $uploadDir . $uploadFileName;
        if(!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)):
            Flash::set('error', "Failed to move uploaded file.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
            return null;
        endif;
        return $uploadFileName;
    }
}

?>