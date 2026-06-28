<?php
require "services.php";
require "validator.php";
global $wallets;


function choixFait($choix, array $wallets, array $transactions){
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
            faireDepot($numero,$montantDepot,$wallets,$transactions);
             break;
        case 3:
            $numeroRetrait = boucleSaisi("Entrer votre numero de telephone :\n","verifNumero");
            $montantRetrait = boucleSaisi("Entrer le montant a retiré :\n","verifMontant");
            faireRetrait($numeroRetrait,$montantRetrait,$wallets,$transactions);
             break;
        case 4:
            afficherTransactions($transactions);
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

function afficherTransactions(array $transactions)
{
    if (empty($transactions)) {
        echo "Aucune transaction enregistrée.\n";
        return;
    }

    foreach ($transactions as $index => $transaction) {
        echo "========== Transaction " . ($index + 1) . " ==========\n";
        echo "Numéro   : " . $transaction['numero'] . "\n";
        echo "Type     : " . $transaction['type'] . "\n";
        echo "Montant  : " . $transaction['montant'] . " FCFA\n";
        echo "Frais    : " . $transaction['frais'] . " FCFA\n";
    }
}
 
?>