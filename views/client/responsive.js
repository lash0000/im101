document.addEventListener("DOMContentLoaded", function () {
    const modalInfo = document.querySelector(".right-side-wrapper");
    const modalOptions = document.querySelector(".modal-option-wrapper");

    function closeModal() {
        gsap.to(modalOptions, { duration: 0.1, display: "none", opacity: 0 });
    }

    modalInfo.addEventListener("click", function () {
        if (modalOptions.style.display === "none") {
            gsap.to(modalOptions, { duration: 0.1, display: "block", opacity: 1 });
        } else {
            closeModal();
        }
    });

    window.addEventListener("scroll", function () {
        closeModal();
    });
});
