<style>
    .form-container {
        margin-top: 50px;
        padding: 1.5em;
        max-width: 550px;
    }

    .avatar-wrapper {
        position: relative;
        height: 100px;
        width: 100px;
        margin: 50px auto;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 1px 1px 15px -5px black;
        transition: all .3s ease;
    }

    .avatar-wrapper:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .avatar-wrapper:hover .profile-pic {
        opacity: .5;
    }

    .profile-pic {
        height: 100%;
        width: 100%;
        transition: all .3s ease;
    }

    .profile-pic:after {
        font-family: FontAwesome;
        content: "\f007";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 190px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;
    }

    .upload-button {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .fa-arrow-circle-up {
        position: absolute;
        font-size: 234px;
        top: -17px;
        left: 0;
        text-align: center;
        opacity: 0;
        transition: all .3s ease;
        color: #34495e;
    }

    .fa-arrow-circle-up:hover .fa-arrow-circle-up {
        opacity: .9;
    }

    .user-logo {
        cursor: pointer;
        height: 50px;
        margin-right: 10px;
    }

    .card-author {
        color: grey;
        margin: 0;
    }

    .card-body i {
        cursor: pointer;
    }
</style>