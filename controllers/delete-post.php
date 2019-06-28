<?php

function deletePost($id) {
    $con = Database::getConnection();
    $statement = $con->prepare(
        'DELETE FROM `posts` WHERE id = :id'
    );
    $statement->bindParam(':id', $id);
    $statement->execute();
}

if (isset($_GET['post_id'])) {
    deletePost($_GET['post_id']);
}