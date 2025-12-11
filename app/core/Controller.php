<?php
namespace App\Core;

class Controller {
    protected function view($file, $data = []) {
        extract($data);
       
        require_once __DIR__ . '/../views/' . $file . '.php';
    }
    protected function adminView($view, $data = []) {
        extract($data);
        ob_start(); # What is ob_start()? answer: It turns on output buffering

        
        require_once __DIR__ . '/../views/admin/' . $view . '.php';
        $content = ob_get_clean(); # What is ob_get_clean()? answer: It gets the current buffer contents and delete current output buffer
       
        require_once __DIR__ . '/../views/layouts/admin-layout.php';
    }
    protected function userView($view, $data = []) {
        extract($data);
        ob_start(); # What is ob_start()? answer: It turns on output buffering

        
        require_once __DIR__ . '/../views/user/' . $view . '.php';
        $content = ob_get_clean(); # What is ob_get_clean()? answer: It gets the current buffer contents and delete current output buffer
       
        require_once __DIR__ . '/../views/layouts/user-layout.php';
    }
}



?>