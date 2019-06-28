<?php
render('head', ['title' => 'Login']);
render('header');
?>

<div class="container">
    <div class="form-container shadow-lg w-75 mx-auto">
        <h2 class="h2 text-center">Login</h2>
        <form id="form" class="form" action="login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
            <button class="btn btn-primary btn-block">
                Login
            </button>
        </form>
    </div>
</div>

<script src="../js/form.js"></script>