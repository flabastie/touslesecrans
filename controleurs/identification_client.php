<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * controleurs/identification_client.php
*/

// variables pour formulaire
	$nom = '';
	$prenom ='';
	$adresse ='';
	$cp ='';
	$ville ='';
	$pseudo ='';
	$mdp ='';
	$cmdp ='';
	$mail ='';

/* ---------------------------------------------------------------------
 * réception et extractions des données transmises
 ---------------------------------------------------------------------*/

// vérification des infos reçues
if (isset(	$_POST['nom'], 
			$_POST['prenom'],
			$_POST['adresse'], 
			$_POST['cp'],
			$_POST['ville'], 
			$_POST['pseudo'], 
			$_POST['mdp'],
			$_POST['cmdp'], 
			$_POST['mail']

			)) 
		{ 
			$nom =$_POST['nom']; 
			$prenom =$_POST['prenom'];
			$adresse =$_POST['adresse'];
			$cp = $_POST['cp'];
			$ville =$_POST['ville'];
			$pseudo =$_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$cmdp = $_POST['cmdp'];
			$mail = $_POST['mail'];
		};


echo "<pre>"; print_r($_POST ); echo "</pre>"; 

// inclusion du modèle
include(dirname(__FILE__).'/../modeles/identification_client.php');


// inclusion de la vue
include(dirname(__FILE__).'/../vues/identification_client.php');
?>