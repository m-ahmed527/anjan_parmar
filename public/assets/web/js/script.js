document.addEventListener("DOMContentLoaded", function () {
    let anchors = document.querySelectorAll(".nav-link");
    anchors.forEach((anchorLink) => {
        const currentUrl = window.location.href;
        let isNotHome = window.location.pathname.split("/");
        isNotHome = isNotHome[isNotHome.length - 1];
        if (isNotHome) {
            anchors[0].style.color = "unset";
        }
        if (currentUrl === anchorLink.href) {
            anchorLink.style.color = "blue";
        }
    });
});

$(".slider-for").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    responsive: [
        {
            breakpoint: 1399,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 1145,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});

$(".sliders").slick({
    slidesToShow: 5,
    slidesToScroll: 3,
    dots: false,
    arrows: false,
    infinite: true,
    responsive: [
        {
            breakpoint: 1600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2,

            },
        },


        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 700,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 440,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});

$(".sales-slider").slick({
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 12000,
    cssEase: "linear",
    arrows: false,
    responsive: [
        {
            breakpoint: 1480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 762,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".multi-system").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    fade: true,
    prevArrow: $(".prev-arrow"),
    nextArrow: $(".next-arrow"),
});

$(".about-us-slides").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    responsive: [
        {
            breakpoint: 1600,
            settings: {
                slidesToShow: 4,
            },
        },

        {
            breakpoint: 1399,
            settings: {
                slidesToShow: 4,
            },
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 780,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});

$(".product-cards").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    speed: 5000,
    autoplaySpeed: 0,
    dots: false,
    infinite: true,
    arrows: false,
    cssEase: "linear",
    responsive: [
        {
            breakpoint: 1400,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
    ],
});

const btns = document.querySelectorAll(".tab-btn");

btns.forEach((button) => {
    button.addEventListener("click", () => {
        btns.forEach((item) => item.classList.remove("tab-active"));
        button.classList.add("tab-active");
    });
});

// $(".search-btn-menu").click(function () {
//     $(".off-canva-custom").toggleClass("canva-active");
//     $(".menu-bar").css("right", 0);
//     $(".body").toggleClass("overflow-class");

// });


// const heartBtn = document.querySelectorAll(".heart-save-btn");

// heartBtn.forEach(saveBtn => {
//     saveBtn.addEventListener("click", () => {
//         const icon = saveBtn.querySelector("i");
//         if (icon.classList.contains("fa-regular")) {
//             icon.classList.replace("fa-regular", "fa-solid")
//         } else {
//             icon.classList.replace("fa-solid", "fa-regular")
//         }
//     })
// });

const offerBtn = document.querySelectorAll(".offer-btn");
const closeBtn = document.querySelectorAll(".close-offer-modal");
const modalOffer = document.querySelector(".offer-modal-area");

offerBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        modalOffer.classList.add("active");
    });
});

closeBtn.forEach((closeButton) => {
    closeButton.addEventListener("click", () => {
        modalOffer.classList.remove("active");
    });
});

$(document).ready(function () {
    $(document).on("click", ".btn-open-sidebar,.btn-close", function () {
        $(".side-bar-area").toggleClass("sidebar-pro-active");
    });
});

function initializeSlick() {
    if ($(window).width() < 1240) {
        console.log("hello");

        $(".side-images-wrap").slick({
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            vertical: false,
            verticalSwiping: false,
            infinite: true,
            prevArrow: $(".previous-btn-2"),
            nextArrow: $(".next-btn-2"),
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    } else {
     
        $(".side-images-wrap").slick({
            slidesToShow: 3,
            slidesToScroll: 2,
            dots: false,
            arrows: true,
            vertical: true,
            verticalSwiping: true,
            infinite: true,
            prevArrow: $(".previous-btn-2"),
            nextArrow: $(".next-btn-2"),
        });
    }
}

$(document).ready(function () {
    initializeSlick();
});


$(document).ready(function () {
    $(".search-btn-menu").click(function () {
        const $offCanva = $(".off-canva-custom");
        const $menuBar = $(".menu-bar");

        if ($offCanva.length === 0) {
            console.error("Element '.menu-bar' not found in the DOM.");
            return;
        }

        const isActive = $offCanva.hasClass("canva-active");

        if (isActive) {
            $menuBar.animate({ right: "-100%" }, 100);
        } else {
            $menuBar.animate({ right: "0" }, 100);
        }

        $offCanva.toggleClass("canva-active");
        $("body").toggleClass("overflow-class");

        console.log($offCanva);
    });
});

const dropdownBtn = $("#dropdown > button");
const subMenu = dropdownBtn.next();

dropdownBtn.on("click", (e) => {
    e.stopPropagation();

    subMenu.toggleClass("show");

    if (subMenu.hasClass("show")) {
        $(window).on("click", (e) => {
            console.log(e.target);

            if ($(e.target).hasClass("show")) {
                console.log("target");
                subMenu.removeClass("show");
            }
        });
    }
});

$(".radio-btns").on("change", function () {
    $(".radio-btns").each(function () {
        $(`#${$(this).val()}`).hide();
        $(this)
            .closest(".payment-radio-check-wrap")
            .css("border", "1px solid #a6a6a6a3");
    });
    $(`#${$(this).val()}`).show();
    $(this)
        .closest(".payment-radio-check-wrap")
        .css("border", "1px solid #4f7eff");
});
let checkInp = document.querySelector("#check-inp");
checkInp?.addEventListener("change", () => {
    console.log(checkInp.checked);

    if (!checkInp.checked) {
        checkInp
            .closest("label")
            .querySelector("i")
            .classList.remove("fa-check");

        document.querySelector("#field-area").style.display = "block";
    } else {
        checkInp.closest("label").querySelector("i").classList.add("fa-check");

        document.querySelector("#field-area").style.display = "none";
    }
});

document.querySelector("#year").innerText = new Date().getFullYear();

const minRange = document.getElementById("minRange");
const maxRange = document.getElementById("maxRange");
const minValueDisplay = document.getElementById("minValue");
const maxValueDisplay = document.getElementById("maxValue");

if (minRange) {
    minRange.addEventListener("input", () => {
        console.log();

        if (parseInt(minRange.value) > parseInt(maxRange.value)) {
            minRange.value = parseInt(maxRange.value).toFixed(2);
        }
        minValueDisplay.textContent = parseInt(minRange.value).toFixed(2);
        updateSliderTrack();
    });
}

if (maxRange) {
    maxRange.addEventListener("input", () => {
        if (parseInt(maxRange.value) < parseInt(minRange.value)) {
            maxRange.value = parseInt(minRange.value).toFixed(2);
        }
        maxValueDisplay.textContent = parseInt(maxRange.value).toFixed(2);
        updateSliderTrack();
    });
}

if (minRange && maxRange) {
    function updateSliderTrack() {
        const percentMin = (minRange.value / maxRange.max) * 100;
        const percentMax = (maxRange.value / maxRange.max) * 100;

        minRange.style.background = `linear-gradient(to right, #c1c1c1
     ${percentMin}%, #4F7EFF ${percentMin}%, #4F7EFF ${percentMax}%, #ddd ${percentMax}%)`;
        maxRange.style.background = minRange.style.background;
    }
    updateSliderTrack();
}
