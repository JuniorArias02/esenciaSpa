console.log('El js detectar.js se detecto ');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded detectado...');

    const campos = document.querySelectorAll('input[type="number"], input[type="text"], input[type="email"],textarea ');
    campos.forEach(function(input) {
        input.addEventListener('input', function() {
            console.log('evento añadido ' + input.id);
            if (this.value.trim() !== "") {
                this.classList.add('con-contenido');
                console.log('evento añadido ' + input.id);
            } else {
                this.classList.remove('con-contenido');
                console.log('evento  eliminada  ' + input.id);
            }
        });
    });
});
