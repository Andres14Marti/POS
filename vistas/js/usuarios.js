// =============================================================================
//          SUBIENDO FOTO DE USUARIO            
// =============================================================================


$(".nuevaFoto").change(function() {

    var imagen = this.files[0];
    // =========================================================================
    // Validar Imagen formato jpg o PNG
    // =========================================================================

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");

        Swal.fire({
            title: "Error",
            text: "La imagen debe ser formato JPG o PNG",
            icon: "error",
            confirmButtonText: "Cerrar",
        });
    } else if (imagen["size"] > 2000000) { //validar tama;o mayor a 2mb

        $(".nuevaFoto").val("");

        Swal.fire({
            title: "Error",
            text: "La imagen no debe pesar mas de 2 MB",
            icon: "error",
            confirmButtonText: "Cerrar",
        });

    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})


// =============================================================================
// EDITAR USUARIO
// =============================================================================

$(".btnEditarUsuario").click(function() {

    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);

            }

        }

    });

})

// =============================================================================
//ACTIVAR USUARIO
// =============================================================================

$(".btnActivar").click(function() {

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {


        }
    })

    if (estadoUsuario == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);


    } else {

        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);
    }
})