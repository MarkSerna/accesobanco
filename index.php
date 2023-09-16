<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Ingreso usuarios</title>
</head>

<body>
    <div class="formulario_container">
        <h2>Datos de Acceso</h2>
        <div class="formulario_window">
            <form action="./php/login.php" class="form" method="POST">
                <div class="container">
                <div class="left_side">
                    
                    <select id="tipo_identificacion" name="tipo_identificacion" class="custom-select" required>
                        <!-- Se desactivó la primer opcion para que deban escoger las demás -->
                        <option value="" disabled selected hidden>Seleccione un tipo de identificación</option>
                        <option value="cc">Cédula de ciudadanía</option>
                        <option value="ce">Cédula de extranjería</option>
                        <option value="ti">Tarjeta de identidad</option>
                        <option value="pas">Pasaporte</option>
                    </select><br>
                    <input class="effect" type="number" name="nuip" id="cedulaInput" placeholder="Número de Identificación" required>
                    <div id="respuesta_cedula" style="text-align: left; font-size: 12px;"> </div>
                        <input type="password" class="contrasena" name="clave" placeholder="Contraseña" id="texto" disabled>
                    </div>
                </div>
                <div class="right_side">
                    <div class="right_container">
                        <img src="./Images/warning.png" alt="">
                        <div class="text-column">
                            <h4>Teclado virtual para ingreso de contraseña.</h4>
                            <p>Ingrese su contraseña utilizando el teclado que muestra la pantalla. Recuerde que su longitud debe ser de 8 caracteres alfanuméricos y tenga en cuenta que reconoce el ingreso de minúsculas y mayúsculas.</p>
                    </div>
                    </div>
                    
                    <!-- solo se cambió de lugar -->
                    <div id="teclado">
                        <div id="letras"></div>
                    </div>
                </div>
                </div>
                
                <div class="button_container">
                    <button class="custom-btn btn-8" id="cancelarBtn"><span>Cancelar</span></button>
                    <button class="custom-btn btn-8" id="aceptarBtn"><span>Aceptar</span></button>
                </div>
            </form>
        </div>

    </div>
    <script src="Javascript/teclado_virtual.js"></script>
    <script src="../Javascript/script.js"></script>
    <script>
        const cedulaInput = document.getElementById('cedulaInput');
        const respuestaDiv = document.getElementById('respuesta_cedula');
        const camposAActivar = document.querySelectorAll('.formulario_container input:not(#cedulaInput)');

        cedulaInput.addEventListener('input', () => {
            const cedula = cedulaInput.value.trim();

            /* Verifica si la cédula ya existe en la base de datos */

            fetch(`./PHP/validarcedula.php?nuip=${cedula}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.existe) {
                        respuestaDiv.textContent = 'La cédula no se encuentra registrada.';
                        respuestaDiv.style.color = 'red';
                        camposAActivar.forEach(input => input.disabled = true);
                    } else {
                        respuestaDiv.textContent = '';
                        respuestaDiv.style.color = ''; // Restaura el color del texto
                        camposAActivar.forEach(input => input.disabled = false);
                    }
                })
                .catch(error => {
                    console.error('Error al verificar cédula:', error);
                });
        });
    </script>



</body>

</html>