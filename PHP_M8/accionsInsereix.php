<?php 
  include "cabecera.html";
  require_once "accionsComunsBBDD.php";

  $titol      = "Crea un nou producte";
  $nou        = "nou";
  $id         = " ";
  $nom        = " ";
  $preu       = " ";
  $quantitat  = " ";
  $action     = "funcionsEx2.php";
  
 if (isset($_GET['id'])){ 
  $titol  = "Modifica un producte existent";
  $nou = "a modificar";

  $fila   = $compra-> getProducte($id =  $_GET['id']);
  
  $id         = $fila['id'];
  $nom        = $fila['nom'];
  $preu       = $fila['preu'];
  $quantitat  = $fila['quantitat'];
  $action     = "funcionsEx3.php";
  unset ($_GET['id']);
}

?>
