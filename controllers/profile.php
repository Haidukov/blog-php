<?php
include_once 'common/auth.php';

if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $logo_url = isset($_FILES['logo-url']) ? $_FILES['logo-url'] : null;
    updateProfile($first_name, $last_name, $logo_url);
    header('Location: /profile');
    set_current_user();
}

function updateProfile($first_name, $last_name, $logo_url) {
    $id = $_SESSION['id'];
    $con = Database::getConnection();
    if ($logo_url) {
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($logo_url["name"]);
        move_uploaded_file( $logo_url['tmp_name'], $target_file);
        $statement = $con->prepare(
            'UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `logo_url` = :logo_url WHERE `id` = :id');
        $statement->bindParam('logo_url', $target_file);
    }
    else {
        $statement = $con->prepare(
            'UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, WHERE `id` = :id');
    }
    $statement->bindParam(':id', $id);
    $statement->bindParam(':first_name', $first_name);
    $statement->bindParam(':last_name', $last_name);
    $statement->execute();
}

