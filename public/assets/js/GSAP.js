const optionUserType = document.getElementById("drop-select"),
  dropdown = document.getElementById("dropdown"),
  rotateSVG = document.getElementById("animate-rotate");

//Please refer to https://gsap.com/resources/get-started/#special-properties
optionUserType.onclick = function () {
  if (dropdown.style.opacity === "0") {
    gsap.to("#dropdown", 0.2, {
      display: "block",
      opacity: 1,
    });
    gsap.to("#animate-rotate", 0.2, {
      rotation: 180,
    });
  } else {
    gsap.to("#dropdown", 0.2, {
      display: "none",
      opacity: 0,
    });
    gsap.to("#animate-rotate", 0.2, {
      rotation: 0,
    });
  }
};
