<?php

$wallets = [
    ['client'=> "Aba",'telephone'=> "773456678",'code'=> "1234",'solde'=> 0]
];

function ajoutWallet($nouveauWallet):array{
    global $wallets;
    return $wallets[] = $nouveauWallet;
}


?>