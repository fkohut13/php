document.addEventListener('DOMContentLoaded', function () {
    const abrirbotao = document.querySelector('.abrirnav');
    const fecharbotao = document.querySelector('.fecharnav');
    const topobotao = document.querySelector('.topo-btn');
    topobotao.addEventListener('click', subirprotopo())
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

function subirprotopo() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


