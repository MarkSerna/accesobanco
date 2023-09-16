const cancelarBtn = document.getElementById('cancelarBtn');
    const aceptarBtn = document.getElementById('aceptarBtn');
    const formulario = document.querySelector('form'); // Asegúrate de seleccionar tu formulario correctamente

    // Agregar un evento de clic al botón "Cancelar" para borrar los campos
    cancelarBtn.addEventListener('click', function() {
        formulario.reset(); // Esto restablecerá todos los campos del formulario
    });

    // Agregar un evento de clic al botón "Aceptar" para enviar el formulario
    aceptarBtn.addEventListener('click', function() {
        formulario.submit(); // Esto enviará el formulario
    });