<?php 
namespace App\Controllers;
use App\Core\DB;
use App\Core\Controller;
use App\Models\UserModel;
use App\Core\Flash;

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
            Flash::set('error', "Invalid email format.");
            header("Location: /signup");
            return;
        endif;

        if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($password_confirm)):
            Flash::set('error', "All fields are required.");
            header("Location: /signup");
            return;
        endif;
        if($password !== $password_confirm):
            Flash::set('error', "Passwords do not match.");
            header("Location: /signup");
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
            
            Flash::set('error', "Error creating user.");
            header("Location: /signup");
            return;
        endif;

        Flash::set('success', "Signup successfull!");
        header("Location: /signin");
        exit;

    }


    # /signin [POST]
    public function signin(){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)):
            Flash::set('error', "Email and password are required.");
            header("Location: /signin");
            return;
        endif;
        
        
        $user_object = new UserModel();
        $user = $user_object->findByEmail($email);
        if(!$user):
            Flash::set('error', "The user with this email does not exist.");
            header("Location: /signin");
            return;
        endif;
        
        if(!password_verify($password, $user['PASSWORD'])):
            Flash::set('error', "Incorrect password.");
            header("Location: /signin");
            return;
        endif;
        
        # Set session variables
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_fullname'] = $user['FULLNAME'];
        $_SESSION['user_email'] = $user['EMAIL'];
        $_SESSION['user_image'] = $user['IMAGE'];
        $_SESSION['user_role'] = $user['ROLE'];

        if ($user['ROLE'] === 'admin'):
            Flash::set('success', "Signin successful!");
            header("Location: /admin");
            exit;
        endif;
        Flash::set('success', "Signin successful!");

        header("Location: /");
        exit;

    }


    public function logout(){

        unset($_SESSION['user_id']);
        unset($_SESSION['user_fullname']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_image']);
        unset($_SESSION['user_role']);

        
        Flash::set('success', "Successfully logged out!");
        // session_destroy();
        header("Location: /signin");
        exit;
    
    }

}

?>