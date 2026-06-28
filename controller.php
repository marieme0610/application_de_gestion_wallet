<?php
namespace Distributeur\Controller;
 
use function Distributeur\Services\creationWallet;
use function Distributeur\Services\faireDepot;
use function Distributeur\Services\faireRetrait;
use function Distributeur\Validator\nomEstValide;
use function Distributeur\Validator\telEstValide;
use function Distributeur\Validator\codeEstValide;
use function Distributeur\Validator\soldeEstValide;
use function Distributeur\Validator\verifNumero;
use function Distributeur\Validator\verifMontant;

function choixFait($choix, array &$wallets, array &$transactions){
    switch($choix){
        case 1:
                $nom = boucleSaisi("Entrer votre nom: \n","Distributeur\\Validator\\nomEstValide",$wallets);
                $telephone = boucleSaisi("Entrer votre numero\n: ","Distributeur\\Validator\\telEstValide",$wallets);
                $code = boucleSaisi("Entrer votre code: ","Distributeur\\Validator\\codeEstValide",$wallets);
                $solde = boucleSaisi("Entrer votre solde: ","Distributeur\\Validator\\soldeEstValide",$wallets);

                creationWallet($nom,$telephone,$code,$solde,$wallets);
                if(creationWallet($nom,$telephone,$code,$solde,$wallets)){
                    echo "Creation avec success !\n";
                } 
                else{
                    echo "Echec de creation !\n";
                }

            break;
        case 2:
            $numero = boucleSaisi("Entrer votre numero de telephone :\n","Distributeur\\Validator\\verifNumero",$wallets);
            $montantDepot = boucleSaisi("Entrer le montant a deposé :\n","Distributeur\\Validator\\verifMontant",$wallets);
            faireDepot($numero,$montantDepot,$wallets,$transactions);
            if(faireDepot($numero,$montantDepot,$wallets,$transactions)){
                echo "Depot reussit !\n";
            }
            else{
                echo "Echec du depot !\n";
            }
             break;
        case 3:
            $numeroRetrait = boucleSaisi("Entrer votre numero de telephone :\n","Distributeur\\Validator\\verifNumero",$wallets);
            $montantRetrait = boucleSaisi("Entrer le montant a retiré :\n","Distributeur\\Validator\\verifMontant",$wallets);
            faireRetrait($numeroRetrait,$montantRetrait,$wallets,$transactions);
            if(faireRetrait($numeroRetrait,$montantRetrait,$wallets,$transactions)){
                echo "Retrait reussit !\n";
            }
             else{
                echo "Echec du retrait: solde inssufisant !\n";
            }
             break;
        case 4:
            afficherTransactions($transactions);
             break;
       

    }
}


 function boucleSaisi($message, $maFonction, array &$wallets){

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