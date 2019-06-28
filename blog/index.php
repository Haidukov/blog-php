<?php
include('lib/Route.php');

Route::add('/',function(){
    echo 'Welcome :-)';
});

Route::add('/test.html',function(){
    echo 'Hello from test.html';
});

Route::add('/contact-form',function(){
    echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
},'get');

Route::add('/contact-form',function(){
    echo 'Hey! The form has been sent:<br/>';
    print_r($_POST);
},'post');

Route::add('/foo/([0-9]*)/bar',function($var1){
    echo $var1.' is a great number!';
});

Route::run('/');