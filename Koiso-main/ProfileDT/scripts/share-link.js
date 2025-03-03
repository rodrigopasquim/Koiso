/*COPIAR LINK (INPUT-BOTAO)*/
document.getElementById("botao").addEventListener("click", function() {
    document.getElementById("copylink").select();
    document.execCommand('copy');
    });