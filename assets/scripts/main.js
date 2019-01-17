"use strict";

function toggleMenu() {
  document.getElementById("burger-icon").classList.toggle("transform");

  document.getElementById("mobile-menu").classList.toggle("toggle");
}
document.getElementById("burger-icon").addEventListener("click", toggleMenu);
