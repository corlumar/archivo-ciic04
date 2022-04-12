<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/componentes.controlador.php";
require_once "controladores/expedientes.controlador.php";
require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/prestamos.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/componentes.modelo.php";
require_once "modelos/expedientes.modelo.php";
require_once "modelos/beneficiarios.modelo.php";
require_once "modelos/prestamos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();