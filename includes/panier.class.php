<?php
/*
 *   17/05/2012 Auteur: François Labastie
 *   Class Panier
 */


class Panier
{


	public function creationPanier()
	{
	   if (!isset($_SESSION['panier'])){
	      $_SESSION['panier']=array();
	      $_SESSION['panier']['idproduit'] = array();
	      $_SESSION['panier']['qteproduit'] = array();
	      $_SESSION['panier']['prixproduit'] = array();
	      $_SESSION['panier']['verrou'] = false;
	   }
	   return true;
	}


	/*
	 *   Fonction ajouterArticle()
	 */

	public function ajouterArticle($idproduit,$qteproduit,$prixproduit)
	{
	   //Si le panier existe
	   if ($this->creationPanier() && !$this->isVerrouille())
	   {
	      //Si le produit existe déjà on ajoute seulement la quantité
	      $positionProduit = array_search($idproduit,  $_SESSION['panier']['idproduit']);

	      if ($positionProduit !== false)
	      {
	         $_SESSION['panier']['qteproduit'][$positionProduit] += $qteproduit ;
	      }
	      else
	      {
	         //Sinon on ajoute le produit
	         array_push( $_SESSION['panier']['idproduit'],$idproduit);
	         array_push( $_SESSION['panier']['qteproduit'],$qteproduit);
	         array_push( $_SESSION['panier']['prixproduit'],$prixproduit);
	      }
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}

	/*
	 *   Fonction supprimerArticle()
	 */

	public function supprimerArticle($idproduit)
	{
	   //Si le panier existe
	   if ($this->creationPanier() && !$this->isVerrouille())
	   {
	      //Nous allons passer par un panier temporaire
	      $tmp=array();
	      $tmp['idproduit'] = array();
	      $tmp['qteproduit'] = array();
	      $tmp['prixproduit'] = array();
	      $tmp['verrou'] = $_SESSION['panier']['verrou'];

	      for($i = 0; $i < count($_SESSION['panier']['idproduit']); $i++)
	      {
	         if ($_SESSION['panier']['idproduit'][$i] !== $idproduit)
	         {
	            array_push( $tmp['idproduit'],$_SESSION['panier']['idproduit'][$i]);
	            array_push( $tmp['qteproduit'],$_SESSION['panier']['qteproduit'][$i]);
	            array_push( $tmp['prixproduit'],$_SESSION['panier']['prixproduit'][$i]);
	         }

	      }
	      //On remplace le panier en session par notre panier temporaire à jour
	      $_SESSION['panier'] =  $tmp;
	      //On efface notre panier temporaire
	      unset($tmp);
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}


	/*
	 *   Fonction modifierQTeArticle()
	 */

	public function modifierQTeArticle($idproduit,$qteproduit)
	{
	   //Si le panier éxiste
	   if ($this->creationPanier() && !$this->isVerrouille())
	   {
	      //Si la quantité est positive on modifie sinon on supprime l'article
	      if ($qteproduit > 0)
	      {
	         //Recharche du produit dans le panier
	         $positionProduit = array_search($idproduit,  $_SESSION['panier']['idproduit']);

	         if ($positionProduit !== false)
	         {
	            $_SESSION['panier']['qteproduit'][$positionProduit] = $qteproduit ;
	         }
	      }
	      else
	      $this->supprimerArticle($idproduit);
	   }
	   else
	   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}


	/*
	 *   Fonction getQTeArticle()
	 */

	public function getQTeArticle($idproduit)
	{
		$quantite = 0;
	   //Si le panier éxiste
	   if ($this->creationPanier() && !$this->isVerrouille())
	   {

	         //Recharche du produit dans le panier
	         $positionProduit = array_search($idproduit,  $_SESSION['panier']['idproduit']);

	         if ($positionProduit !== false)
	         {
	            $quantite = $_SESSION['panier']['qteproduit'][$positionProduit] ;
	         }
	      
	   }

	   return $quantite;

	}


	/*
	 *   Fonction MontantGlobal()
	 */

	public function MontantGlobal(){
	   $total=0;
	   for($i = 0; $i < count($_SESSION['panier']['idproduit']); $i++)
	   {
	      $total += $_SESSION['panier']['qteproduit'][$i] * $_SESSION['panier']['prixproduit'][$i];
	   }
	   return $total;
	}

	/*
	 *   Fonction isVerrouille()
	 */

	public function isVerrouille()
	{
	   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
	   {
	   		return true;
	   }
	   else
	   {
	   		return false;
	   }

	}

	/*
	 *   Fonction compterArticles()
	 */

	public function compterArticles()
	{
	   if (isset($_SESSION['panier']))
	   {
	   		return count($_SESSION['panier']['idproduit']);
	   }
	   else
	   {
	   		return 0;
	   }
	 
	}

	/*
	 *   Fonction supprimePanier()
	 */

	public function supprimePanier()
	{
	   unset($_SESSION['panier']);
	}



}




?>
