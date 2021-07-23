<?php

require_once "../controladores/catgeorias.controlador.php";
require_once "../modelos/categorias.modelos.php";

class AjaxCategorias{

    /*=============================================
	VALIDAR NO REPETIR CATEGORIA
	=============================================*/	

	public $validarCategoria;

	public function ajaxValidarCategoria(){

		$item = "categoria";
		$valor = $this->validarCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}
