<?php
require "repository.php";
function creationWallet($nom,$telephone,$code,$solde){
 $wallet = [
    'client' => "$nom",
    'telephone' => "$telephone",
    'code' => "$code",
    'solde' => "$solde"
 ];

 ajoutWallet($wallet);

}

?>