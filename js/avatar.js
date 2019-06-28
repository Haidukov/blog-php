const profilePic = document.querySelector('.profile-pic');
const fileUpload = document.querySelector('.file-upload');
const uploadButton = document.querySelector('.upload-button');

function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = event => {
            profilePic.setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

fileUpload.addEventListener('change', function() {
    readURL(this);
});

uploadButton.addEventListener('click', () => {
    fileUpload.click();
});