<?php
  namespace Negocios;
  use Animalitos\Mascota;

  class Guarderia {
    public string $nombre;
    public array $mascotas;

    public function __construct(string $nombre)
    {
      $this->nombre = $nombre;
      $this->mascotas = [];
    }

    public static function equals(Guarderia $guarderia, Mascota $mascota) : bool {
      foreach ($guarderia->mascotas as $item) {
        if ($item->equals($mascota)) {
          return true;
        }
      }

      return false;
    }

    public function add(Mascota $mascota) : bool {
      if (Guarderia::equals($this, $mascota)) {
        return false;
      } else {
        array_push($this->mascotas, $mascota);
        return true;
      }
    }

    public function toString() : string {
      $cadena = $this->nombre . "<br>";
      $sumaEdades = 0;

      foreach ($this->mascotas as $item) {
        $cadena .= $item->toString() . "<br>";
        $sumaEdades += $item->edad;
      }

      $cadena .= $sumaEdades / count($this->mascotas);
      return $cadena; 
    }
  }
?>