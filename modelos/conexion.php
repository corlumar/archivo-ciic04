<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=archivo-ciic4",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}