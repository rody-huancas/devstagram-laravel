import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    }
});

dropzone.on('sending', function (file, xhr, formData) {
    // console.log(file);
})

// Si se sube correctamente
dropzone.on('success', function (file, response) {
    // console.log(response);
    // console.log(response.imagen);

    // Asignar la imagen subida al input del post en la vista create
    document.querySelector('[name="imagen"]').value = response.imagen;
})

// Si hay un error al subir
dropzone.on('error', function (file, message) {
    // console.log(message);
})

// Borrar archivo
dropzone.on('removedfile', function () {
    // console.log('eliminado');
    // Eliminar el valor del input
    document.querySelector('[name="imagen"]').value = "";
})