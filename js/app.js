"use strict";

const logos = document.querySelectorAll("#logo");
const colorfulLogos = document.querySelectorAll("#colorful-logo");
const searchField = document.getElementById("search");
const imgContainer = document.querySelector(".img-container");

const random = function () {
  return Math.trunc(Math.random() * 3);
};

const changeLogoColor = function () {
  imgContainer.style.opacity = 1;
  let rand = random();
  logos[rand].classList.add("hide");
  colorfulLogos[rand].classList.remove("hide");

  setTimeout(() => {
    logos[rand].classList.remove("hide");
    colorfulLogos[rand].classList.add("hide");
  }, 900);
};

const removeLogos = function () {
  if (!searchField.value) {
    imgContainer.style.opacity = 0;
  }
};

searchField.addEventListener("keyup", changeLogoColor);

document.body.addEventListener("click", removeLogos);
