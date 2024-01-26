const rectangle = document.getElementById("modificacoes-salvas");
let position = -50;
const speed = 2; // Ajuste a velocidade aqui (número de pixels por intervalo)

function moveDownAndUp() {
    const interval = setInterval(function () {
    position += speed;
    rectangle.style.top = position + "px";

    if (position >= 30) {
        clearInterval(interval); // Para a animação quando atinge a posição desejada

        setTimeout(function () {
        const returnInterval = setInterval(function () {
            position -= speed;
            rectangle.style.top = position + "px";

            if (position <= -50) {
            clearInterval(returnInterval); // Para a animação quando retorna à posição original
            }
        }, 10); // Intervalo para retorno (ajuste conforme necessário)
        }, 4000); // Tempo de espera antes de retornar (4 segundos)
    }
    }, 10); // Intervalo de atualização (ajuste conforme necessário)
}

moveDownAndUp();