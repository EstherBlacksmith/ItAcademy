<?php
//Funcions de cada nivell
/*Nivell 1
 Exercici 1
Programa la funció "resta" que, donats dos paràmetres ens retorni la resta dels dos números.*/

function resta($num1,$num2){
	return  $num1 - $num2;
}

/*Exercici 2
Programa una lògica que, donat un número qualsevol(per exemple,la teva edat) ens digui si és parell o imparell mitjançant un missatge per pantalla.*/
	$numEntrada = 2;
	$parellSenar = " és par.";
	if (($numEntrada%2!==0) ){
		$parellSenar = " és impar.";
	}

/*Exercici 3
Agafa la lògica de l'exercici 2 i encapsulala en una funció de nom parell_o_imparell. Invoca aquesta funció per a comprovar que funciona correctament.*/

function parell_o_imparell($numEntrada){
	$parellSenar = " és par.";
	if (($numEntrada%2!==0) ){
		$parellSenar = " és impar.";
	}
	echo "El número ".$numEntrada.$parellSenar;
}

/* Exercici 4
Programa un bucle que compti fins a 10, mostrant cada  número per pantalla.*/
/*
for ($numero = 1; $numero<= 10; $numero++){
echo $numero." ";
}*/

//--Nivell 2
/* Exercici 1
Per jugar a "l'amagatall"  se'ns ha demanat un programa que compti fins a 10. Però la persona que comptarà és una mica tramposa y ho farà comptant de dos en dos. Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla.
*/
function amagatall1(){
	$numero = 0;
	while($numero <= 10){
			echo $numero." ";
			$numero = $numero + 2;
	}
}

/*Exercici 2
Imagina't que volem que conti fins a un número diferent de 10. Programa la funció per a que el final del compte estigui parametritzat.
*/
function amagatall2($limit){
	$numero = 0;
	while($numero <= $limit){
		echo $numero." ";
		$numero = $numero + 2;
	}
}


/*Exercici 3
Per a prevenir oblits al utilitzar la nostra meravellosa funció "amagatall" establirem un paràmetre per defecte a 10 en la funció que s'encarrega de fer aquest compte.
*/

function comptar2($limit = 10){
	$numero = 0;
	while($numero < $limit){
			echo $numero." ";
			$numero = $numero + 2;
	}
}

//--Nivell 3//
/*Exercici 1
Ens han demanat un llistat amb tots els anys on es van produir jocs olímpics desde 1960(Roma, inclós) fins al 2016(Río de Janeiro,també inclós). Programa un bucle que mostri per pantalla els anys olímpics dins de l'interval esmentat.
*/

function olimpics(){
	for ($olimpiada = 1960; $olimpiada <= 2016; $olimpiada = $olimpiada + 4){
		echo $olimpiada." ";
	}
}


/*Exercici 2
Imagina que som a una botiga on es ven:

Xocolata: 1 euro
Xiclets: 0.50 euros
Carmels: 1.50 euros
Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus. Per exemple, que si comprem:

2 xocolates, 1 de xiclets i 1 de carmels, tinguem un programa que permeti anar afegint els subtotals a un total, tal que així,

funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2+0.5+1.5

Sent per tant el total, 4.
*/

function caixaBotiga($xocQuantitat = 2,  $xicQuantitat = 1, $carQuantitat = 1){
	//Array amb els valors dels productes
	$arrayCAixa = array("xocolata" => 1, "xiclets" => 0.5, "caramels" => 1 );
	foreach( $arrayCAixa as $producte => $valor) {
		$totalCaixa = $xocQuantitat *  $valor;
		$totalCaixa = $totalCaixa + ($xicQuantitat * $valor);
		$totalCaixa = $totalCaixa + ($carQuantitat * $valor);
	}
	return "El total és ".  $totalCaixa;
}


/*- Exercici 3
La criba d'Eratóstenes és un algoritme pensat per a trobar nombres primers dins d'un interval donat. Basats en l'informació de l'enllaç adjunt, implementa la criba d'Eratóstenes dins d'una funció, de tal forma que poguem invocar la funció per a un número concret.
*/

//Criba de Eratóstenes
function Eratostenes($numMax,$numActual){
	//Obtindre la llista de números
	for($i=2;$i<$numMax;$i++)
	{
	  $llistaPrimers[$i]=true;
	}

	//Fer que el 2 sigui el primer número primer
	$llistaPrimers[2]=true;

	//Recorrer los números y para cada uno
	for ($ii=2;$ii<$numMax;$ii++){
		//Si el quadrat del número actual es major que el número final, sortim
		if ($ii**2 < $numMax){
		  //Si és primer: recorrer los múltiples y marcar-los como no primer
		  if ($llistaPrimers[$ii] == true){
		    for ($i=$ii*$ii;$i<$numMax;$i+=$ii){
		       $llistaPrimers[$i] = false;
		    }
		  }
		}
	}
	//Mostrem els primers
	echo "Primers: ";
	for ($ii = 2; $ii < $numMax; $ii++){
	  if ($llistaPrimers[$ii] == true){
	    echo $ii." ";
	  }
	}
}

?>