<?php
 require_once "accionsComunsBBDD.php";

 if (isset($_GET)){
	 $compra-> elimina($_GET['id']);

	 header("Location: index.php");
		die();

}


?>
