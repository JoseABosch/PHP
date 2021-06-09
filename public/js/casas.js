'use strict';

document.addEventListener('DOMContentLoaded', (event) => {
    let botonesDeleteJson = document.querySelectorAll('.btn-danger');

    botonesDeleteJson.forEach(boton => {
        boton.addEventListener('click', function (event) {

            console.log(this.href);

            event.preventDefault();

            fetch(this.href, {method : 'DELETE'})
                .then(respuesta => respuesta.json())
                .then(resp => {
                    console.log(this);
                    this.parentElement.parentElement.remove();
                    alert(resp.mensaje);
                });
        });
    })
});

