<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/update_produit.php
*/

// inclusion de la classe produitUpdate
include(dirname(__FILE__).'/../includes/produit.update.php');

	// Vérification de l'authentification comme admin
	if( isset ($_SESSION['Auth']) )
	{

		$login = $_SESSION['Auth']['login'];
		$pass = $_SESSION['Auth']['pass'];

		// Test si connexion admin ok
		if ( Login::isAdmin($connexion) )
		{

				//On inclut le modèle
				include(dirname(__FILE__).'/../modeles/update_produit.php');


				//On inclut la vue
				include(dirname(__FILE__).'/../vues/update_produit.php');

		}

	}
	else 
	{ 
		
		// Message "Veuillez vous connecter"
		include(dirname(__FILE__).'/../vues/login.php');

	}

	// Récupération de l'id du produit à modifier
	$id = '';

	if (isset(	$_GET['idproduit'] ) && !empty($_GET['idproduit']) && ($_GET['idproduit'] < 2000))
	{
		$id = $_GET['idproduit'];
	}
	else
	{
		echo "Erreur idproduit";
	}

 


?>
