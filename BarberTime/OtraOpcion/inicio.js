document.addEventListener('DOMContentLoaded', () => {
    // Obtener los elementos del DOM
    const menuIcon = document.querySelector('.menu-icon');
    const menuOverlay = document.querySelector('.menu-overlay');
    const menuClose = document.querySelector('.menu-close');

    // Cuando se haga clic en el icono del menú (hamburguesa)
    menuIcon.addEventListener('click', () => {
        menuOverlay.classList.add('active'); // Mostrar el menú
    });

    // Cuando se haga clic en el botón de cerrar (X)
    menuClose.addEventListener('click', () => {
        menuOverlay.classList.remove('active'); // Cerrar el menú
    });
});