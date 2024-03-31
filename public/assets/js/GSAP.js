//Sign Up to Display my modal before proceed.

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".login-form form");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (emailInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
      gsap.to(".modal-container", {
        opacity: 1,
        display: "block",
        duration: 0.2,
      });
      gsap.to("body", {
        overflow: "hidden",
      });
    } else {
      alert("Please fill in both email and password fields.");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const closeModalButtons = document.querySelectorAll("#close-modal");
  const modalContainer = document.querySelector(".modal-container");

  closeModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      gsap.to(modalContainer, {
        opacity: 0,
        display: "none",
        duration: 0.2,
      });
      gsap.to("body", {
        overflow: "auto",
      });
    });
  });

  //added keyboard interaction huh...
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      gsap.to(modalContainer, {
        opacity: 0,
        display: "none",
        duration: 0.2,
      });
      gsap.to("body", {
        overflow: "auto",
      });
    }
  })
});

//When changing the option available in Sign Up...
document.addEventListener("DOMContentLoaded", function () {
  const userTypeSelection = document.getElementById("signup-dropdown");
  const modalLabel = document.getElementById("modal-label");

  userTypeSelection.addEventListener("change", function () {
    if (userTypeSelection.value === "resident") {
      modalLabel.innerText =
        "This will grant you access to resident-specific features to our platform if ever.";
    } else if (userTypeSelection.value === "representative") {
      modalLabel.innerText =
        "This will grant you access to representative mode features available to our platform if ever.";
    }
  });
});