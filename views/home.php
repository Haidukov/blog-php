<?php
function get_first_post() {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT p.id, `title`, `description`, `username` FROM `posts` p INNER JOIN `users` u ON p.author_id = u.id LIMIT 1');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return (!empty($result)) ? $result[0] : null;
}
$post = get_first_post();
render('header', ['title' => 'Home']); ?>
<div class="container mt-4">
    <?php if (!empty($post)) :?>
        <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><?= $post['title']?></h5>
                        </div>
                        <p class="card-text"><?= $post['description']?></p>
                        <p class="card-author"><?= $post['username']?></p>
                    </div>
                </div>
            </div>
    <?php endif;?>
    <?php if (empty($post)) :?>
        <div>
            Not found
        </div>
    <?php endif; ?>
</div>
<?php
render('footer-scripts');
