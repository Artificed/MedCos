const profileImage = document.getElementById('profile-image');
const imageUpload = document.getElementById('image-upload');

const submitButton = document.getElementById('submit-button');

const emailField = document.getElementById('email');
const phoneField = document.getElementById('phone');
const addressField = document.getElementById('address');

const showSubmitButton = () => {
    submitButton.classList.remove('hidden');
}

emailField.addEventListener('input', showSubmitButton);
phoneField.addEventListener('input', showSubmitButton);
addressField.addEventListener('input', showSubmitButton);

imageUpload.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
        showSubmitButton();
    }
});
