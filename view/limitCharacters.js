var divs = document.querySelectorAll('.minhaDiv'); // Seleciona todas as divs com a classe "minhaDiv"
var limiteCaracteres = 400; // Defina o número máximo de caracteres que você deseja exibir

divs.forEach(function (div) {
    var texto = div.textContent.trim(); // Remove espaços em branco no início e no final do texto

    if (texto.length > limiteCaracteres) {
        texto = texto.slice(0, limiteCaracteres) + ' [...]'; // Adicione " etc" ao final do texto
        div.textContent = texto;
    }
});