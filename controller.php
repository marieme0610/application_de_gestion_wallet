<?php
require "services.php";
require "validator.php";
global $wallets;


function choixFait($choix, array $wallets){
    switch($choix){
        case 1:
                $nom = boucleSaisi("Entrer votre nom: \n","nomEstValide");
                $telephone = boucleSaisi("Entrer votre numero\n: ","telEstValide");
                $code = boucleSaisi("Entrer votre code: ","codeEstValide");
                $solde = boucleSaisi("Entrer votre solde: ","soldeEstValide");

                creationWallet($nom,$telephone,$code,$solde,$wallets);

            break;
        case 2:
            $numero = boucleSaisi("Entrer votre numero de telephone :\n","verifNumero");
            $montantDepot = boucleSaisi("Entrer le montant a deposé :\n","verifMontant");
            faireDepot($numero,$montantDepot,$wallets);
             break;
        case 3:
            echo "retrait";
             break;
        case 4:
            echo "affiche"; 
             break;
       

    }
}


 function boucleSaisi($message, $maFonction){
    global $wallets;

    do {
        $donnee = readline($message);

        $recup = $maFonction($donnee, $wallets);

        if (!$recup){
            echo "Invalide veuillez resaisir !\n";
        }

    } while (!$recup);

    return $donnee;
} 

 






?>