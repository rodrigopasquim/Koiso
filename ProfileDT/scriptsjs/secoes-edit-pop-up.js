function mostrarPopup(id) {
    // Esconde todos os pop-ups
    var popups = document.getElementsByClassName('popupsectionative');
    for (var i = 0; i < popups.length; i++) {
    popups[i].style.display = 'none';
    }

    // Mostra o pop-up específico
    var popup = document.getElementById(id);
    popup.style.display = 'block';
}
