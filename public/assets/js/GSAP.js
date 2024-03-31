//Sign Up to Display my modal before proceed.

document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector('.login-form form');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    if (emailInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
      gsap.to(".modal-container", {
        opacity: 1,
        display: "block",
        duration: 0.2
      });
    } else {
      alert('Please fill in both email and password fields.');
    }
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const closeModalButtons = document.querySelectorAll('#close-modal');
  const modalContainer = document.querySelector('.modal-container');

  closeModalButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      gsap.to(modalContainer, {
        opacity: 0,
        display: "none",
        duration: 0.2
      });
    });
  });
});