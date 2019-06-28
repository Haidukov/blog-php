<?php
function getPosts() {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT p.id, `title`, `description`, `username` FROM `posts` p INNER JOIN `users` u ON p.author_id = u.id');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$posts = getPosts();

echo json_encode($posts);
