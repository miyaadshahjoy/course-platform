<?php 
namespace App\Controllers;
use App\Core\DB;
use App\Core\Controller;
use App\Models\UserModel;

class AuthController extends Controller {
    public function signinPage(){
        return $this->view('signin');
    }

    public function signupPage(){
        return $this->view('signup');
    }

    
    # /signup [POST]
    public function signup(){
        
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        
        # TODO: Password strength validation
        # TODO: CSRF protection
        # TODO: Sanitize inputs
        # TODO: Check if username or email already exists

        # Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            echo "Invalid email format.";
            return;
        endif;

        if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($password_confirm)):
            echo "All fields are required.";
            return;
        endif;
        if($password !== $password_confirm):
            echo "Passwords do not match.";
            return;
        endif;

        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'password' => $password_hashed,
        ];
        
        $user = new UserModel();
        $result = $user->createUser($data);

        if(!$result):
            
            echo "Error creating user.";
            return;
        endif;

        echo "✅ User created successfully!";

    }


    # /signin [POST]
    public function signin(){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)):
            echo "Email and password are required.";
            return;
        endif;


        $user_object = new UserModel();
        $user = $user_object->findByEmail($email);
        if(!$user):
            echo "The user with this email does not exist. <br>";
            return;
        endif;

        if(!password_verify($password, $user['PASSWORD'])):
            echo "Incorrect password. <br>";
            return;
        endif;
        
        # Set session variables
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_email'] = $user['EMAIL'];
        $_SESSION['user_role'] = $user['ROLE'];

        if ($user['ROLE'] === 'admin'):
            header("Location: /admin");
            exit;
        endif;

        header("Location: /users");
        exit;

    }


    public function logout(){

        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_role']);

        session_destroy();

        echo "✅ Signout successful!";
        header("Location: /signin");
    
    }

}



?>