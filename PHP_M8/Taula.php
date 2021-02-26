<?php
/**
* Crea la BBDD e insereix dades a la base de dades. 
* Modifica les dades i les elimina 
* Obre i tanca la conexió
**/

class Taula {
	//propietats
	protected $server 	= "localhost";
	protected $user 	= "root";
	protected $pass 	= "";
	protected $bbddName = "";

	protected $conn;
	public $totalGeneral;
	public $arrayCompra = array();
	public $fila = array();

	/*function __construct($argument){
		# code...
	}*/

	function conexio($server= "localhost",$user= "root",$pass= "",$bbddName= ""){
		//conexió base de dades
		$this -> conn = new mysqli($server, $user, $pass,$bbddName);
		if (mysqli_connect_errno()) {
		    echo "Fallo al conectar a MySQL: (" . mysqli_connect_errno() . ") ";

		    exit();
		}
	}

	function tancaBBDD(){
		$this -> conn -> close();
	}
	
	function creaBBDDllistaCompra(){
		//creació bbdd
		$result = $this->conn -> query("CREATE SCHEMA IF NOT EXISTS `llistaCompra` DEFAULT CHARACTER SET utf8 ;") ;

	}
	function seleccionaBBDD($database = "llistaCompra"){
		//Selecciona la bbdd
		$result = $this->conn -> query("USE $database");

	}

	function creaTaulaCompra(){
		 $this-> conn -> query ("CREATE TABLE IF NOT EXISTS `llistaCompra`.`compra` (
		 						`id` INT(11) NOT NULL AUTO_INCREMENT,					
		 						`nom` VARCHAR(150) NOT NULL,
								`quantitat` INT(11) NOT NULL,
								`preu` FLOAT NOT NULL,
								PRIMARY KEY (`id`),
								INDEX `nom` (`nom` ASC) )
								ENGINE = InnoDB
								DEFAULT CHARACTER SET = utf8;") ;	
		 $this-> valida();
	}

	function creaAliments($nom,$quantitat,$preu){
		$this-> conn ->query("INSERT INTO compra  values (null,'$nom','$quantitat','$preu')");

		$this-> valida();		
	}

	function mostrar(){
		$resultat = $this-> conn ->query("select * from compra");

		// ens posicionem a la primera fila de resultats
		$resultat->data_seek(0);

		$i = 0;

		while ($fila = $resultat->fetch_assoc()) {
			$i ++;
			$this->arrayCompra[$i]['id'] 		= $fila['id'];
			$this->arrayCompra[$i]['nom'] 		= $fila['nom'];
			$this->arrayCompra[$i]['quantitat'] = $fila['quantitat'];
			$this->arrayCompra[$i]['preu'] 		= $fila['preu'];
			$this->arrayCompra[$i]['total']		= $fila['preu'] * $fila['quantitat'] ;

			$this->preuTotal($this->arrayCompra[$i]['total']);
		}

	}

	function getProducte($id){
		$resultat = $this-> conn ->query("select * from compra where compra.id =".$id);
		// ens posicionem a la primera fila de resultats
		$resultat->data_seek(0);

		while ($fila = $resultat->fetch_assoc()) {
			return $fila;			
		}

	}

	function modifica($id,$nom,$quantitat,$preu){

		//comprovem que el producte existeix
		$fila= $this->getProducte($id);

		if ($fila){		
			$this-> conn ->query("UPDATE  compra SET nom= '$nom', quantitat= '$quantitat', preu= '$preu' WHERE id = '$id'");
			$this-> valida();		
		}


	}

	function elimina($id){
		//comprovem que el producte existeix
		$fila= $this->getProducte($id);
		var_dump($fila);

		if ($fila){		
			$this-> conn ->query("DELETE from compra WHERE id = '$id'");
			$this-> valida();		
		}

	}

	function preuTotal($preu){
		$this->totalGeneral = $this->totalGeneral + $preu;
	}

	function mostraTotalGeneral(){
		return $this->totalGeneral;
	}

	//validem que hi hagi anat bé la query
	function valida(){
		if (!$this -> conn){
			echo $this -> conn -> error;
		}		
		
	}
}

?>