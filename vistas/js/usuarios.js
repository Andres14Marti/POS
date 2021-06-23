// =============================================================================
//          SUBIENDO FOTO DE USUARIO            
// =============================================================================


$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    // =========================================================================
    // Validar Imagen formato jpg o PNG
    // =========================================================================

        if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
            $(".nuevaFoto").val("");

            Swal.fire({
                title: "Error",
                text: "La imagen debe ser formato JPG o PNG",
                icon: "error",
                confirmButtonText: "Cerrar",
            });
        }else if(imagen["size"] > 2000000){ //validar tama;o mayor a 2mb

            $(".nuevaFoto").val("");

            Swal.fire({
                title: "Error",
                text: "La imagen no debe pesar mas de 2 MB",
                icon: "error",
                confirmButtonText: "Cerrar",
            });

        }
        else{
            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function(event){

                var rutaImagen = event.target.result;

                $(".previsualizar").attr("src", rutaImagen);
            })
        }
})


// =============================================================================
// EDITAR USUARIO
// =============================================================================

$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});

})