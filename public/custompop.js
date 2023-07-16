// public/js/custom-popup.js
document.addEventListener('DOMContentLoaded', function() {
    // Trigger the pop-up when the page is fully loaded
    // You can customize this based on your requirements (e.g., using a button click, etc.)
    displayPopup();
});

function displayPopup() {
    // Retrieve the custom popup element
    const popup = document.querySelector('.custom-popup');

    // Display the popup
    popup.style.display = 'block';

    // Hide the popup after a few seconds (adjust the timeout value as needed)
    setTimeout(function() {
        popup.style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
}
