<?php
require "repository.php";
function creationWallet($nom,$telephone,$code,$solde, array &$wallets){
 $wallet = [
    'client' => "$nom",
    'telephone' => "$telephone",
    'code' => "$code",
    'solde' => "$solde"
 ];

 ajoutWallet($wallet,$wallets);

}

function faireDepot($telephone,$montant, array &$wallets, array &$transactions){
    foreach ($wallets as $index => $wallet) {
    if($wallet['telephone']==$telephone){
        $wallets[$index]['solde']+=$montant;

         $newTrans = [
            'numero' => "$telephone",
            'type' => "depot",
            'montant'=>$montant,
            'frais'=> 0,
        ];
        ajoutTransaction($newTrans,$transactions);
         return true;
      }
    }
       return false;
}

function faireRetrait($numeroRetrait,$montantRetrait,array &$wallets, array &$transactions) {

var_dump($montantRetrait);
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
$frais = frais($montantRetrait);
var_dump($frais);
var_dump($wallets);

foreach ($wallets as $index => $wallet) {
    if($wallet['telephone'] == $numeroRetrait){
     if($wallet['solde'] < $montantRetrait + $frais ){
        var_dump($wallet['solde']);
        return false;
       }
       else{
        var_dump($wallets[$index]['solde'] -= ($montantRetrait +$frais));
         $newTrans = [
            'numero' => "$numeroRetrait",
            'type' => "retrait",
            'montant'=>$montantRetrait,
            'frais'=> $frais,

        ];

        var_dump($newTrans);
        var_dump(ajoutTransaction($newTrans,$transactions));
        return true;
       }
    }

   
    
    }
    return false;
      
}




// function afficherTransaction($montantDepot,$montantRetrait, array &$transactions){
        
        
// }

?>