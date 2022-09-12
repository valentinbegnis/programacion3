<?php
  namespace Animalitos;

  class Mascota {
    public string $nombre;
    public string $tipo;
    public int $edad;

    public function __construct(string $nombre, string $tipo, int $edad = 0) {
      $this->nombre = $nombre;
      $this->tipo = $tipo;
      $this->edad = $edad;
    }

    public function toString() : string {
      return "{$this->nombre} - {$this->tipo} - {$this->edad}";
    }

    public static function mostrar(Mascota $mascota) : string {
      return $mascota->toString();
    }

    public function equals(Mascota $mascota) : bool {
      return $mascota != null && $mascota->nombre === $this->nombre && $mascota->tipo === $this->tipo;
    }
  }
?>