<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/liste_produit.php
*/

// inclusion de la classe produit.recherche
include(dirname(__FILE__).'/../includes/produit.recherche.php');
// inclusion de la classe produit.affiche
include(dirname(__FILE__).'/../includes/produit.affiche.php');
// inclusion de la classe Img
include(dirname(__FILE__).'/../includes/image.class.php');

// initialisation objet uneRecherche
$uneRecherche = new produitRecherche($connexion);
$tabTousProduits = array();
$tabTousProduits = $uneRecherche->tousLesProduits($connexion);


	// mise en session du tableau $tabTousProduits
	if(!isset($_SESSION['tousLesProduit']) || empty($_SESSION['tousLesProduit']))
	{
		$_SESSION['tousLesProduit'] = $uneRecherche->tousLesProduits($connexion);
	}

//echo "<pre>"; print_r($tabTousProduits); echo "</pre>"; 	

// labels marques à afficher dans checkbox
$tabLabMarques 		= $uneRecherche->recup_Labels($connexion, 'marque');
$tabLabTailles 		= $uneRecherche->recup_Labels($connexion, 'taille');
$tabLabTechnos 		= $uneRecherche->recup_Labels($connexion, 'techno');
$tabLabResolutions 	= $uneRecherche->recup_Labels($connexion, 'resolution');
$tabLabLuminosites 	= $uneRecherche->recup_Labels($connexion, 'luminosite');
$tabLabConnectiques = $uneRecherche->recup_Labels($connexion, 'connectique');

// choix utilisateur (ex. checkbox 3, 2, 5...)
$tabSelect_Marques 		= array();
$tabSelect_Tailles 		= array();
$tabSelect_Technos 		= array();
$tabSelect_Resolutions 	= array();
$tabSelect_Luminosites 	= array();
$tabSelect_Connectiques = array();

// tableaux de recherches
$tabRecherche_Marques 		= array();
$tabRecherche_Tailles 		= array();
$tabRecherche_Technos 		= array();
$tabRecherche_Resolutions 	= array();
$tabRecherche_Luminosites 	= array();
$tabRecherche_Connectiques 	= array();

// tableaux des demandes ( ex. ACER, ASUS, LG...)
$tabDemande_marque = array();
$tabDemande_taille = array();
$tabDemande_techno = array();
$tabDemande_resolution = array();
$tabDemande_luminosite = array();
$tabDemande_connectique = array();

// tableaux des infos retournées (ex. SAMSUNG S27A950D - Moniteur 2D/3D 27" (68,5 cm)...)
$tabInfos_marque = array();
$tabInfos_taille = array();
$tabInfos_techno = array();
$tabInfos_resolution = array();
$tabInfos_luminosite = array();
$tabInfos_connectique = array();

$tabInfos_prix = array();

	// Vérif réception prixmin selon choix "prix"
	if (isset($_POST['prixmin']) && !empty($_POST['prixmin'])) 
	{
		$_SESSION['prixmin'] = $_POST['prixmin'];
	}

	// Vérif réception prixmax selon choix "prix"
	if (isset($_POST['prixmax']) && !empty($_POST['prixmax'])) 
	{
		$_SESSION['prixmax'] = $_POST['prixmax'];
	}

	// Reset $_SESSION['prixmin'] et $_SESSION['prixmax'] si rien n'est sélectionné
	if ( !isset($_POST['prixmin']) && !isset($_POST['prixmax']) && !isset($_GET['numpage']) )
	{
		$_SESSION['prixmin'] = NULL;
		$_SESSION['prixmax'] = NULL;
	}

	// Reset $_SESSION['prixmin'] si rien n'est sélectionné
	if ( !isset($_POST['prixmin']) && !isset($_GET['numpage']) )
	{
		$_SESSION['prixmin'] = NULL;
	}

	// Reset $_SESSION['prixmax'] si rien n'est sélectionné
	if ( !isset($_POST['prixmax']) && !isset($_GET['numpage']) )
	{
		$_SESSION['prixmax'] = NULL;
	}

	if (isset($_SESSION['prixmin']) && !isset($_SESSION['prixmax']))
	{
		$tabInfos_prix = $uneRecherche->recupPrixMin($connexion, $_SESSION['prixmin']);
	}

	if (!isset($_SESSION['prixmin']) && isset($_SESSION['prixmax']))
	{
		$tabInfos_prix = $uneRecherche->recupPrixMax($connexion, $_SESSION['prixmax']);
	}

	if (isset($_SESSION['prixmin']) && isset($_SESSION['prixmax']))
	{
		$tabInfos_prix = $uneRecherche->recupInfoPrix($connexion, $_SESSION['prixmin'], $_SESSION['prixmax']);
	}

//echo "<pre>"; print_r($tabInfos_prix); echo "</pre>";

	// Vérif réception checkbox selon choix "marque"
	if (isset($_POST['marque']) && !empty($_POST['marque'])) 
	{
		$tabSelect_Marques = $_POST['marque'];
		$_SESSION['checkbox_marque'] = $_POST['marque'];
		// On récupère les noms de marques dans la BDD sélectionnées par les checkbox
		$tabDemande_marque = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Marques, 'marque');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_marque = $uneRecherche->recupInfoProduit($connexion, $tabDemande_marque, 'marque');

	}
	else if (!isset($_POST['marque']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_marque'] = NULL;
		$tabSelect_Marques = NULL;
		$tabInfos_marque = NULL;
	}
	else 
	{
		$tabSelect_Marques = NULL;
		$tabInfos_marque = NULL;
	}

	// Vérif réception checkbox selon choix "taille"
	if (isset($_POST['taille'])  && !empty($_POST['taille'])) {
		$tabSelect_Tailles = $_POST['taille'];
		$_SESSION['checkbox_taille'] = $_POST['taille'];
		// On récupère les labels de tailles dans la BDD sélectionnées par les checkbox
		$tabDemande_taille = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Tailles, 'taille');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_taille = $uneRecherche->recupInfoProduit($connexion, $tabDemande_taille, 'taille');
		
	}
	else if (!isset($_POST['taille']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_taille'] = NULL;
		$tabDemande_taille = NULL;
		$tabInfos_taille = NULL;
	}
	else 
	{
		$tabDemande_taille = NULL;
		$tabInfos_taille = NULL;
	}

	// Vérif réception checkbox selon choix "techno"
	if (isset($_POST['techno']) && !empty($_POST['techno'])) {
		$tabSelect_Technos = $_POST['techno'];
		$_SESSION['checkbox_techno'] = $_POST['techno'];
		// On récupère les labels de technos dans la BDD sélectionnées par les checkbox
		$tabDemande_techno = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Technos, 'techno');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_techno = $uneRecherche->recupInfoProduit($connexion, $tabDemande_techno, 'techno');

	}
	else if (!isset($_POST['techno']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_techno'] = NULL;
		$tabDemande_techno = NULL;
		$tabInfos_techno = NULL;
	}
	else 
	{
		$tabDemande_techno = NULL;
		$tabInfos_techno = NULL;
	}

	// Vérif réception checkbox selon choix "resolution"
	if (isset($_POST['resolution']) && !empty($_POST['resolution'])) {
		$tabSelect_Resolutions = $_POST['resolution'];
		$_SESSION['checkbox_resolution'] = $_POST['resolution'];
		// On récupère les labels de resolutions dans la BDD sélectionnées par les checkbox
		$tabDemande_resolution = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Resolutions, 'resolution');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_resolution = $uneRecherche->recupInfoProduit($connexion, $tabDemande_resolution, 'resolution');

	}
	else if (!isset($_POST['resolution']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_resolution'] = NULL;
		$tabDemande_resolution = NULL;
		$tabInfos_resolution = NULL;
	}
	else 
	{
		$tabDemande_resolution = NULL;
		$tabInfos_resolution = NULL;
	}

	// Vérif réception checkbox selon choix "luminosite"
	if (isset($_POST['luminosite']) && !empty($_POST['luminosite'])) {
		$tabSelect_Luminosites = $_POST['luminosite'];
		$_SESSION['checkbox_luminosite'] = $_POST['luminosite'];
		// On récupère les labels de luminosites dans la BDD sélectionnées par les checkbox
		$tabDemande_luminosite = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Luminosites, 'luminosite');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_luminosite = $uneRecherche->recupInfoProduit($connexion, $tabDemande_luminosite, 'luminosite');

	}
	else if (!isset($_POST['luminosite']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_luminosite'] = NULL;
		$tabDemande_luminosite = NULL;
		$tabInfos_luminosite = NULL;
	}
	else 
	{
		$tabDemande_luminosite = NULL;
		$tabInfos_luminosite = NULL;
	}

	// Vérif réception checkbox selon choix "connectique"
	if (isset($_POST['connectique']) && !empty($_POST['connectique'])) {
		$tabSelect_Connectiques = $_POST['connectique'];
		$_SESSION['checkbox_connectique'] = $_POST['connectique'];
		// On récupère les labels de connectiques dans la BDD sélectionnées par les checkbox
		$tabDemande_connectique = $uneRecherche->recupChoixCheckbox($connexion, $tabSelect_Connectiques, 'connectique');
		// On récupère depuis la BDD les infos des produits correspondants
		$tabInfos_connectique = $uneRecherche->recupInfoProduit($connexion, $tabDemande_connectique, 'connectique');

	}
	else if (!isset($_POST['connectique']) && !isset($_GET['numpage']))
	{
		$_SESSION['checkbox_connectique'] = NULL;
		$tabDemande_connectique = NULL;
		$tabInfos_connectique = NULL;
	}
	else 
	{
		$tabDemande_connectique = NULL;
		$tabInfos_connectique = NULL;
	}


// Inclusion du modèle
include(dirname(__FILE__).'/../modeles/liste_produit.php');

 
// Inclusion de la la vue
include(dirname(__FILE__).'/../vues/liste_produit.php');
?>
