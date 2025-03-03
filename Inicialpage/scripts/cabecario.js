var cabecalho = document.querySelector(".cabecalho");

window.addEventListener("scroll", function() {
    if (window.scrollY > 50) {
        cabecalho.classList.add("borda-ativa");
    } else {
        cabecalho.classList.remove("borda-ativa");
    }
});