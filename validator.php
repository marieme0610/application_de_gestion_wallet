<?php

function estChiffre($tel)
{
    return is_numeric($tel);
}

function longueur($val, $size)
{
    return strlen($val) === $size;
}

function debutNumero($tel)
{
    return str_starts_with($tel, "77") ||
           str_starts_with($tel, "78") ||
           str_starts_with($tel, "76") ||
           str_starts_with($tel, "75");
}

function soldeValide($solde)
{
    return $solde >= 0;
}

function nomValide($nom)
{
    return ctype_alpha(str_replace(" ", "", $nom));
}


function numeroExiste($numero, $wallets)
{
    $res = array_filter($wallets, fn($w) => $w['telephone'] === $numero);
    return !empty($res);
}

function codeExiste($code, $wallets)
{
    $res = array_filter($wallets, fn($w) => $w['code'] === $code);
    return !empty($res);
}

function verifNumero($numero, $wallets)
{
    return numeroExiste($numero, $wallets);
}

function verifMontant($montant)
{
    return $montant > 0;
}