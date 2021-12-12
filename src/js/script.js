function Toggle() {
  var burger = document.getElementById("hamburger");
  burger.classList.toggle("is-active");

  document.querySelector("nav").classList.toggle("is-active");
}
