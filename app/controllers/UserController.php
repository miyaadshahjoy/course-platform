<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;

class UserController extends Controller {

    private $userObject;

    public function __construct() {
        $this->userObject = new UserModel();
    }

    public function index(){

        $this->view('user/account-settings', []);
    }

    public function dashboard(){

        $this->userView('dashboard');
    }
}

?>