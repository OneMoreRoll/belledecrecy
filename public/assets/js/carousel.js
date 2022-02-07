let carouselItem = document.getElementById("full_carousel");

let details = document.querySelectorAll(".product_details");
const buttons = document.querySelectorAll('.details_button');

let detailsMobile = document.querySelectorAll(".modal_mobile");
const buttonsMobile = document.querySelectorAll('.details_button_mobile');

function scrollPrev() {
    $('.carousel').carousel('prev')
}

function scrollNext() {
    $('.carousel').carousel('next')
}

carouselItem.addEventListener('wheel', function (e) {
    for (const detail of details) {
        for (const button of buttons) {
            for (const detailMobile of detailsMobile) {
                for (const buttonMobile of buttonsMobile) {
                    detailMobile.style.display = "none";
                    detail.style.display = "none";
                    buttonMobile.style.display = "block";
                    button.style.display = "block";
                }
            }
        }
    }
    if (e.deltaY < 0) {
        scrollPrev();
    } else if (e.deltaY > 0) {
        scrollNext();
    }
});

// Mise en place du carousel au chargement de la page
$('.carousel').carousel({
    interval: 6000
})

// Apparition des détails en cliquant sur un bouton
for (const detail of details) {
    for (const button of buttons) {
        button.addEventListener('click', function () {
            if (detail.style.display !== "block") {
                detail.style.display = "block";
                button.style.display = "none";
            }
        });
    }
}

// Apparition des détails en cliquant sur un bouton (mobile)
for (const detail of detailsMobile) {
    for (const button of buttonsMobile) {
        button.addEventListener('click', function () {
            if (detail.style.display !== "flex") {
                detail.style.display = "flex";
                button.style.display = "none";
            }
        });
    }
}

const closeButtons = document.querySelectorAll('.close');

for (const detail of detailsMobile) {
    for (const button of buttonsMobile) {
        for (const closeButton of closeButtons) {
            closeButton.addEventListener("click", function () {
                detail.style.display = "none";
                button.style.display = "block";
            })
        }
    }
}


