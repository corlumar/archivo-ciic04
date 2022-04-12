<?php

class ControladorComponentes{

	/*=============================================
	CREAR COMPONENTES
	=============================================*/

	static public function ctrCrearComponente(){

		if(isset($_POST["nuevaComponente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaComponente"])){

				$tabla = "componentes";

				$datos = $_POST["nuevaComponente"];

				$respuesta = ModeloComponentes::mdlIngresarComponente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La componente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "componentes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El componente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "componentes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ComponenteS
	=============================================*/

	static public function ctrMostrarComponentes($item, $valor){

		$tabla = "componentes";

		$respuesta = ModeloComponentes::mdlMostrarComponentes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR Componente
	=============================================*/

	static public function ctrEditarComponente(){

		if(isset($_POST["editarComponente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarComponente"])){

				$tabla = "componentes";

				$datos = array("componente"=>$_POST["editarComponente"],
							   "id"=>$_POST["idComponente"]);

				$respuesta = ModeloComponentes::mdlEditarComponente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La componente ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "componentes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El componente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "componentes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR Componente
	=============================================*/

	static public function ctrBorrarComponente(){

		if(isset($_GET["idComponente"])){

			$tabla ="Componentes";
			$datos = $_GET["idComponente"];

			$respuesta = ModeloComponentes::mdlBorrarComponente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El componente ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "componentes";

									}
								})

					</script>';
			}
		}
		
	}
}
