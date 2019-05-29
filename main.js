
const navClose =document.getElementById("nav-close");
const navMenu = document.getElementById("nav-menu");

navClose.addEventListener("click",function(event) {
        navClose.classList.toggle('is-active');
        navMenu.classList.toggle('is-active');
});