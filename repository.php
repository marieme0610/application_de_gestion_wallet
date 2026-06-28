<?php

namespace Distributeur\Repository;

$wallets = [
    ['client'=> "Aba",'telephone'=> "771234567",'code'=> "1234",'solde'=> 10000],
    ['client'=> "Awa",'telephone'=> "771111111",'code'=> "1111",'solde'=> 800000],
    ['client'=> "Baba",'telephone'=> "772222222",'code'=> "2222",'solde'=> 1000]
];

$transactions = [

    ['numero' => '771111111','type' => 'depot','montant' => 5000,'frais' => 500,]
];

function getWalletsInitiaux():array{
    global $wallets;
    return $wallets;
}

function getTransactionsInitiales():array{
    global $transactions;
    return $transactions;
}

function ajoutWallet($nouveauWallet, array &$wallets):array{
    return $wallets[] = $nouveauWallet;
};

function ajoutTransaction($nouveauTrans, array &$transactions):array{
    return $transactions[] = $nouveauTrans;
};





?>