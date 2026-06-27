<?php

$wallets = [
    ['client'=> "Aba",'telephone'=> "771234567",'code'=> "1234",'solde'=> 20]
];



function ajoutWallet($nouveauWallet, array &$wallets):array{
    return $wallets[] = $nouveauWallet;
}





?>