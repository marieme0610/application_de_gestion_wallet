==== Mes fichiers ==== :

-index.php : point d'entrer
-controller.php : gestionnaire des fonctions
-services.php : logique metier gerer tout ce qui est traitement operations
-repository.php : fonctions ajout modifie supprimer les données du tableau
-validator.php : fonctions de validations verification etc

version 0.1.0 => creation de wallet
version 0.2.0 => Depot
version 0.3.0 => Retrait
version 0.4.0 => Affichage transaction


code index.php avant refactoring
<!-- 
<?php
require "services.php";
require "validator.php";
// // $nomWallet;
// // $telephone;
// // $code;
// // $solde;


function choixFait($choix){
    switch($choix){
        case 1:
            do {
                $nom = readline("\nEntrer votre nom : \n");
                if (!nomEstValide($nom)){
                    echo "Nom invalide !\n";
                }
                } while (!nomEstValide($nom));

            do {
                $telephone = readline("\nEntrer votre numero : \n");
                if (!telEstValide($telephone)){
                    echo "Numero invalide !\n";
                }
                } while (!telEstValide($telephone));

            do {
                $code = readline("\nEntrer votre code : \n");
                if (!codeEstValide($code)){
                    echo "Code invalide !\n";
                }
                } while (!codeEstValide($code));

            do {
                $solde = readline("\nEntrer votre solde : \n");
                if (!soldeEstValide($solde)){
                    echo "Solde inssufisant !\n";
                }
                } while (!soldeEstValide($solde));

            break;
        case 2:
            echo "depot";
             break;
        case 3:
            echo "retrait";
             break;
        case 4:
            echo "affiche"; 
             break;
       

    }
}


     -->



?>
