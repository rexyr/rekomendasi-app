function SetFocus() {
    var input = document.getElementById("search-box");
    input.focus();
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    subMenu.classList.remove('active');
    navbar.classList.remove('active');
}

// let findForm = document.querySelector('.search-form');
// var input = document.getElementById("search-box");

// document.querySelector('#find-btn').onclick = () => {
//     input.focus();
//     findForm.classList.toggle('active');
//     shoppingCart.classList.remove('active');
//     subMenu.classList.remove('active');
//     navbar.classList.remove('active');
// }

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () => {
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    subMenu.classList.remove('active');
    navbar.classList.remove('active');
}

let subMenu = document.querySelector('.sub-menu-warp');

document.querySelector('#login-btn').onclick = () => {
    subMenu.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    subMenu.classList.remove('active');
}

window.onscroll = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    subMenu.classList.remove('active');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".product-slider", {
    loop: false,
    spaceBetween: 20,
    // autoplay: {
    //     delay: 7500,
    //     disableOnInteraction: false,
    // },
    // centeredSlides: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1020: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".review-slider", {
    loop: true,
    // spaceBetween: 20,
    // autoplay: {
    //     delay: 7500,
    //     disableOnInteraction: false,
    // },
    // centeredSlides: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1020: {
            slidesPerView: 3,
        },
    },
});

function logout() {
    var form = document.createElement("form");
    form.action = "{{ route('logout') }}";
    form.method = "post";
    var sbmt = document.createElement("input");
    sbmt.name = "logout-submit";
    form.appendChild(sbmt);
    document.body.appendChild(form);
    form.submit();
}
