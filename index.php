<?php
include_once 'lib/Route.php';
include_once 'db/config.php';
include_once 'db/db.php';
include_once 'util/helpers.php';
include_once 'common/auth.php';

session_start();

if (is_logged_in()) {
    set_current_user();
    if ($_SERVER['REQUEST_URI'] === '/login' || $_SERVER['REQUEST_URI'] === '/register') {
        header('Location: /');
    }
}

Route::add('/',function(){
    view('home');
});

Route::add('/register',function() {
    view('register');
});

Route::add('/register', function() {
    controller('register');
}, 'post');

Route::add('/login' , function() {
   view('login');
});

Route::add('/login', function() {
   controller('login');
}, 'post');

Route::add('/logout', function() {
    controller('logout');
});

Route::add('/posts', function () {
   view('posts');
});

Route::add('/post-form', function () {
   view('post-form');
});

Route::add('/post-form', function () {
   controller('post-form');
}, 'post');

Route::add('/delete-post', function () {
   controller('delete-post');
});

Route::add('/profile', function() {
    view('profile');
});

Route::add('/profile', function () {
    controller('profile');
}, 'post');

Route::add('/get-posts', function () {
   controller('get-posts');
});

Route::run('/');