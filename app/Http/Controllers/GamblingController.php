<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamblingController extends Controller
{
    /*El joc de daus s’hi juga amb dos daus. En cas que el resultat dels dos daus sigui 7, la partida és guanyada, sinó és perduda. Per poder jugar al joc, 
    t’has de registrar com a jugador amb un nom. Un jugador pot veure un llistat de totes les tirades que ha fet i el percentatge d’èxit.

    Per poder realitzar una tirada, un usuari s’ha de registrar amb un nom no repetit. Al crear-se, se l’hi assigna un identificador numèric únic i una data de registre. 
    Si l’usuari així ho desitja, pots no afegir cap nom i es dirà “ANÒNIM”. Pot haver-hi més d’un jugador “ANÒNIM”.

    Cada jugador pot veure un llistat de totes les tirades que ha fet, amb el valor de cada dau i si s’ha guanyat o no la partida. 
    A més, pot saber el seu percentatge d’èxit per totes les tirades que ha realitzat. 

    No es pot eliminar una partida en concret, però si que es pot eliminar tot el llistat de tirades per un jugador.

    El software ha de permetre llistar tots els jugadors que hi ha al sistema, el percentatge d’èxit de cada jugador i el percentatge d’èxit mig de tots els jugadors en el sistema.*/


    public function getResult(){
        return rand(1, 6);
    }

    public function sumDades(){
        return $this->getResult + $this->getResult;
    }

    public function storeMove(Request $request){
         $request->id; //player id
         $request->d1; //dade_1 result
         $request->d2; //dade_2 result
         
    }


}
