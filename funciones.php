<?php
//Funcions de cada nivell

//--Nivell 1
/*Defineix una variable de cada tipus: integer,double,string i boolean. Després, imprimeix-les per pantalla.</p>
Definim les variables integer,double,string y boolean, i  asignem un valor*/
	$numInt = 10;
	$numDouble = 1.22;
	$varString = "Me llamo Ralph";
	$varBoolean = true;

/*Crea una altra variable string. Després:
Imprimeix per pantalla el tamany(longitud) del dos strings.
Imprimeix per pantalla el dos strings però en ordre invers de caràcters.
Imprimeix la concatenació dels dos strings. */
	//Definim la nova variable y li asinem un valor
	$varStringSegona = "Corre Platano";
	$tamanyPrimera = strlen($varString);
	$tamanySegona = strlen($varStringSegona);
	$primeraReves = strrev($varString);
	$segonaReves = strrev($varStringSegona);
	$stringConcatenats = $varString." ".$varStringSegona;

//Crea una constant que inclogui el teu nom i imprimeix-la per pantalla.
//Definim la nueva constante y le asinamos un valor
	if (!defined('NOM')) define('NOM', 'Esther');

//--Nivell 2
//Crea dos arrays, un que inclogui 5 integers, i un altre que inclogui 3 integers.//
//Definimo les variables  i asignem un valor
	$arrayUn = [1,2,3,4,5];
	$arrayDos = [6,7,8];
//Afegeix un valor més a l'array que conté 3 integers.
//Afegim el nom valor, fem servir una altra variable per no modificar el valor de l'anterior en temp d'execucíó
	$arrayTres =  [6,7,8];
	 array_push($arrayTres,9);
//Mescla els dos arrays i imprimeix el tamany de l'array resultant per pantalla.//
	$resultat = array_merge($arrayUn, $arrayTres);
	$numResultat = count($resultat);

//--Nivell 3
//Imprimeix per pantalla (valor a valor) l'array resultant del nivell anterior.
	function valorAValor($resultat){
		foreach ($resultat as $value){
				echo $value." ";
			};
	};

/*Escriure un programa PHP que realitzi lo següent:
declarar dues variables X e Y de tipus int, dues variables N i M de tipous double i assigna a cada una un valor. */

	$X = 120;
	$Y = 36;
	$N = 1.23;
	$M = 188.694;

/*A continuació, mostra per pantalla, per a X e Y:
El valor de cada variable
La suma
La resta
El producte
La divisió
El mòdul*/
	$sumaXY = $X + $Y;
	$restaXY = $X - $Y;
	$producteXY = $X * $Y;
	$divisioXY = $X / $Y;
	$modulXY = $X % $Y;
/*Per a N i M, lo mateix.*/
	$sumaMN = $M + $N;
	$restaMN = $M - $N;
	$producteMN = $M * $N;
	$divisioMN = $M / $N;
	$modulMN = $M % $N;
/*I per a totes les variables(X,Y,N,M):
El doble de cada variable
La suma de totes les variables
El producte de totes les variables
*/
	$dobleX = $X * 2;
	$dobleY = $Y * 2;
	$dobleM = $M * 2;
	$dobleN = $N * 2;

	$sumaTotes = $X + $Y + $M + $N;
	$producteTotes = $X * $Y * $M * $N


?>