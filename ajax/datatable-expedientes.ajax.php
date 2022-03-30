<?php

require_once "../controladores/expedientes.controlador.php";
require_once "../modelos/expedientes.modelo.php";

require_once "../controladores/componentes.controlador.php";
require_once "../modelos/componentes.modelo.php";


class TablaExpedientes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaExpedientes(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$expedientes = ControladorExpedientes::ctrMostrarExpedientes($item, $valor, $orden);	

  		if(count($expedientes) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($expedientes); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$expedientes[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $expedientes[$i]["id_componente"];

		  	$componentes = ControladorComponentes::ctrMostrarComponentes($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($expedientes[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$expedientes[$i]["stock"]."</button>";

  			}else if($expedientes[$i]["stock"] > 11 && $expedientes[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$expedientes[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$expedientes[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$expedientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$expedientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$expedientes[$i]["id"]."' codigo='".$expedientes[$i]["codigo"]."' imagen='".$expedientes[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$expedientes[$i]["codigo"].'",
			      "'.$expedientes[$i]["descripcion"].'",
			      "'.$componentes["componente"].'",
			      "'.$stock.'",
			      "'.$expedientes[$i]["precio_compra"].'",
			      "'.$expedientes[$i]["precio_venta"].'",
			      "'.$expedientes[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarExpedientes = new TablaExpedientes();
$activarExpedientes -> mostrarTablaExpedientes();

