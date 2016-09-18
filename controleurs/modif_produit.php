<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/modif_produit.php
*/

// inclusion de la classe imgClass
include(dirname(__FILE__).'/../includes/image.class.php');

// variables pour formulaire
	$id = '';
	$marque_01 = '';
	$modele_02 ='';
	$prix_03 ='';
	$titre_04 ='';
	$ref_fabriquant_05 ='';
	$ref_vendeur_06 ='';
	$slogan_07 ='';
	$resume_08 ='';
	$disponibilite_09 ='';
	$taille_10 ='';
	$format_11 ='';
	$techno_12 ='';
	$resolution_13 ='';
	$techno3D_14 ='';
	$techno_tactile_15 ='';
	$reglage_16 ='';
	$aspect_dalle_17 ='';
	$contraste_18 ='';
	$luminosite_19 ='';
	$temps_reponse_20 ='';
	$angle_21 =''; 
	$pas_de_masque_22 ='';
	$rafraichissement_23 ='';
	$connectique_24 ='';
	$haut_parleurs_25 ='';
	$couleur_26 ='';
	$conso_marche_27 ='';
	$conso_veille_28 ='';
	$poids_29 ='';
	$dimensions_30 ='';
	$description_31 ='';

/* ---------------------------------------------------------------------
 * réception et extractions des données transmises
 ---------------------------------------------------------------------*/

// vérification des infos reçues
if (isset(	$_GET['idproduit'],
			$_POST['marque_01'], 
			$_POST['modele_02'],
			$_POST['prix_03'], 
			$_POST['titre_04'],
			$_POST['ref_fabriquant_05'], 
			$_POST['ref_vendeur_06'], 
			$_POST['slogan_07'],
			$_POST['resume_08'],
			$_POST['disponibilite_09'], 
			$_POST['taille_10'],
			$_POST['format_11'],
			$_POST['techno_12'],
			$_POST['resolution_13'],
			$_POST['techno3D_14'],
			$_POST['techno_tactile_15'],
			$_POST['reglage_16'],
			$_POST['aspect_dalle_17'],
			$_POST['contraste_18'],
			$_POST['luminosite_19'],
			$_POST['temps_reponse_20'],
			$_POST['angle_21'],
			$_POST['pas_de_masque_22'],
			$_POST['rafraichissement_23'],
			$_POST['connectique_24'],
			$_POST['haut_parleurs_25'],
			$_POST['couleur_26'],
			$_POST['conso_marche_27'],
			$_POST['conso_veille_28'], 
			$_POST['poids_29'],
			$_POST['dimensions_30'],
			$_POST['description_31'] 
			)) 
		{ 
			$id = $_GET['idproduit'];
			$marque_01 =$_POST['marque_01']; 
			$modele_02 =$_POST['modele_02'];
			$prix_03 =$_POST['prix_03'];
			$titre_04 = $_POST['titre_04'];
			$ref_fabriquant_05 =$_POST['ref_fabriquant_05'];
			$ref_vendeur_06 =$_POST['ref_vendeur_06'];
			$slogan_07 = $_POST['slogan_07'];
			$resume_08 = $_POST['resume_08'];
			$disponibilite_09 = $_POST['disponibilite_09'];
			$taille_10 =$_POST['taille_10'];
			$format_11 =$_POST['format_11'];
			$techno_12 = $_POST['techno_12'];
			$resolution_13 = $_POST['resolution_13'];
			$techno3D_14 = $_POST['techno3D_14'];
			$techno_tactile_15 = $_POST['techno_tactile_15'];
			$reglage_16 = $_POST['reglage_16'];
			$aspect_dalle_17 = $_POST['aspect_dalle_17'];
			$contraste_18 = $_POST['contraste_18'];
			$luminosite_19 = $_POST['luminosite_19'];
			$temps_reponse_20 = $_POST['temps_reponse_20']; 
			$angle_21 = $_POST['angle_21'];
			$pas_de_masque_22 = $_POST['pas_de_masque_22'];
			$rafraichissement_23 = $_POST['rafraichissement_23'];
			$connectique_24 = $_POST['connectique_24'];
			$haut_parleurs_25 = $_POST['haut_parleurs_25'];
			$couleur_26 = $_POST['couleur_26'];
			$conso_marche_27 = $_POST['conso_marche_27'];
			$conso_veille_28 = $_POST['conso_veille_28'];
			$poids_29 = $_POST['poids_29'];
			$dimensions_30 = $_POST['dimensions_30'];
			$description_31 = $_POST['description_31'];
		};


// inclusion du modèle
include(dirname(__FILE__).'/../modeles/modif_produit.php');

// $ID_nouveauProduit pour nommage des images
$ID_nouveauProduit = $id;

// Réception image 1 ----------------------------------------------------------------------------------- //
if(isset($_FILES['img_01']) && !empty($_FILES['img_01']) && ($_FILES['img_01']['size'] > 0))
{
	/*
	echo "<pre>";
	print_r($_FILES['img_01']);
	echo "</pre>";
	*/

	$img1 = $_FILES['img_01'];
	$ext = strtolower(substr($img1['name'], -3));
	$allow_ext = array('jpg', 'png', 'gif');
	if (in_array($ext, $allow_ext))
	{
		move_uploaded_file($img1['tmp_name'], "images/".$img1['name']);
		//Img::creerMin("images/" .$img1['name'], "images/", $img1['name'], 250, 250);

		// Mise aux dimensions et renommage de l'image selon ID_nouveauProduit_01.jpg
		switch ($ext) {
			case 'jpg':
				Img::creerMin("images/" .$img1['name'], "images/", $ID_nouveauProduit."_01.jpg", 250, 250);
				unlink("images/" .$img1['name']);
				break;
			case 'png':
				Img::creerMin("images/" .$img1['name'], "images/", $ID_nouveauProduit."_01.png", 250, 250);
				unlink("images/" .$img2['name']);
				break;
			case 'gif':
				Img::creerMin("images/" .$img1['name'], "images/", $ID_nouveauProduit."_01.gif", 250, 250);
				unlink("images/" .$img2['name']);
				break;
		}

	}
	else
	{
		$erreur1 = "Le fichier 01 n'est pas une image";
	}

	if(isset($erreur1))
	{
		echo $erreur1;
	}
}

// Réception image 2 ----------------------------------------------------------------------------------- //
if(isset($_FILES['img_02']) && !empty($_FILES['img_02']) && ($_FILES['img_02']['size'] > 0))
{
	/*
	echo "<pre>";
	print_r($_FILES['img_02']);
	echo "</pre>";
	*/

	$img2 = $_FILES['img_02'];
	$ext = strtolower(substr($img2['name'], -3));
	$allow_ext = array('jpg', 'png', 'gif');
	if (in_array($ext, $allow_ext))
	{
		move_uploaded_file($img2['tmp_name'], "images/".$img2['name']);
		
		// Mise aux dimensions et renommage de l'image selon ID_nouveauProduit_02.jpg
		switch ($ext) {
			case 'jpg':
				Img::creerMin("images/" .$img2['name'], "images/", $ID_nouveauProduit."_02.jpg", 250, 250);
				unlink("images/" .$img2['name']);
				break;
			case 'png':
				Img::creerMin("images/" .$img2['name'], "images/", $ID_nouveauProduit."_02.png", 250, 250);
				unlink("images/" .$img2['name']);
				break;
			case 'gif':
				Img::creerMin("images/" .$img2['name'], "images/", $ID_nouveauProduit."_02.gif", 250, 250);
				unlink("images/" .$img2['name']);
				break;
		}

	}
	else
	{
		$erreur2 = "Le fichier 02 n'est pas une image";
	}

	if(isset($erreur2))
	{
		echo $erreur2;
	}

}

// Réception image 3 ----------------------------------------------------------------------------------- //
if(isset($_FILES['img_03']) && !empty($_FILES['img_03']) && ($_FILES['img_03']['size'] > 0))
{
	/*
	echo "<pre>";
	print_r($_FILES['img_03']);
	echo "</pre>";
	*/

	$img3 = $_FILES['img_03'];
	$ext = strtolower(substr($img3['name'], -3));
	$allow_ext = array('jpg', 'png', 'gif');
	if (in_array($ext, $allow_ext))
	{
		move_uploaded_file($img3['tmp_name'], "images/".$img3['name']);
		
		// Mise aux dimensions et renommage de l'image selon ID_nouveauProduit_03.jpg
		switch ($ext) {
			case 'jpg':
				Img::creerMin("images/" .$img3['name'], "images/", $ID_nouveauProduit."_03.jpg", 250, 250);
				unlink("images/" .$img3['name']);
				break;
			case 'png':
				Img::creerMin("images/" .$img3['name'], "images/", $ID_nouveauProduit."_03.png", 250, 250);
				unlink("images/" .$img3['name']);
				break;
			case 'gif':
				Img::creerMin("images/" .$img3['name'], "images/", $ID_nouveauProduit."_03.gif", 250, 250);
				unlink("images/" .$img3['name']);
				break;
		}

	}
	else
	{
		$erreur3 = "Le fichier 03 n'est pas une image";
	}

	if(isset($erreur3))
	{
		echo $erreur3;
	}
	
}

 
 
// inclusion de la vue
include(dirname(__FILE__).'/../vues/modif_produit.php');
?>
