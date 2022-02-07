// Choix des options d'un select multiple sans appuyer sur ctrl
window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
}

// Affichage du second champ d'image quand le premier est renseigné et prévisualisation des images
const inputLeftImage = document.getElementById("input_left_image");
const leftImgPreview = document.getElementById("left_image_preview");
let leftImage = document.getElementById("left_image");

const inputRightImage = document.getElementById("input_right_image");
const rightImgPreview = document.getElementById("right_image_preview");
let rightImage = document.getElementById("right_image");

inputLeftImage.addEventListener("change", function () {
    getLeftImgData();
});

function getLeftImgData() {
    const files = inputLeftImage.files[0];

    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            leftImgPreview.style.display = "block";
            leftImgPreview.innerHTML = '<img src="' + this.result + '" />';

            leftImagePreview = this.result;
        });
    }
}

inputRightImage.addEventListener("change", function () {
    getSecondaryImgData();
});

function getSecondaryImgData() {
    const files = inputRightImage.files[0];

    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            rightImgPreview.style.display = "block";
            rightImgPreview.innerHTML = '<img src="' + this.result + '" />';

            rightImagePreview = this.result;
        });
    }
}

inputLeftImage.addEventListener("change", showRightImageInput);

function showRightImageInput() {
    let RightImageContainer = document.getElementById("right_image_container");
    RightImageContainer.classList.remove("hidden");
}