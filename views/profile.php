<?php
render('head', ['title' => 'Profile']);
render('header');
?>

<div class="container">
    <div class="form-container shadow-lg w-75 mx-auto">
        <h2 class="h2 text-center">Profile</h2>
        <form id="form" class="form" action="profile" enctype="multipart/form-data" method="post" novalidate>
            <div class="avatar-wrapper">
                <img class="profile-pic" src="<?= $_SESSION['logo_url']?>" />
                <div class="upload-button">
                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                </div>
                <input id="logo" name="logo-url" class="file-upload" type="file" accept="image/*"/>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input id="username" class="form-control" type="text" disabled value="<?= $_SESSION['username']?>">
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" value="<?= $_SESSION['first_name']?>" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" value="<?= $_SESSION['last_name']?>" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block">
                Update
            </button>
        </form>
    </div>
</div>

<script src="../js/form.js"></script>
<script src="../js/avatar.js"></script>
<?php
render('footer-scripts');