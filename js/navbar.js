const navMenu = document.getElementById("navbar-left");
const formSearchMobile = document.getElementById("form-search-mobile");

const dismissMenuNav = function(e){
    e.preventDefault();
    navMenu.classList.remove("active");
    navMenu.classList.add("dismiss");
    setTimeout(_ => navMenu.style.display = "none", 500);
}

const openMenuNav = function(e){
    e.preventDefault();
    navMenu.style.display = "block";
    navMenu.classList.remove("dismiss");
    navMenu.classList.add("active");
}

const openSearchNav = function(e){
    formSearchMobile.classList.remove("d-none");
}

const dismissSearchNav = function(e){
    formSearchMobile.classList.add("d-none");
}

document.getElementById("btn-menu").addEventListener("click", openMenuNav)
document.getElementById("close-nav-menu").addEventListener("click", dismissMenuNav)
document.getElementById("close-btn-navmenu").addEventListener("click", dismissMenuNav)
document.getElementById("btn-open-search").addEventListener("click", openSearchNav)
document.getElementById("close-btn-search").addEventListener("click", dismissSearchNav)

document.getElementById("input-search").addEventListener("click", e => {
    e.stopPropagation();
    e.preventDefault();
})

formSearchMobile.addEventListener("click", e => {
    formSearchMobile.classList.add("d-none");
})

