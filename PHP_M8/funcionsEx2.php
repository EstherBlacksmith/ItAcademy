<?php
 require_once "accionsComunsBBDD.php";

 if (isset($_POST)){

	 $compra-> creaAliments($_POST['nom'],$_POST['preu'],$_POST['quantitat']);

	 header("Location: index.php");
		die();

}

?>
