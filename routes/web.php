<?php

$routes = [
    'GET' => [
        '/' => ['App\Controllers\HomeController', 'index'],
        '/test-db' => ['App\Controllers\HomeController', 'testDB'],
        '/signup' => ['App\Controllers\AuthController', 'signupPage'], # [GET] /signup
        '/signin' => ['App\Controllers\AuthController', 'signinPage'], # [GET] /signin
        '/logout' => ['App\Controllers\AuthController', 'logout'], # [GET] /logout
        '/admin' => ['App\Controllers\AdminDashboardController', 'index'], # [GET] /admin
        '/admin/courses/create' => ['App\Controllers\AdminDashboardController', 'create'], # [GET] /admin/courses/create
        '/admin/courses' => ['App\Controllers\AdminDashboardController', 'courses'], # [GET] /admin/courses
        '/admin/users' => ['App\Controllers\AdminDashboardController', 'users'], # [GET] /admin/users
        '/admin/account-settings' => ['App\Controllers\AdminDashboardController', 'settings'], # [GET] /admin/account-settings

        '/users' => ['App\Controllers\UserController', 'index'], # [GET] /users
        '/users/dashboard' => ['App\Controllers\UserController', 'dashboard'], # [GET] /users/dashboard




    ],
    
    'POST' => [
        '/signup' => ['App\Controllers\AuthController', 'signup'], # [POST] /signup
        '/signin' => ['App\Controllers\AuthController', 'signin'], # [POST] /signin
        '/admin/courses/store' => ['App\Controllers\AdminDashboardController', 'store'], # [POST] /admin/courses/store

        '/user/update-picture' => ['App\Controllers\UserController', 'updatePicture'],
        '/user/update-profile' => ['App\Controllers\UserController', 'updateProfile'],
        '/user/update-password' => ['App\Controllers\UserController', 'updatePassword'],


    ]
];

?>