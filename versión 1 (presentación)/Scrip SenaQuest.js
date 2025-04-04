
// Función para mostrar el formulario de login y desenfocar solo el fondo
function mostrarFormulario() {
    document.getElementById("formulario-login").style.display = "block";
    document.body.classList.add("fondo-desenfocado");
}

function mostrarContactos() {
    document.getElementById("formulario-contacto").style.display = "block";
    document.body.classList.add("fondo-desenfocado");
}

// Función para cerrar el formulario de login y quitar desenfoque
function cerrarFormulario() {
    document.getElementById("formulario-login").style.display = "none";
    document.getElementById("formulario-contacto").style.display ="none";
    document.body.classList.remove("fondo-desenfocado");
}

// Validación básica del formulario de login
function validarFormulario() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "" || password === "") {
        alert("Por favor, complete todos los campos.");
        return false;
    }

    alert("Inicio de sesión exitoso");
    cerrarFormulario();
    return false; // Evita recargar la página
}

// Función para cambiar el tema
function toggleTema() {
    document.body.classList.toggle("tema-oscuro");

    const botonTema = document.querySelector(".boton-tema");
    if (document.body.classList.contains("tema-oscuro")) {
        botonTema.textContent = "Cambiar a Tema Claro";
        localStorage.setItem("tema", "oscuro");
    } else {
        botonTema.textContent = "Cambiar a Tema Oscuro";
        localStorage.setItem("tema", "claro");
    }
}

// Aplicar el tema guardado al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("tema") === "oscuro") {
        document.body.classList.add("tema-oscuro");
        document.querySelector(".boton-tema").textContent = "Cambiar a Tema Claro";
    }
});