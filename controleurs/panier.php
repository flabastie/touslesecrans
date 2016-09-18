<?php
/*
  * 28/05/2012 Auteur: François Labastie
  * controleurs/panier.php
*/

// inclusion de la classe panier
include(dirname(__FILE__).'/../includes/panier.class.php');
// inclusion de la classe produit.detail
include(dirname(__FILE__).'/../includes/produit.detail.php');

// Création d'un nouvel objet panier
$panier = new Panier();

// Création du panier
$panier->creationPanier();

// Vérif si aucun panier en session
$qteproduit = 0;

// Si un produit est mis dans le panier
if ( isset($_GET['idproduit']) )
{
	// création objet detailProduit
	$detailProduit = new produitDetail();

	// récupération des infos produit
	$detailProduit->getDetailProduit($connexion, $_GET['idproduit']);

	// récupération du prix de cet article
	$prixproduit = $detailProduit->getInfo("prix");

	// Ajout de cet article dans le panier
	$qteproduit = 1;
	$panier->ajouterArticle($_GET['idproduit'],$qteproduit,$prixproduit);

}

// Si un panier existe en session on récupère $qteproduit
if ( isset($_SESSION['panier']) && isset($_SESSION['panier']['qteproduit']) && !empty($_SESSION['panier']['qteproduit']) )
{

	// Si on supprime un produit
	if ( isset($_GET['supproduit']) )
	{
		$produit_a_supprimer = $_GET['supproduit'];
		$panier->supprimerArticle($produit_a_supprimer);
	
	}

	// Si on ajoute un exemplaire à un produit
	else if ( isset($_GET['plusproduit']) )
	{
		$idproduit = $_GET['plusproduit'];

		$new_quantite = $panier->getQTeArticle($idproduit);
		$new_quantite = $new_quantite + 1;

		$panier->modifierQTeArticle($idproduit,$new_quantite);

	}

	// Si on supprime un exemplaire à un produit
	else if ( isset($_GET['moinsproduit']) )
	{
		$idproduit = $_GET['moinsproduit'];

		$new_quantite = $panier->getQTeArticle($idproduit);
		$new_quantite = $new_quantite - 1;

		$panier->modifierQTeArticle($idproduit,$new_quantite);

	}


	// Vérif si plus aucun produit
	if( empty($_SESSION['panier']['qteproduit']))
	{
		$qteproduit = 0;
	}
	else
	{
		$qteproduit = $_SESSION['panier']['qteproduit'];
	}

}

/*
	echo "<pre>";
	print_r($_SESSION['panier']);
	echo "</pre>";
*/
//On inclut le modèle
include(dirname(__FILE__).'/../modeles/panier.php');
 
 
//On inclut la vue
include(dirname(__FILE__).'/../vues/panier.php');

?>
