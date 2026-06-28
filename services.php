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

?>