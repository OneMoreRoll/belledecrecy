const hamburger = document.getElementById('hamburger');
const mainUL = document.getElementById("main_nav");
const secondaryUL = document.getElementById("secondary_nav");

const collectionTag = document.getElementById("collection_tag");

hamburger.addEventListener('click', () => {
    mainUL.classList.toggle('show');
    secondaryUL.classList.toggle('show');
})

var a = document.getElementsByClassName("secondary_link");
for (var i = 0; i < a.length; i++) {
    a[i].addEventListener('click', () => {
        mainUL.classList.toggle('show');
        secondaryUL.classList.toggle('show');
    })
}