<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SenaQuest inicio</title>
</head>
<link rel="icon" type="image/png" href="image.png">
<link rel="stylesheet" href="Style base.css">

<!-- cuerpo del html inicio-->
<body>



    <!-- Botón para cambiar tema -->
    <button class="boton-tema" onclick="toggleTema()">Cambiar Tema</button>

    <!-- Contenedor principal para desenfoque -->
    <div id="contenido">
        <!-- Menú de navegación -->
        <nav>
            <ul>
                <li class="logo">
                    <img src="image.png" alt="logo">
                    </li>

                <li><a href="error 404.html">Inicio</a></li>
                <li><a href="encuestas.html">Acerca de</a></li>
                <li><a href="#" onclick="mostrarFormulario()">Iniciar sesión</a></li>
                <li><a href="https://oferta.senasofiaplus.edu.co/sofia-oferta/">Sofia plus</a></li>
                <li><a href="#" onclick="mostrarContactos()">Contacto</a></li>
                
            </ul>
        </nav>
        
        <section id="contenido-principal" class="contenido-principal">
            <h1 style="text-align: center; color: #218838; font-size: 2.5rem; margin-bottom: 20px;">
                Bienvenido a SenaQuest <span style="color: #34d058;">💡</span>
            </h1>
            <p style="text-align: center; font-size: 1.2rem; color: var(--texto-primario); max-width: 800px; margin: 0 auto;">
                <strong>SenaQuest</strong> es el lugar donde tu opinión impulsa la mejora y construcción de una educación de calidad. Aquí los instructores del SENA reciben tus críticas constructivas para crecer juntos.
            </p>


        <!--estas son las tarjetas -->
            <div style="display: flex; flex-wrap: wrap; justify-content: center; margin-top: 40px;">
                <!-- Tarjeta 1 -->
                <div class="tarjeta">
                    <img src="city.jpg" alt="Mis Opiniones" class="tarjeta-icono">
                    <h3>Mis Opiniones</h3>
                    <p>
                        Ayuda a mejorar el SENA evaluando a tus instructores de manera constructiva y efectiva.
                    </p>
                </div>
        
                <!-- Tarjeta 2 -->
                <div class="tarjeta">
                    <img src="arboles.jpg" alt="Calidad Educativa" class="tarjeta-icono">
                    <h3>Calidad Educativa</h3>
                    <p>
                        Con tus sugerencias, construimos una experiencia educativa más enriquecedora para todos.
                    </p>
                </div>
        
                <!-- Tarjeta 3 -->
                <div class="tarjeta">
                    <a href="#" onclick="mostrarContactos()">
                        <img src="cat.jpg" alt="Sobre Nosotros" class="tarjeta-icono">
                    </a>
                    <h3>Sobre Nosotros</h3>
                    <p>
                        Nacimos con la idea de 3 aprendices para mejorar y construir juntos un futuro educativo más brillante.
                    </p>
                </div>
            </div>
        </section>
        
        
    </div>




    <!-- Formulario de inicio de sesión -->
    <div id="formulario-login" class="oculto">
        <?php
            if (isset($_GET['error'])){
                echo "<p style='color: red; text-align: center;'> ".htmlspecialchars($_GET['error']). "</p>";
            }
        ?>

        <form id="loginForm" action="login.php" method="POST" >
            <h2>Iniciar sesión</h2>
            

            <label for="rol">Escoja su rol dento de</label>
            <select name="rol" id="rol">
                <option value="aprendiz">Aprendiz</option>
                <option value="Instructor">Instructor</option>
                <option value="Administrador">Administrador</option>
            </select>

            <label for="username">Número De Documento:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <p class="enlace-creacion-cuenta">¿No tienes cuenta? <a href="registro.html" target="_blank">Crea tu cuenta aquí</a></p>
            
            <div class="form-buttons">
                <button type="submit" class="btn-ingresar">Ingresar</button>
                <button type="button" class="btn-cancelar" onclick="cerrarFormulario()">Cancelar</button>
            </div>
        </form>
    </div>

    <div>
        <div id="formulario-contacto" class="oculto">
            <form id="loginForm" onsubmit="return validarFormulario()">
                <h1>contactos</h1>
                
                <div class="tarjeta">
                    <img src="ojode pez juanes.jpg" alt="ciudad" class="tarjeta-icono">
                    <pre><a href="https://www.instagram.com/stephan_indie/">juanes.indie</a> instagram de Juanes</pre>
                    <pre><a href="https://www.facebook.com/juan.alkoliryco">juanes alkoliryco</a> facebook de Juanes</pre>
                    <pre>numero: 3236004869</pre>
                </div>
    
                <div class="tarjeta">
                    <img src="nico.jpg" alt="nico" class="tarjeta-icono">
                    <pre><a href="https://www.instagram.com/nicosstiven/">instagram de</a> Nicolás Gómez </pre>
                    <pre><a href="https://www.facebook.com/nicolasstivem.gomeznieto">Nicolás Gómez </a>facebook de nico</pre>
                    <pre>numero: 3132646622</pre>
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn-cancelar" onclick="cerrarFormulario()">Regresar</button>
                </div>    
            </form> 
        </div>
    </div>
    
    <script>
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
    </script>
</body>
</html>
