const name = document.querySelector(".navbar-email");
const menu = document.querySelector(".desktop-menu");


name.addEventListener("click", (e) => {
  menu.classList.toggle("hide");
});