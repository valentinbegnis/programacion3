<?php
  require "./clases/mascota.php";
  require "./clases/guaderia.php";
  use Animalitos\Mascota;
  use Negocios\Guarderia;

  $mascotaUno = new Mascota("Magne", "Gato", 2);
  $mascotaDos = new Mascota("Magne", "Perro");

  echo $mascotaUno->toString(), "<br>";
  echo Mascota::mostrar($mascotaDos), "<br>";
  echo ($mascotaUno->equals($mascotaDos)) ? "son iguales" : "son distintas" , "<br>";

  $mascotaTres = new Mascota("Rufus", "Gato", 6);
  $mascotaCuatro = new Mascota("Rufus", "Gato", 4);

  echo $mascotaTres->toString() , "<br>";
  echo Mascota::mostrar($mascotaCuatro), "<br>";
  echo ($mascotaTres->equals($mascotaCuatro)) ? "son iguales" : "son distintas", "<br>";

  echo ($mascotaUno->equals($mascotaTres)) ? "son iguales" : "son distintas", "<br>";

  $guarderia = new Guarderia("La guarderia de Pancho");

  $guarderia->add($mascotaUno);
  $guarderia->add($mascotaDos);
  $guarderia->add($mascotaTres);
  $guarderia->add($mascotaCuatro);

  echo $guarderia->toString();
?>