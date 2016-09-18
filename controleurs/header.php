<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/header.php
*/

$menuAdmin = NULL;

    // Affichage du menu administrateur selon login
  	if (isset($_SESSION['Auth']) && Login::isAdmin($connexion)) 
    {
        if (isset($_GET['idproduit']))
        {
            $id = $_GET['idproduit'];
		        $menuAdmin = Login::afficheModifier($id);
        }
        else 
        {
        	 $menuAdmin = Login::afficheInserer();
        }
        
    }

// inclusion du modèle
include(dirname(__FILE__).'/../modeles/header.php');
 
// inclusion de la vue
include(dirname(__FILE__).'/../vues/header.php');
?>
