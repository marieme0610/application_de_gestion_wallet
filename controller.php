<?php
require "services.php";
require "validator.php";

function choixFait($choix, &$wallets, &$transactions)
{
    switch ($choix) {

        case 1:
            $nom = boucleSaisi("Nom: ", "nomValide");
            $tel = boucleSaisi("Téléphone: ", "verifNumero");
            $code = boucleSaisi("Code: ", "verifMontant");
            $solde = boucleSaisi("Solde: ", "soldeValide");

            creationWallet($nom, $tel, $code, $solde, $wallets);
            break;

        case 2:
             $tel = boucleSaisi("Téléphone: ", "verifNumero");
            $montant = boucleSaisi("Montant: ", "verifMontant");

            faireDepot($tel, $montant, $wallets, $transactions);
            break;

        case 3:
             $tel = boucleSaisi("Téléphone: ", "verifNumero");
            $montant = boucleSaisi("Montant: ", "verifMontant");

            faireRetrait($tel, $montant, $wallets, $transactions);
            break;

        case 4:
            break;
    }
}


function boucleSaisi($message, $fonction, &$wallets = null)
{
    do {
        $val = readline($message);

        if ($wallets === null) {
            $ok = $fonction($val);
        } else {
            $ok = $fonction($val, $wallets);
        }

        if (!$ok) {
            echo "Invalide, recommence\n";
        }

    } while (!$ok);

    return $val;
}

