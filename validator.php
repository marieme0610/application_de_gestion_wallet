<?php

namespace Distributeur\Validator;
//fonction vrification chiffre

function estUnChiffre($tel){
    $test = is_numeric($tel);
    return $test;
}

//fonction vrification longeur données

function verifLongeur($donneeSaisi,$tailleDonnee = 9){
    $recup = strlen($donneeSaisi);
    return $recup == $tailleDonnee; 
    }

//fonction vrification debut numero

function verifDebutTel($tel):int{
    $verif = str_starts_with($tel,"70")||
             str_starts_with($tel,"75")||
             str_starts_with($tel,"76")||
             str_starts_with($tel,"77")||
             str_starts_with($tel,"78");
    return $verif;
}

//fonction vrification solde

function verifSolde($solde){
    return $solde >= 0;   
}

//fonction vrification unicité
function verifUnicite($verif, $wallets)
{
    if (strlen($verif) == 9) {
        $res = array_filter($wallets, fn($w) => $w['telephone'] === $verif);
        return empty($res);
    }

    if (strlen($verif) == 4) {
        $res = array_filter($wallets, fn($w) => $w['code'] === $verif);
        return empty($res);
    }

    return false;
}

//fonctions verif nom

function saisiNom($nom):bool{
   return ctype_alpha(str_replace(" ", "",$nom));
}

function nomEstValide($nom){
    return (saisiNom($nom));
}

function telEstValide($telephone,$wallets){
    if(!estUnChiffre($telephone))return false;
    if(!verifLongeur($telephone))return false;
    if(!verifDebutTel($telephone))return false;
    if(!verifUnicite($telephone,$wallets))return false;
        
    return true;
}

function codeEstValide($code,$wallets){
    if(!verifLongeur($code,4)) return false;
    if(!verifUnicite($code,$wallets))return false;

    return true;

}

function soldeEstValide($solde){
    return (verifSolde($solde));
}

function verifNumero($numero, $wallets)
{
    $res = array_filter($wallets, fn($w) => $w['telephone'] === $numero);
    return !empty($res);
}

function verifMontant($montant){
       return  $montant > 0;   
}




?>