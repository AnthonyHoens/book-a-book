const nav = document.querySelector('#menu');
const click = document.querySelector('#clicker');



click.addEventListener('click', function () {
    nav.classList.toggle('menu_open');
    nav.classList.toggle('menu_closed');

    click.classList.toggle('clicker_closed');
    click.classList.toggle('clicker_open');
}, false);

