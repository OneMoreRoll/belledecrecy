// Affichage de la prévisualisation des images
const inputMainImage = document.getElementById("input_main_image");
const mainImgPreview = document.getElementById("main_image_preview");
let mainImage = document.getElementById("main_image");

const inputLogo = document.getElementById("input_logo");
const logoPreview = document.getElementById("logo_preview");
let logo = document.getElementById("logo");

inputMainImage.addEventListener("change", function () {
    getMainImgData();
});

function getMainImgData() {
    const files = inputMainImage.files[0];

    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            mainImgPreview.style.display = "block";
            mainImgPreview.innerHTML = '<img src="' + this.result + '" />';

            mainImagePreview = this.result;
        });
    }
}

inputLogo.addEventListener("change", function () {
    getLogoData();
});

function getLogoData() {
    const files = inputLogo.files[0];

    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            logoPreview.style.display = "block";
            logoPreview.innerHTML = '<img src="' + this.result + '" />';

            logoImagePreview = this.result;

            logoPreview.classList.add("logo_preview");
        });
    }
}