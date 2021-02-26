 <?php
 require_once "Taula.php";

//Creem coneció i la base de dades i la taula en cas de que no existeixin
 $compra = new Taula();

 $compra-> conexio();
 $compra-> creaBBDDllistaCompra(); 
 $compra-> seleccionaBBDD();
 $compra-> creaTaulaCompra();

 ?>