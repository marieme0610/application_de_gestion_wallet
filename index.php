<?php
require "controller.php";
require "repository.php";

function menu()
{
    echo "\n===== Menu =====\n";
    echo "1. Créer Wallet\n";
    echo "2. Dépôt\n";
    echo "3. Retrait\n";
    echo "4. Transactions\n";
    echo "0. Quitter\n";

    return (int) readline("Choix: ");
}

do {
    $choix = menu();

    if ($choix >= 1 && $choix <= 4) {
        choixFait($choix, $wallets, $transactions);
    }

} while ($choix != 0);