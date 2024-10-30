document.addEventListener("DOMContentLoaded", function() {
const fondo = document.querySelector(".fondo");
const loginlink = document.querySelector(".login-link");
const registrarlink = document.querySelector(".registrar-link");
const btn = document.querySelector(".btn");
const btnm = document.querySelector(".btnm");

const iconocerrar = document.querySelector(".icono-cerrar");


registrarlink.addEventListener("click", () => {

	fondo.classList.add('active');
});

loginlink.addEventListener("click", () =>{
	fondo.classList.remove('active');
});

btn.addEventListener("click", () =>{
	fondo.classList.add('active-btn');
});

btnm.addEventListener("click", () =>{
	fondo.classList.add('active-btn');
});



iconocerrar.addEventListener("click", () =>{
	fondo.classList.remove('active-btn');
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
	