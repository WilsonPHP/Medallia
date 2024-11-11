// Desktop Scripts
const colorBar = document.querySelector(".background-color-bar");
const subMenus = document.querySelectorAll(".sub-menu");

document.addEventListener("scroll", (e) => {
    if (window.scrollY !== 0) {
        colorBar.classList.add("background-box-shadow");
    } else {
        colorBar.classList.remove("background-box-shadow");
    }
    for (let i = 0; i < subMenus.length; i++) {
        const elStyles = getComputedStyle(subMenus[i]);
        if (elStyles.top !== "-600px") {
            colorBar.classList.remove("background-box-shadow");
            break;
        } else {
            colorBar.classList.add("background-box-shadow");
        }
    }
});

document.addEventListener("mousemove", (e) => {
    if (window.scrollY !== 0) {
        colorBar.classList.add("background-box-shadow");
    } else {
        colorBar.classList.remove("background-box-shadow");
    }
    if (e.target.closest(".menu-item")) {
        colorBar.classList.remove("background-box-shadow");
    } else {
        colorBar.classList.add("background-box-shadow");
    }
});