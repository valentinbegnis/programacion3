<?php
  require "./entidades/Alumno.php";
  use Begnis\Alumno;

  $accion = isset($_REQUEST["accion"]) ? $_REQUEST["accion"] : "";
  $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : "";
  $apellido = isset($_REQUEST["apellido"]) ? $_REQUEST["apellido"] : "";
  $legajo = isset($_REQUEST["legajo"]) ? $_REQUEST["legajo"] : "";

  $nombreArchivo = "./archivos/alumnos.txt";

  $alumno = new Alumno($nombre, $apellido, $legajo);

  // falta un case con "verificar" pero no es importante
  switch ($accion) {
    case "agregar":
      $alumno->agregar($nombreArchivo);   
      break;

    case "listar": 
      $alumno->listar($nombreArchivo);    
      break;

    case "modificar":
      $alumno->modificar($nombreArchivo);
      break;

    case "borrar":
      $alumno->borrar($nombreArchivo);
      break;
  }
?>
