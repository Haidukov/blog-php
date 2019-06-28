<?php
require "util/helpers.php";
render("header.php", ["title" => "Sign Up"]);
?>

<div class="container">
    <div class="form-container shadow-lg w-75 mx-auto">
        <h2 class="h2 text-center">Sign up</h2>
        <form id="form" class="form" novalidate>
            <div class="avatar-wrapper">
                <img class="profile-pic" src="" />
                <div class="upload-button">
                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                </div>
                <input class="file-upload" type="file" accept="image/*"/>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="email" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="repeatPassword">Confirm</label>
                <input id="repeatPassword" name="repeatPassword" type="password" class="form-control" required>
            </div>
            <button class="btn btn-primary btn-block">
                Sign up
            </button>
        </form>
    </div>
</div>

<script src="js/form.js"></script>
<script src="js/avatar.js"></script>