// Subiendo foto de usuario
$(".nuevaFoto").change( function () {
    var imagen = this.files[0];
    
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        
        Swal.fire({
            title: "¡La imagen debe estar en formato .png o .jpg!",
            icon: "error",
            confirmButtonText: "Cerrar"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        
        Swal.fire({
            title: "¡La imagen no debe pesar más de 2MB!",
            icon: "error",
            confirmButtonText: "Cerrar"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        });
    }
});