<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * modeles/insert_produit.php
*/

// inclusion de la classe produitInsert
include(dirname(__FILE__).'/../includes/produit.insert.php');

// création objet "insertion"
$insertion = new produitInsert();

// récupération des ID de marque, taille, technologie, resolution, luminosite

$ID_marque        = $insertion->recup_idLabel($connexion, 'Marque', $marque_01);
$ID_taille        = $insertion->recup_idLabel($connexion, 'Taille', $taille_10);
$ID_technologie   = $insertion->recup_idLabel($connexion, 'Technologie', $techno_12);
$ID_resolution    = $insertion->recup_idLabel($connexion, 'Resolution', $resolution_13);
$ID_luminosite    = $insertion->recup_idLabel($connexion, 'Luminosite', $luminosite_19);

// Débugage
/*echo "ID_marque = " . $ID_marque . "<br>";            
echo "ID_taille = " . $ID_taille  . "<br>";           
echo "ID_technologie = " . $ID_technologie  . "<br>"; 
echo "ID_resolution = " . $ID_resolution  . "<br>";   
echo "ID_luminosite = " . $ID_luminosite  . "<br>";   
*/

// Insertion des données du formulaire dans la BDD (table Produit)

$ID_nouveauProduit = $insertion->insertInfosProduit(  $connexion,
                                                      $modele_02,
                                                      $prix_03,
                                                      $titre_04,
                                                      $ref_fabriquant_05,
                                                      $ref_vendeur_06,
                                                      $slogan_07,
                                                      $resume_08,
                                                      $disponibilite_09,
                                                      $format_11,
                                                      $techno3D_14, 
                                                      $techno_tactile_15,
                                                      $reglage_16,
                                                      $aspect_dalle_17,
                                                      $contraste_18,
                                                      $temps_reponse_20,
                                                      $angle_21,
                                                      $pas_de_masque_22,
                                                      $rafraichissement_23,
                                                      $haut_parleurs_25,
                                                      $couleur_26,
                                                      $conso_marche_27,
                                                      $conso_veille_28,
                                                      $poids_29,
                                                      $dimensions_30, 
                                                      $description_31,
                                                      $ID_marque,
                                                      $ID_technologie,
                                                      $ID_taille,
                                                      $ID_luminosite,
                                                      $ID_resolution
                                                );

// Insertion dans la BDD des donnée du formulaire concernant les connectiques

$insertion->insertInfosConnectique($connexion, $connectique_24, $ID_nouveauProduit);


?>

