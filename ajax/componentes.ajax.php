<?php

require_once "../controladores/componentes.controlador.php";
require_once "../modelos/componentes.modelo.php";

class AjaxComponentes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idComponente;

	public function ajaxEditarComponente(){

		$item = "id";
		$valor = $this->idComponente;

		$respuesta = ControladorComponentes::ctrMostrarComponentes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idComponente"])){

	$componente = new AjaxComponentes();
	$componente -> idComponente = $_POST["idComponente"];
	$componente -> ajaxEditarComponente();
}
