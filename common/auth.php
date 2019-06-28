<?php

function save_to_session($id, $username) {
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
}

function remove_from_session() {
    session_unset();
    session_destroy();
}

function is_logged_in() {
    return isset($_SESSION['id']);
}

function set_current_user() {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT `first_name`, `last_name`, `logo_url` FROM `users` WHERE `id` = :id');
    $statement->bindParam('id', $_SESSION['id']);
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['logo_url'] = $user['logo_url'];
}

function checkIfUserExists($username) {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT `id` from `users` WHERE `username` = :username');
    $statement->bindParam(':username', $username);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return count($result) > 0;
}