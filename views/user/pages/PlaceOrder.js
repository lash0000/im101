//I do separation kasi ang haba na ponyeta

const confirmationModal = document.querySelector(".modal-container");
const closeButtons = document.querySelectorAll("#close-modal");
const proceedButton = document.querySelector(".cart-proceed");
const affirmationCheckbox = document.getElementById("affirmation-checkbox");
const submitFormButton = document.querySelector("#confirm-modal-button");
const modalInfo = document.querySelector(".user-wrapper");
const modalOptions = document.querySelector(".modal-option-wrapper");

function closeModal() {
  gsap.to(modalOptions, {
    duration: 0.1,
    display: "none",
    opacity: 0,
  });
}

modalInfo.addEventListener("click", function () {
  if (modalOptions.style.display === "none") {
    gsap.to(modalOptions, {
      duration: 0.1,
      display: "block",
      opacity: 1,
    });
  } else {
    closeModal();
  }
});

function toggleModal(modal) {
  if (modal.style.display === "none") {
    gsap.to(modal, {
      duration: 0.3,
      display: "block",
      opacity: 1,
    });
  } else {
    gsap.to(modal, {
      duration: 0.3,
      display: "none",
      opacity: 0,
    });
  }
}

closeButtons.forEach(function (closeButton) {
  closeButton.addEventListener("click", function (event) {
    event.preventDefault();
    toggleModal(confirmationModal);
  });
});

proceedButton.addEventListener("click", function (e) {
  if (!affirmationCheckbox.checked) {
    alert("Please check the affirmation checkbox before proceeding.");
  } else {
    toggleModal(confirmationModal);
  }
});

function handleFormSubmission() {
  document.querySelector(".main-wrapper").submit();
}

document.addEventListener("DOMContentLoaded", function () {
  const shipmentFormData = localStorage.getItem("shipmentForm");
  const formDataObject = JSON.parse(shipmentFormData);

  document.getElementById("first-name").value = formDataObject["first-name"];
  document.getElementById("last-name").value = formDataObject["last-name"];
  document.getElementById("recipent-address").value =
    formDataObject["recipent-address"];
  document.getElementById("contact-number").value =
    formDataObject["contact-number"];

  function generateRandomNumber() {
    return Math.floor(100000 + Math.random() * 999999);
  }

  document.getElementById("reference-track").value = generateRandomNumber();
  document.getElementById("order-number").value = generateRandomNumber();
});

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("search-input");

  searchInput.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    const sanitizedValue = inputValue.replace(/[^\w\s]/gi, "");

    if (inputValue !== sanitizedValue) {
      event.target.value = sanitizedValue;
    }
  });
});

const form = document.querySelector("form");

form.addEventListener("submit", function (event) {
  event.preventDefault();

  const shippingFormData = localStorage.getItem("shippingForm");
  const cartFormData = localStorage.getItem("cartFormData");
  const shippingData = shippingFormData ? JSON.parse(shippingFormData) : {};
  const cartData = cartFormData ? JSON.parse(cartFormData) : {};

  const formData = {
    ...shippingData,
    ...cartData,
    firstName: document.getElementById("first-name").value,
    lastName: document.getElementById("last-name").value,
    address: document.getElementById("recipent-address").value,
    contactNumber: document.getElementById("contact-number").value,
  };

  const jsonData = JSON.stringify(formData);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "process-form.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        window.location.href = "http://localhost/im101/views/user/pages/checkout-success.php";
        console.log(xhr.responseText);
      } else {
        console.error("Error:", xhr.status);
      }
    }
  };
  xhr.send(jsonData);
});
