<?php
include_once 'common/auth.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $logo_url = isset($_FILES['logo-url']) ? $_FILES['logo-url'] : null;
    if (!checkIfUserExists($username)) {
        $id = register($username, $first_name, $last_name, $password, $logo_url);
        save_to_session($id, $username);
        header('Location: /');
    }
    else {
        echo 'User already exists';
    }
}

function register($username, $password, $first_name, $last_name, $logo_url) {
    $con = Database::getConnection();
    if ($logo_url && $logo_url['name']) {
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($logo_url['name']);
        move_uploaded_file( $logo_url['tmp_name'], $target_file);
        $statement = $con->prepare(
            'INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`, `logo_url`)' .
            'VALUES(:username, :first_name, :last_name, :password, :logo_url) ');
        $statement->bindParam('logo_url', $target_file);
    }
    else {
        $statement = $con->prepare(
            'INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`)' .
            'VALUES(:username, :first_name, :last_name, :password) ');
    }
    $statement->bindParam(':username', $username);
    $statement->bindParam(':first_name', $first_name);
    $statement->bindParam(':last_name', $last_name);
    $statement->bindParam(':password', $password);
    $statement->execute();
    return $con->lastInsertId();
}

