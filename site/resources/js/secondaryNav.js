const nav = document.querySelector('.profil_nav');
const click = document.querySelector('.imgClicker');
const img = document.querySelector('.imgClicker img');
const span = document.querySelector('.imgClicker span');


click.addEventListener('click', function () {
    nav.classList.toggle('open');
    nav.classList.toggle('closed');

    img.classList.toggle('arrow_left');
    img.classList.toggle('arrow_right');

    if (img.classList[0] == 'arrow_left') {
        span.innerHTML = 'Enlever la navigation secondaire';
    }
    if (img.classList[0] == 'arrow_right') {
        span.innerHTML = 'Afficher la navigation secondaire';
    }
}, false);

