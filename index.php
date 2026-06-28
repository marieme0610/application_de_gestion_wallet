<?php
namespace Distributeur\Index;
 
require "repository.php";
require "validator.php";
require "services.php";
require "controller.php";
 
use function Distributeur\Controller\choixFait;
use function Distributeur\Repository\getWalletsInitiaux;
use function Distributeur\Repository\getTransactionsInitiales;
 

function menu():int{
            echo "\n===== Menu Distributeur =====\n";
            echo "1. Creer Wallet\n";
            echo "2. Faire un dépot\n";
            echo "3. Faire un retrait\n";
            echo "4. Liste des transactions\n";
            echo "0. Quitter\n";
            
            $choix = (int)readline("Entrer votre choix :");
    return $choix;  
}

$wallets = getWalletsInitiaux();
$transactions = getTransactionsInitiales();

do {
    $choix = menu();
    if($choix != 1 && $choix != 2 && $choix != 3 && $choix != 4 && $choix != 0 )
        echo "Choix invalide !\n";
    choixFait($choix,$wallets,$transactions);
} while ($choix != 0);

?>