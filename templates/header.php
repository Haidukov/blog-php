<?php
render('head');
$route = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?=$route === '/' ? 'active' : ''?>">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item <?=$route === '/posts' ? 'active' : ''?>">
                <a class="nav-link" href="posts">Posts</a>
            </li>
            <?php if (!is_logged_in()) :?>
                <li class="nav-item <?=$route === '/login' ? 'active' : ''?>">
                    <a class="nav-link " href="login">Login</a>
                </li>
                <li class="nav-item <?=$route === '/register' ? 'active' : ''?>">
                    <a class="nav-link" href="register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php if (is_logged_in()) :?>
        <div class="btn-group dropleft">
            <img id="dropdownMenuButton" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" class="user-logo" src="<?=$_SESSION['logo_url']?>">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/profile">Profile</a>
                <a class="dropdown-item" href="/logout">Log out</a>
            </div>
        </div>
    <?php endif; ?>
</nav>