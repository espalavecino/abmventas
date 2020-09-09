<?php

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "admin";
$usuario->clave = $usuario->encriptarClave("admin123");
$usuario->nombre = "Esteban";
$usuario->apellido = "Palavecino";
$usuario->correo = "es.palavecino@gmail.com";
$usuario->insertar();



?>