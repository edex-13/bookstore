const userName = document.querySelector(".navbar-email");
const menu = document.querySelector(".desktop-menu");
const mobile_menu = document.querySelector(".mobile-menu");
const menu_close = document.querySelector(".mobil_menu-close");
const menu_open = document.querySelector(".mobil_menu-open");

if (userName) {
  userName.addEventListener("click", (e) => {
    menu.classList.toggle("hide");
  });
}

menu_open.addEventListener("click", (e) => {
  mobile_menu.classList.toggle("menuActive");
  menu_open.classList.remove("hide");
  document.body.style.overflow = "hidden";
});
menu_close.addEventListener("click", (e) => {
  mobile_menu.classList.toggle("menuActive");
  menu_open.classList.remove("hide");
  document.body.style.overflow = "auto";
});
