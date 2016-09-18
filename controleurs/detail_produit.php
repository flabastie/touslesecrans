<?php
/*
  * 28/05/2012 Auteur: François Labastie
  * controleurs/detail_produit.php
*/

// inclusion de la classe produit.recherche
include(dirname(__FILE__).'/../includes/produit.detail.php');
// inclusion de la classe Img
include(dirname(__FILE__).'/../includes/image.class.php');

	// ID du produit à afficher
	$IDproduit;

	// création objet detailProduit
	$detailProduit = new produitDetail();

	// Récupération de l'ID produit
	if(isset($_GET['idproduit']) && $_GET['idproduit'] > 0 && $_GET['idproduit'] < 1000)
	{
		 $IDproduit=intval($_GET['idproduit']);
		 // mise en tableau de session l'ID produit visité
		 $detailProduit->noteVisite($IDproduit);
	}
	else
	{
		// Affichage message d'erreur
		$detailProduit->erreurID(1);
	}


//On inclut le modèle
include(dirname(__FILE__).'/../modeles/detail_produit.php');
 
 
//On inclut la vue
include(dirname(__FILE__).'/../vues/detail_produit.php');
?>
