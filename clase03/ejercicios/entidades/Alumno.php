<?php
  /*Tomando como punto de partida los ejercicios anteriores, se pide:
  Crear la clase Alumno (en un namespace nombrado con su apellido) 
  con los atributos y métodos necesarios para realizar el CRUD sobre el archivo ./archivos/alumnos.txt
  Las peticiones realizarlas sobre la página nexo_poo.php*/

  namespace Begnis;

  class Alumno {
    public string $nombre;
    public string $apellido;
    public string $legajo;

    public function __construct(string $nombre, string $apellido, string $legajo)
    {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->legajo = $legajo;
    }

    public function agregar($nombreArchivo) : void {
      $archivo = fopen($nombreArchivo, "a");
			$cant = fwrite($archivo, "{$this->legajo} - {$this->apellido} - {$this->nombre}\r\n");
			
			echo $cant > 0 ?	"escritura EXITOSA" : "escritura FALLIDA";
			
			fclose($archivo);
    }

    public function listar($nombreArchivo) : void {
      $ar = fopen($nombreArchivo, "r");

			while(!feof($ar))
			{
				$linea = fgets($ar);
				echo $linea . "<br>";		
			}
	
			fclose($ar);
    }

    public function modificar($nombreArchivo) : void {
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

					if ($legajoRecuperado == $this->legajo) {
						array_push($elementos, "{$legajoRecuperado} - {$this->apellido} - {$this->nombre}\r\n");
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
				echo "El alumno con legajo {$this->legajo} se ha modificado";			
			} else {
				echo "El alumno con legajo {$this->legajo} no se encuentra en el listado";
			}

			fclose($ar);
    }

    public function borrar($nombreArchivo) : void {
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

          if ($legajoRecuperado == $this->legajo) {
            
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
        echo "registro BORRADO";			
      }

      fclose($ar);
    }
  }
?>