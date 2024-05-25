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
let inputdatanasc = document.getElementById('data');
inputdatanasc.addEventListener('input', function(e) {


    inputdatanasc = e.target;
    let inputValue = inputdatanasc.value;

    // Remove tudo exceto números
    inputValue = inputValue.replace(/\D/g, '');

    // Adiciona as barras automaticamente
    if (inputValue.length > 2) {
        inputValue = inputValue.substring(0, 2) + '/' + inputValue.substring(2);
    }
    if (inputValue.length > 5) {
        inputValue = inputValue.substring(0, 5) + '/' + inputValue.substring(5, 9);
    }

    inputdatanasc.value = inputValue;
});
let inputcpf = document.getElementById('cpf');
inputcpf.addEventListener('input', function(e) {


    inputcpf = e.target;
    let inputValue = inputcpf.value;

    // Remove tudo exceto números
    inputValue = inputValue.replace(/\D/g, '');

    // Adiciona as pontos e traço automaticamente
    if (inputValue.length > 3) {
        inputValue = inputValue.substring(0, 3) + '.' + inputValue.substring(3);
    }
    if (inputValue.length > 7) {
        inputValue = inputValue.substring(0, 7) + '.' + inputValue.substring(7);
    }
    if (inputValue.length > 10) {
        inputValue = inputValue.substring(0, 11) + '-' + inputValue.substring(11, 13);
    }
    

    inputcpf.value = inputValue;
});
let inputtel = document.getElementById('tel');
inputtel.addEventListener('input', function(e) {


    inputtel = e.target;
    let inputValue = inputtel.value;

    // Remove tudo exceto números
    inputValue = inputValue.replace(/\D/g, '');

    // Adiciona as pontos e traço automaticamente
    if (inputValue.length > 0) {
        inputValue = '('+inputValue.substring(0, 2) + ') ' + inputValue.substring(2);
    }
    if (inputValue.length > 10) {
        inputValue = inputValue.substring(0, 10) + '-' + inputValue.substring(10, 14);
    }

    inputtel.value = inputValue;
});
function togglePasswordVisibility(fieldId) {
    const inputField = document.getElementById(fieldId);
    const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
    inputField.setAttribute('type', type);
}


