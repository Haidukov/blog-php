<?php
render('header', ['title' => 'Posts']);
function getPosts() {
    $con = Database::getConnection();
    $statement = $con->prepare('SELECT p.id, `title`, `description`, `username` FROM `posts` p INNER JOIN `users` u ON p.author_id = u.id');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$posts = getPosts();
?>
<div class="container mt-4">
    <a href="post-form">
        <button type="button" class="btn btn-primary btn-lg">Add post</button>
    </a>
    <?php if(count($posts) > 0) :?>
        <div id="list" class="row mt-2">
            <?php foreach ($posts as $post): ?>
                <div id="post-<?= $post['id']?>" class="col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title"><?= $post['title']?></h5>
                                <div class="d-flex">
                                    <i onclick="window.location.href='/post-form?id=<?=$post['id']?>'" class="fa fa-pen mr-2"></i>
                                    <i onclick="deletePost(<?= $post['id']?>)" class="fa fa-trash"></i>
                                </div>
                            </div>
                            <p class="card-text"><?= $post['description']?></p>
                            <p class="card-author"><?= $post['username']?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif; ?>
    <?php if(count($posts) == 0) :?>
        <div>Not found</div>
    <?php endif; ?>
</div>
<script>
    async function deletePost(id) {
        await fetch(`http://localhost/delete-post?post_id=${id}`);
        const node = document.getElementById(`post-${id}`);
        node.remove();
    }
</script>
<?php
render('footer-scripts');
