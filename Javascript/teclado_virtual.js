const abecedario = "1234567890abcdefghijklmnñopqrstuvwxyz.,+ -";
const querty = "1234567890qwertyuiopasdfghjklñzxcvbnm.,+ -";

const idLetras = document.getElementById("letras");
const idDisposicionTeclado = document.getElementById("teclado");
let shiftActivado = false;

// Función para mostrar las letras
const mostrarLetras = listadoLetras => {
    idLetras.innerHTML = "";
    // añadimos las letras
    listadoLetras.split('').map(el => {
        let span = document.createElement("span");
        span.addEventListener("click", teclaPulsada);
        span.innerText = el;
        if (el == " ") {
            span.classList.add("space");
        }
        if (el == "-") {
            span.classList.add("delete");
        }
        if (el == "+") {
            span.classList.add("shift");
        }
        idLetras.appendChild(span);
    });
}

// Por defecto, indicamos que muestre el teclado querty
mostrarLetras(querty);

// Función para cambiar entre mayúsculas y minúsculas
function toggleShift() {
    shiftActivado = !shiftActivado;
    const letras = shiftActivado ? querty.toUpperCase() : querty.toLowerCase();
    mostrarLetras(letras);

}

// Función que recibe la pulsación de la tecla
function teclaPulsada(e) {
    const tecla = this.classList && this.classList.contains("space") ? " " : this.innerText;

    if (tecla === "-") {
        // Si es la tecla de borrar, eliminar el último carácter del campo de texto
        const textoCampo = document.getElementById("texto");
        textoCampo.value = textoCampo.value.slice(0, -1);
    } else if (tecla === "+") {
        // Si es la tecla de shift, cambiar el estado y actualizar las letras
        toggleShift();
        document.getElementById("texto").value += tecla;
    } else if (abecedario.indexOf(tecla) >= 0 || tecla === " ") {
        // Agregar el carácter al campo de texto (si es una letra o un espacio)
        document.getElementById("texto").value += tecla;
    }
}

// Evento para cambiar el estilo del teclado
Array.from(idDisposicionTeclado.querySelectorAll("span")).map(el => el.addEventListener("click", function () {
    Array.from(idDisposicionTeclado.querySelectorAll("span")).map(el => el == this ? this.classList.add("selected") : el.classList.remove("selected"));

    const tecla = this.classList && this.classList.contains("space") ? " " : this.innerText;
    if (shiftActivado) {
        // Si el Shift está activado, mostrar la tecla en mayúsculas
        document.getElementById("texto").value += tecla.toUpperCase();
    } else {
        // Si el Shift no está activado, mostrar la tecla en minúsculas
        document.getElementById("texto").value += tecla.toLowerCase();
    }
}));




