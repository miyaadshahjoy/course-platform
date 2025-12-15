<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\DB;

class HomeController extends Controller {
    public function index() {
        # 'home' - the view file name
        return $this->view('home'); # Renders views/home.php
    }
    public function courses() {
        # 'home' - the view file name
        return $this->view('courses'); # Renders views/home.php
    }

    public function about() {
        # 'home' - the view file name
        return $this->view('about'); # Renders views/home.php
    }

    # Test DB connection
    public function testDB() {
        DB::connect();
    }

}
?>