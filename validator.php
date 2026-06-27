<?php

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

function verifUnicite($verif, $wallets){

    if (strlen($verif) == 9) {
        foreach ($wallets as $wallet) {
            if ($verif == $wallet['telephone']) {
                return false;
            }
        }
        return true;
    }

    if (strlen($verif) == 4) {
        foreach ($wallets as $wallet) {
            if ($verif == $wallet['code']) {
                return false;
            }
        }
        return true;
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

function verifNumero($numero,$wallets){
    foreach($wallets as $index =>$wallet){
        if($wallet['telephone'] != $numero) return false;
        return true;
    }
}

function verifMontant($montant){
       return  $montant > 0;   
}


?>