<?php
namespace Distributeur\Services;
 
use function Distributeur\Repository\ajoutWallet;
use function Distributeur\Repository\ajoutTransaction;

function creationWallet($nom,$telephone,$code,$solde, array &$wallets){
 $wallet = [
    'client' => "$nom",
    'telephone' => "$telephone",
    'code' => "$code",
    'solde' => "$solde"
 ];

 ajoutWallet($wallet,$wallets);

}

function faireDepot($telephone, $montant, array &$wallets, array &$transactions)
{
    $index = array_search($telephone, array_column($wallets, 'telephone'));

    if ($index !== false) {

        $wallets[$index]['solde'] += $montant;

        $newTrans = [
            'numero' => "$telephone",
            'type' => "depot",
            'montant' => $montant,
            'frais' => 0,
        ];

        ajoutTransaction($newTrans, $transactions);

        return true;
    }

    return false;
}

function faireRetrait($numeroRetrait,$montantRetrait,array &$wallets, array &$transactions) {

// var_dump($montantRetrait);

$frais = frais($montantRetrait);
// var_dump($frais);
// var_dump($wallets);

$index = array_search($numeroRetrait, array_column($wallets, 'telephone'));

if ($index !== false) {

    if ($wallets[$index]['solde'] < ($montantRetrait + $frais)) {
        $wallets[$index]['solde'];
        return false;
    }

    $wallets[$index]['solde'] -= ($montantRetrait + $frais);

    $newTrans = [
        'numero' => "$numeroRetrait",
        'type' => "retrait",
        'montant' => $montantRetrait,
        'frais' => $frais,
    ];

   ajoutTransaction($newTrans, $transactions);

    return true;
}
    return false;
      
}

function frais($montant){
    if($montant >= 0 && $montant <=10000){
        return 200;
    }
    if($montant >= 10001 && $montant <=100000){
        return 500;
    }
    if($montant > 100000){
        $recup = $montant *1/100;
        if($recup > 5000){
            return 5000;
        }
        else{
            return $recup;
        }
    }
}




// function afficherTransaction($montantDepot,$montantRetrait, array &$transactions){
        
        
// }

?>