<?php

require_once "../controladores/expedientes.controlador.php";
require_once "../modelos/expedientes.modelo.php";


class TablaExpedientesVentas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaExpedientesVentas(){

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

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$expedientes[$i]["id"]."'>Agregar</button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$expedientes[$i]["codigo"].'",
			      "'.$expedientes[$i]["descripcion"].'",
			      "'.$stock.'",
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
$activarExpedientesVentas = new TablaExpedientesVentas();
$activarExpedientesVentas -> mostrarTablaExpedientesVentas();

