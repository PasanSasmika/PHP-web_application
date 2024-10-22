let menu  = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
}


let darkmood = document.querySelector('#darkmood');

darkmood.onclick = () => {
    if(darkmood.classList.contains('bx-moon')){
        darkmood.classList.replace('bx-moon', 'bx-sun');
        document.body.classList.add('active');
    }else{
        darkmood.classList.replace('bx-sun', 'bx-moon');
        document.body.classList.remove('active');
    }
}



const sr = ScrollReveal({
    origin: 'top',
    distance: '40px',
    duration: '2000',
    reset: true
});

sr.reveal('.home-text, .home-image, .about-text, .box, .s-box, .connect-text, .btn, .contact-box, .table_container, product-container, .gallery-content,.gallery-wrap',{ interval: 200 });

// SHOW FOODS ///

