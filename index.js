document.addEventListener('DOMContentLoaded', function () {
    const abrirbotao = document.querySelector('.abrirnav');
    const fecharbotao = document.querySelector('.fecharnav');
    abrirbotao.addEventListener('click', abrirlateral());
    fecharbotao.addEventListener('click', fecharlateral());
})
function abrirlateral() {
    const lateral = document.querySelector('.lateral');
    lateral.style.left = '0px';
}
function fecharlateral() {
    const lateral = document.querySelector('.lateral');
    lateral.style.left = '-250px';
}


