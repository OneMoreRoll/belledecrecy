const hamburger = document.getElementById('hamburger');
const navUL = document.getElementById("nav_ul");
const footer = document.getElementById("footer");

hamburger.addEventListener('click', () => {
    navUL.classList.toggle('show');
    footer.classList.toggle('footer_mobile');
})