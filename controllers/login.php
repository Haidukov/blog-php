<?php
include_once 'common/auth.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = login($username, $password);
    if ($id) {
        save_to_session($id, $username);
        header('Location: /');
        var_dump($_SESSION);
    }
    else {
        echo 'Incorrect username or password';
    }
}

function login($username, $password) {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT `id` from `users` WHERE `username` = :username AND `password` = :password');
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return count($result) ? $result[0]['id'] : null;
}
