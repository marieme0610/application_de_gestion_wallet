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

function calculFrais($montant)
{
    if ($montant <= 10000) return 200;
    if ($montant <= 100000) return 500;

    $frais = $montant * 0.01;
    return ($frais > 5000) ? 5000 : $frais;
}


function faireRetrait($numero, $montant, &$wallets, &$transactions)
{
    $frais = calculFrais($montant);
    $total = $montant + $frais;

    $valide = false;

    $wallets = array_map(function ($w) use ($numero, $total, $montant, $frais, &$valide) {

        if ($w['telephone'] === $numero && $w['solde'] >= $total) {
            $w['solde'] -= $total;
            $valide = true;
        }

        return $w;

    }, $wallets);

    if ($valide) {
        $transactions[] = [
            'numero' => $numero,
            'type' => 'retrait',
            'montant' => $montant,
            'frais' => $frais
        ];
    }

    return $valide;
}

?>