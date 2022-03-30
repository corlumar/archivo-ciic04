<?php

require_once "conexion.php";

class ModeloComponentes{

	/*=============================================
	CREAR Componente
	=============================================*/

	static public function mdlIngresarComponente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(componente) VALUES (:componente)");

		$stmt->bindParam(":componente", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ComponenteS
	=============================================*/

	static public function mdlMostrarComponentes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR Componente
	=============================================*/

	static public function mdlEditarComponente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET componente = :componente WHERE id = :id");

		$stmt -> bindParam(":componente", $datos["componente"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR Componente
	=============================================*/

	static public function mdlBorrarComponente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

