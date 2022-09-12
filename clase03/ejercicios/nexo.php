<?php
  $accion = isset($_REQUEST["accion"]) ? $_REQUEST["accion"] : "";
  $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : "";
  $apellido = isset($_REQUEST["apellido"]) ? $_REQUEST["apellido"] : "";
  $legajo = isset($_REQUEST["legajo"]) ? $_REQUEST["legajo"] : "";

  $nombreArchivo = "./archivos/alumnos.txt";

	switch ($accion) {
		case "agregar":
			$archivo = fopen($nombreArchivo, "a");
			
			$cant = fwrite($archivo, "{$legajo} - {$apellido} - {$nombre}\r\n");
			
			if($cant > 0)
			{
				echo "<h2> escritura EXITOSA </h2><br/>";			
			}
			
			fclose($archivo);
			break;
		case "listar":
			$ar = fopen($nombreArchivo, "r");

			while(!feof($ar))
			{
				$linea = fgets($ar);
				echo $linea;		
			}
	
			fclose($ar);
			break;
		case "verificar":
			$ar = fopen($nombreArchivo, "r");
			$estaEnBBDD = false;

			while (!feof($ar))
			{
				$linea = fgets($ar);
				$array_linea = explode("-", $linea);
				$array_linea[0] = trim($array_linea[0]);

				if($array_linea[0] != "") {
					$legajoRecuperado = trim($array_linea[0]);
					$apellidoRecuperado = trim($array_linea[1]);
					$nombreRecuperado = trim($array_linea[2]);

					if ($legajoRecuperado == $legajo) {
						$estaEnBBDD = true;
						break;
					} 
				}
			}

			echo $estaEnBBDD 
			? "El alumno con legajo '{$legajo}' se encuentra en la BBDD" 
			: "El alumno con legajo '{$legajo}' NO se encuentra en la BBDD" ; 
			
			fclose($ar);
			break;
		case "modificar":
			$elementos = array();
			$ar = fopen($nombreArchivo, "r");

			while(!feof($ar)) {
				$linea = fgets($ar);
				$array_linea = explode("-", $linea);

				$array_linea[0] = trim($array_linea[0]);

				if($array_linea[0] != "") {
					$legajoRecuperado = trim($array_linea[0]);
					$apellidoRecuperado = trim($array_linea[1]);
					$nombreRecuperado = trim($array_linea[2]);

					if ($legajoRecuperado == $legajo) {
						array_push($elementos, "{$legajoRecuperado} - {$apellido} - {$nombre}\r\n");
					} else {
						array_push($elementos, "{$legajoRecuperado} - {$apellidoRecuperado} - {$nombreRecuperado}\r\n");
					}
				}
			}

			fclose($ar);

			$ar = fopen($nombreArchivo, "w");
			$cant = 0;
			
			foreach ($elementos as $item){
				$cant = fwrite($ar, $item);
			}

			if ($cant > 0)
			{
				echo "El alumno con legajo {$legajo} se ha modificado";			
			} else {
				echo "El alumno con legajo {$legajo} no se encuentra en el listado";
			}

			fclose($ar);
			break;
    case "borrar":
      $elementos = array();
      $ar = fopen($nombreArchivo, "r");

      while(!feof($ar))
      {
        $linea = fgets($ar);
        $array_linea = explode("-", $linea);

        $array_linea[0] = trim($array_linea[0]);

        if($array_linea[0] != ""){
          $legajoRecuperado = trim($array_linea[0]);
          $apellidoRecuperado = trim($array_linea[1]);
          $nombreRecuperado = trim($array_linea[2]);

          if ($legajoRecuperado == $legajo) {
            
            continue;
          }

          array_push($elementos, "{$legajoRecuperado} - {$apellidoRecuperado} - {$nombreRecuperado}\r\n");
        }
      }

      fclose($ar);

      $cant = 0;
      $ar = fopen($nombreArchivo, "w");

      foreach ($elementos as $item){
        $cant = fwrite($ar, $item);
      }

      if ($cant > 0)
      {
        echo "<h2> registro BORRADO </h2><br/>";			
      }

      fclose($ar);
      break;
	}
?>