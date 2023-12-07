// Humberger
const humberger = document.querySelector("#humberger");
const navMenu = document.querySelector("#nav-menu");

humberger.addEventListener("click", function () {
    humberger.classList.toggle("humberger-active");
    navMenu.classList.toggle("hidden");
});

document.addEventListener("click", function (event) {
    if (!navMenu.contains(event.target) && event.target !== humberger) {
        humberger.classList.remove("humberger-active");
        navMenu.classList.add("hidden");
    }
});

// Nav
window.addEventListener("scroll", function () {
    var nav = document.querySelector("nav");

    if (nav) {
        // Periksa apakah elemen ditemukan
        if (window.scrollY > 100) {
            nav.classList.add("navbar-fixed");
        } else {
            nav.classList.remove("navbar-fixed");
        }
    }
});

// scroll
$(document).ready(function () {
    $("a").on("click", function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            var targetOffset = $(hash).offset().top;
            var duration = 800;
            $("html, body").animate(
                {
                    scrollTop: targetOffset,
                },
                duration,
                function () {
                    window.location.hash = hash;
                }
            );
        }
    });
});
