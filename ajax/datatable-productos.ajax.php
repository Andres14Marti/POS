<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelos.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelos.php";



class TablaProductos{
    // -------------------------------------------------------------------------
    // Mostrar la tabla de productos
    // -------------------------------------------------------------------------

        public function mostrarTablaProductos(){

           

            $item = null;
            $valor = null;

            $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

            // var_dump($productos);
             // $imagen = "<img scr= '".$productos[$i]["imagen"]."'> "; //ruta de la imagen
             


            // ---------------------------------------------------------------------
            // RECORRIDO DE BD EN ARCHIVO JSON
            // --------------------------------------------------------------------

                    $datosJson = '{
                        "data": [';
                        for($i = 0; $i < count($productos); $i++){

                        
                            $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

                            /*=============================================
 	 		                TRAEMOS LA IMAGEN
                            =============================================*/ 

                            $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

                            /*=============================================
                            TRAEMOS LA CATEGORÍA
                            =============================================*/ 

                            $item = "id";
                            $valor = $productos[$i]["id_categorias"];

                            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                    /*=============================================
                                    STOCK
                                    =============================================*/ 

                                    if($productos[$i]["stock"] <= 10){

                                        $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

                                    }else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

                                        $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

                                    }else{

                                        $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

                                    }


                          // ---------------------------------------------------
                          // CARGAR DATOS DE BD EN JSON
                          // ---------------------------------------------------S
                    
                                $datosJson .='[
                                    "'.($i+1).'",
                                    "'.$imagen.'",
                                    "'.$productos[$i]["codigo"].'",
                                    "'.$productos[$i]["descripcion"].'",
                                    "'.$categorias["categoria"].'",
                                    "'.$stock.'",
                                    "'.$productos[$i]["unidades_caja"].'",
                                    "L '.number_format($productos[$i]["precio_caja"]).'",
                                    "L '.number_format($productos[$i]["precio_compra"]).'",
                                    "L '.number_format($productos[$i]["precio_venta"]).'",
                                    "'.$productos[$i]["fecha"].'",
                                    "'.$botones.'"
                                ],';

                        }  
                        $datosJson = substr($datosJson, 0, -1);
                
                         $datosJson .= ']

                        }';

                    echo $datosJson;        
                
        }
    }
/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();
