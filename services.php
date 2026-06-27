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

function faireDepot($telephone,$montant, array &$wallets){
    foreach ($wallets as $index => $wallet) {
    if($wallet['telephone']==$telephone){
        $wallet[$index]['solde']+=$montant;
        return true;
      }
    }
       return false;
}

?>