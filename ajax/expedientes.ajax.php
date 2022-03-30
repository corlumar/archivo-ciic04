<?php

require_once "../controladores/expedientes.controlador.php";
require_once "../modelos/expedientes.modelo.php";

require_once "../controladores/componentes.controlador.php";
require_once "../modelos/componentes.modelo.php";

class AjaxExpedientes{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID Componente
  =============================================*/
  public $idComponente;

  public function ajaxCrearCodigoExpediente(){

  	$item = "id_componente";
  	$valor = $this->idComponente;
    $orden = "id";

  	$respuesta = ControladorExpedientes::ctrMostrarExpedientes($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idExpediente;
  public $traerExpedientes;
  public $nombreExpediente;

  public function ajaxEditarExpediente(){

    if($this->traerExpedientes == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorExpedientes::ctrMostrarExpedientes($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreExpediente != ""){

      $item = "descripcion";
      $valor = $this->nombreExpediente;
      $orden = "id";

      $respuesta = ControladorExpedientes::ctrMostrarExpedientes($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idExpediente;
      $orden = "id";

      $respuesta = ControladorExpedientes::ctrMostrarExpedientes($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID Componente
=============================================*/	

if(isset($_POST["idComponente"])){

	$codigoExpediente = new AjaxExpedientes();
	$codigoExpediente -> idComponente = $_POST["idComponente"];
	$codigoExpediente -> ajaxCrearCodigoExpediente();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idExpediente"])){

  $editarExpediente = new AjaxExpedientes();
  $editarExpediente -> idExpediente = $_POST["idExpediente"];
  $editarExpediente -> ajaxEditarExpediente();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerExpedientes"])){

  $traerExpedientes = new AjaxExpedientes();
  $traerExpedientes -> traerExpedientes = $_POST["traerExpedientes"];
  $traerExpedientes -> ajaxEditarExpediente();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreExpediente"])){

  $traerExpedientes = new AjaxExpedientes();
  $traerExpedientes -> nombreExpediente = $_POST["nombreExpediente"];
  $traerExpedientes -> ajaxEditarExpediente();

}






