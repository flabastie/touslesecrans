<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * modeles/liste_produit.php
*/


		// Création de l'objet $infosProduit avec en paramètres les tableaux de domaines demandés
		$infosProduit = new produitAffiche(	$tabInfos_prix,
											$tabInfos_marque,
											$tabInfos_taille,
											$tabInfos_techno,
											$tabInfos_resolution,
											$tabInfos_luminosite,
											$tabInfos_connectique );

		// Réception du tableau unififié $_tabProduits à partir des tableaux de domaines demandés
		$_tabProduits = $infosProduit->getTabProduits();
		//$_SESSION["infosProduit"] = $_tabProduits;
		//echo "<pre>"; print_r($_POST ); echo "</pre>"; 

		// Nombre de produits à afficher
		$nbrProduits = 0;
		
		// mise en session du tableau

		// Si $_tabProduits existe et n'est pas vide
		if (isset($_tabProduits) && !empty($_tabProduits)) 
		{
			$_SESSION["infosProduit"] = $_tabProduits;
			$nbrProduits = sizeof($_SESSION['infosProduit']);
		}
		else if (!isset($_SESSION['infosProduit']) || empty($_SESSION['infosProduit']))
		{
			$_SESSION["infosProduit"] = $tabTousProduits;
			$nbrProduits = sizeof($_SESSION['infosProduit']);
		}

		// Si aucune recherche demandée alors affichage de tous les produits du catalogue
		else if (!isset($_POST['marque']) && !isset($_POST['taille']) && !isset($_POST['techno']) 
			&& !isset($_POST['resolution']) && !isset($_POST['luminosite']) && !isset($_POST['connectique']) 
			&& !empty($_SESSION['infosProduit']) && !isset($_GET['numpage']))
		{
			$_SESSION["infosProduit"] = $tabTousProduits;
			$nbrProduits = sizeof($_SESSION['infosProduit']);
		}
		else
		{
			$nbrProduits = sizeof($_SESSION['infosProduit']);
		}

		// mise en session du tableau de marques
		if (!empty($tabLabMarques)) 
		{
			$_SESSION["listeMarques"] = $tabLabMarques;
		}

		// mise en session du tableau de tailles d'écrans
		if (!empty($tabLabTailles)) 
		{
			$_SESSION["listeTailles"] = $tabLabTailles ;
		}

		// mise en session du tableau de technologies d'écrans
		if (!empty($tabLabTechnos)) 
		{
			$_SESSION["listeTechnos"] = $tabLabTechnos ;
		}

		// mise en session du tableau de résolutions d'écrans
		if (!empty($tabLabResolutions)) 
		{
			$_SESSION["listeResolutions"] = $tabLabResolutions ;
		}

		// mise en session du tableau de luminosités d'écrans
		if (!empty($tabLabLuminosites)) 
		{
			$_SESSION["listeLuminosites"] = $tabLabLuminosites ;
		}

		// mise en session du tableau de connectiques d'écrans
		if (!empty($tabLabConnectiques)) 
		{
			$_SESSION["listeConnectiques"] = $tabLabConnectiques ;
		}

		// pagination affichage
		$nbrProduits = sizeof($_SESSION['infosProduit']);
		$nbreProduitParPage = 3;
		$nbreDePages = ceil($nbrProduits / $nbreProduitParPage);
		$pageActuelle;
		$premiereEntree;

		// Calcul de page actuelle
		if(isset($_GET['numpage']) && $_GET['numpage'] > 0 && $_GET['numpage'] <= $nbreDePages)
		{
			 $pageActuelle=intval($_GET['numpage']);
		}
		else
		{
			 $pageActuelle=1;
		}

		// Calcul de la première entrée à lire
		$premiereEntree=($pageActuelle-1)*$nbreProduitParPage; 

?>