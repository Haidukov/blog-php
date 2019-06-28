<?php
render('head', ['title' => 'Add post']);
render('header');
?>

<div class="container">
    <div class="form-container shadow-lg w-75 mx-auto">
        <h2 class="h2 text-center"><?=isset($_GET['id']) ? 'Edit post' : 'Add post'?></h2>
        <form id="form" class="form" action="post-form" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" type="text" class="form-control" rows="4" required>
                </textarea>
            </div>
            <button class="btn btn-primary btn-block">
                Add
            </button>
        </form>
    </div>
</div>

<script src="/js/form.js"></script>