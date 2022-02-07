function showPopup() {
    document.getElementsByTagName("header")[0].classList.toggle("popup_visible");
    document.getElementsByClassName("links")[0].classList.toggle("popup_visible");

    document.getElementById("popup_container").style.visibility = "visible";
}
setTimeout("showPopup()", 2000);


close = document.getElementById("close");

close.addEventListener("click", function () {
    document.getElementById("popup_container").style.visibility = "hidden";

    document.getElementsByTagName("header")[0].classList.toggle("popup_visible");
    document.getElementsByClassName("links")[0].classList.toggle("popup_visible");
})