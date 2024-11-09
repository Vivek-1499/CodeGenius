document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username.trim() === '' || password.trim() === '') {
            event.preventDefault(); // Prevent form submission
            document.getElementById('error_message').innerText = 'Please fill in all fields.';
        } else {
            document.getElementById('error_message').innerText = ''; // Clear error message
        }
    });
});
