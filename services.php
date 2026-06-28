<?php
require "repository.php";


function creationWallet($nom, $telephone, $code, $solde, &$wallets)
{
    $wallets[] = [
        'client' => $nom,
        'telephone' => $telephone,
        'code' => $code,
        'solde' => $solde
    ];
}

function faireDepot($telephone, $montant, &$wallets, &$transactions)
{
    $wallets = array_map(function ($w) use ($telephone, $montant) {

        if ($w['telephone'] === $telephone) {
            $w['solde'] += $montant;
        }

        return $w;

    }, $wallets);

    $transactions[] = [
        'numero' => $telephone,
        'type' => 'depot',
        'montant' => $montant,
        'frais' => 0
    ];

    return true;
}


?>