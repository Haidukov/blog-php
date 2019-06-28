<?php

if (isset($_POST['title']) && isset($_POST['description']) && is_logged_in()) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (isset($_GET['id'])) {
        updatePost($_GET['id'], $title, $description);
    }
    else {
        addPost($title, $description);
    }
    header('Location: /posts');
}

function addPost($title, $description) {
    $con = Database::getConnection();
    $statement = $con->prepare(
        'INSERT INTO `posts` (`title`, `description`, `author_id`)' .
        'VALUES(:title, :description, :author_id)'
    );
    $statement->bindParam(':title', $title);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':author_id', $_SESSION['id']);
    $statement->execute();
}

function updatePost($id, $title, $description) {
    $con = Database::getConnection();
    $statement = $con->prepare(
        'UPDATE `posts` SET `title` = :title, `description` = :description WHERE `id` = :id' .
        'VALUES(:title, :description, :author_id)'
    );
    $statement->bindParam(':id', $id);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':description', $description);
    $statement->execute();
}
