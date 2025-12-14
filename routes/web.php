<?php

$routes = [
    'GET' => [
        '/' => ['App\Controllers\HomeController', 'index'],
        '/test-db' => ['App\Controllers\HomeController', 'testDB'],
        '/signup' => ['App\Controllers\AuthController', 'signupPage'], # [GET] /signup
        '/signin' => ['App\Controllers\AuthController', 'signinPage'], # [GET] /signin
        '/logout' => ['App\Controllers\AuthController', 'logout'], # [GET] /logout
        '/admin' => ['App\Controllers\AdminDashboardController', 'index'], # [GET] /admin
        '/admin/courses/create' => ['App\Controllers\AdminDashboardController', 'createCourse'], # [GET] /admin/courses/create
        '/admin/courses' => ['App\Controllers\AdminDashboardController', 'courses'], # [GET] /admin/courses
        '/admin/courses/:slug' => ['App\Controllers\AdminDashboardController', 'viewCourse'], # [GET] /admin/courses/:slug -> viewCourse
        '/admin/courses/edit/:id' => ['App\Controllers\AdminDashboardController', 'editCourse'], # [GET] /admin/courses/edit/:id
        '/admin/courses/publish/:id' => ['App\Controllers\AdminDashboardController', 'publishCourse'], # [GET] /admin/courses/publish/:id
        '/admin/courses/draft/:id' => ['App\Controllers\AdminDashboardController', 'draftCourse'], # [GET] /admin/courses/draft/:id
        '/admin/courses/archive/:id' => ['App\Controllers\AdminDashboardController', 'archiveCourse'], # [GET] /admin/courses/archive/:id
        '/admin/users' => ['App\Controllers\AdminDashboardController', 'users'], # [GET] /admin/users
        '/admin/users/view/:id' => ['App\Controllers\AdminDashboardController', 'viewUser'], # [GET] /admin/users/view
        '/admin/users/delete/:id' => ['App\Controllers\AdminDashboardController', 'deleteUser'], # [GET] /admin/users/delete
        '/admin/account-settings' => ['App\Controllers\AdminDashboardController', 'settings'], # [GET] /admin/account-settings

        '/users' => ['App\Controllers\UserController', 'index'], # [GET] /users
        '/users/dashboard' => ['App\Controllers\UserController', 'dashboard'], # [GET] /users/dashboard





    ],
    
    'POST' => [
        '/signup' => ['App\Controllers\AuthController', 'signup'], # [POST] /signup
        '/signin' => ['App\Controllers\AuthController', 'signin'], # [POST] /signin
        '/admin/courses/store' => ['App\Controllers\AdminDashboardController', 'store'], # [POST] /admin/courses/store
        '/admin/courses/update' => ['App\Controllers\AdminDashboardController', 'updateCourse'], # [POST] /admin/courses/update

        '/user/update-picture' => ['App\Controllers\UserController', 'updatePicture'],
        '/user/update-profile' => ['App\Controllers\UserController', 'updateProfile'],
        '/user/update-password' => ['App\Controllers\UserController', 'updatePassword'],


    ]
];

?>