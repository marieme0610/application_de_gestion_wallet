<?php

namespace Distributeur\Validator;

// fonction vérification chiffre

function estUnChiffre($tel)
{
    return is_numeric($tel);
}

// fonction vérification longueur données

function verifLongeur($donneeSaisi, $tailleDonnee = 9)
{
    return strlen($donneeSaisi) == $tailleDonnee;
}

// fonction vérification début numero

function verifDebutTel($tel): int
{
    $prefixesValides = ["70", "75", "76", "77", "78"];

    $trouves = array_filter(
        $prefixesValides,
        fn($prefixe) => str_starts_with($tel, $prefixe)
    );

    return count($trouves) > 0;
}

// fonction vérification solde

function verifSolde($solde)
{
    return $solde >= 0;
}

// fonction vérification unicité

function verifUnicite($verif, $wallets)
{
    if (strlen($verif) == 9) {
        $telephones = array_column($wallets, 'telephone');
        $doublons = array_filter($telephones, fn($tel) => $tel == $verif);
        return count($doublons) === 0;
    }

    if (strlen($verif) == 4) {
        $codes = array_column($wallets, 'code');
        $doublons = array_filter($codes, fn($code) => $code == $verif);
        return count($doublons) === 0;
    }

    return false;
}

// fonctions verif nom

function saisiNom($nom): bool
{
    return ctype_alpha(str_replace(" ", "", $nom));
}

function nomEstValide($nom)
{
    return saisiNom($nom);
}

function telEstValide($telephone, $wallets)
{
    if (!estUnChiffre($telephone)) return false;
    if (!verifLongeur($telephone)) return false;
    if (!verifDebutTel($telephone)) return false;
    if (!verifUnicite($telephone, $wallets)) return false;

    return true;
}

function codeEstValide($code, $wallets)
{
    if (!verifLongeur($code, 4)) return false;
    if (!verifUnicite($code, $wallets)) return false;

    return true;
}

function soldeEstValide($solde)
{
    return verifSolde($solde);
}

function verifNumero($numero, $wallets)
{
    $telephones = array_column($wallets, 'telephone');
    return in_array($numero, $telephones);
}

function verifMontant($montant)
{
    return $montant > 0;
}