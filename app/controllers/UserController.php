<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;
use App\Middlewares\LoggerMiddleware;
use App\Middlewares\AuthMiddleware;

class UserController extends Controller {

    private $userObject;
    protected $request;
    protected $middlewares = [
        'index' => [LoggerMiddleware::class, AuthMiddleware::class],
        'dashboard' => [LoggerMiddleware::class ,AuthMiddleware::class]
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
                echo "No image were uploaded.";
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                echo "User not found.";
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
                echo "Error updating user picture.";
                exit;
            endif;

            echo "✅ Picture updated successfully.";
            header("Location:" . $_SERVER['HTTP_REFERER']);
            
        endif;
    }

    public function updateProfile(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            if(empty($fullname) || empty($username) || empty($email)):
                echo "All fields are required.";
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                echo "User not found.";
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
                echo "Error updating user profile.";
                exit;
            endif;

            echo "✅ Profile updated successfully.";
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
                echo "All fields are required.";
                exit;
            endif;

            $user = $this->userObject->findById($_SESSION['user_id']);

            if (!$user):
                echo "User not found.";
                exit;
            endif;

            if(!password_verify($current_password, $user['PASSWORD'])):
                echo "Incorrect current password.";
                exit;
            endif;

            if($new_password !== $confirm_password):
                echo "New password and confirm password do not match.";
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
                echo "Error updating password.";
                exit;
            endif;

            echo "✅ Password updated successfully.";
            header("Location:" . $_SERVER['HTTP_REFERER']);
            
        endif;

    }


    private function handleImageUpload() {
        if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK):
            echo "Error uploading image.";
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
            echo "Failed to move uploaded file.";
            return null;
        endif;
        return $uploadFileName;
    }
}

?>