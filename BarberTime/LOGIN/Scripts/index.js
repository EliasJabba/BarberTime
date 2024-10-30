document.addEventListener("DOMContentLoaded", function() {
    // Variables de los formularios y botones
    const loginBtn = document.getElementById("login-btn");
    const registerBtn = document.getElementById("register-btn");
    const loginGroup = document.getElementById("login-group");
    const registerGroup = document.getElementById("register-group");
    const container = document.getElementById("form-container");

    // Controlar la transición entre formularios
    function toggleForms(showLogin) {
        if (showLogin) {
            registerGroup.style.display = 'none';  // Oculta registro
            loginGroup.style.display = 'block';    // Muestra login
            setTimeout(() => loginGroup.classList.add('active'), 50);
            registerGroup.classList.remove('active');
            
            // Cambiar altura del contenedor para login
            container.style.height = '350px'; /* Ajusta la altura para el login */
        } else {
            loginGroup.style.display = 'none';    // Oculta login
            registerGroup.style.display = 'block';  // Muestra registro
            setTimeout(() => registerGroup.classList.add('active'), 50);
            loginGroup.classList.remove('active');

            // Cambiar altura del contenedor para registro
            container.style.height = '500px'; /* Ajusta la altura para el registro */
        }
    }

    // Cuando clicamos en "Registrarse"
    registerBtn.addEventListener("click", function () {
        registerBtn.classList.add("active");
        loginBtn.classList.remove("active");
        toggleForms(false);  // Mostrar el formulario de registro
    });

    // Cuando clicamos en "Iniciar Sesión"
    loginBtn.addEventListener("click", function () {
        loginBtn.classList.add("active");
        registerBtn.classList.remove("active");
        toggleForms(true);  // Mostrar el formulario de login
    });

    // Mostrar alertas de error o éxito con SweetAlert
    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error
        });
    }

    if (success) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: success
        });
    }
});
