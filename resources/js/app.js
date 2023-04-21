import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false
});

dropzone.on('sending', function (file, xhr, formData) {
    // console.log(file);
})

// Si se sube correctamente
dropzone.on('success', function (file, response) {
    console.log(response);
})

// Si hay un error al subir
dropzone.on('error', function (file, message) {
    console.log(message);
})

// Borrar archivo
dropzone.on('removedfile', function () {
    console.log('eliminado');
})