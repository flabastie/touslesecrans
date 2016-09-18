<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/liste_produit.php
*/


	// Vérification variables de session 
	if( isset ($_SESSION['Auth']) )
	{

		$login = $_SESSION['Auth']['login'];
		$pass = $_SESSION['Auth']['pass'];

		// Test si connexion admin ok
		if ( Login::isAdmin($connexion) )
		{

				//On inclut le modèle
				include(dirname(__FILE__).'/../modeles/saisie_produit.php');


				//On inclut la vue
				include(dirname(__FILE__).'/../vues/saisie_produit.php');

		}

	}
	else 
	{ 
		
		// Message "Veuillez vous connecter"
		include(dirname(__FILE__).'/../vues/login.php');

	}
 


?>
