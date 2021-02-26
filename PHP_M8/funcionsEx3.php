<?php
 require_once "accionsComunsBBDD.php";

 if (isset($_POST)){

	 $compra-> modifica($_POST['id'],$_POST['nom'],$_POST['preu'],$_POST['quantitat']);

	 header("Location: index.php");
		die();
}

?>
