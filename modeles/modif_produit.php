<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * modeles/modif_produit.php
*/

// inclusion de la classe produitModif
include(dirname(__FILE__).'/../includes/produit.modif.php');

// création objet "modification"
$modification = new produitModif($id);

// récupération des ID de marque, taille, technologie, resolution, luminosite

// Débugage
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "marque = " . $marque_01 . "<br>";            
echo "taille = " . $taille_10  . "<br>";           
echo "technologie = " . $techno_12  . "<br>"; 
echo "resolution = " . $resolution_13  . "<br>";   
echo "luminosite = " . $luminosite_19  . "<br>"; 
*/

// Transformation des noms recus en ID
$ID_marque        = $modification->recup_idLabel($connexion, 'Marque', $marque_01);
$ID_taille        = $modification->recup_idLabel($connexion, 'Taille', $taille_10);
$ID_technologie   = $modification->recup_idLabel($connexion, 'Technologie', $techno_12);
$ID_resolution    = $modification->recup_idLabel($connexion, 'Resolution', $resolution_13);
$ID_luminosite    = $modification->recup_idLabel($connexion, 'Luminosite', $luminosite_19);

// Débugage

echo "ID_marque = " . $ID_marque . "<br>";            
echo "ID_taille = " . $ID_taille  . "<br>";           
echo "ID_technologie = " . $ID_technologie  . "<br>"; 
echo "ID_resolution = " . $ID_resolution  . "<br>";   
echo "ID_luminosite = " . $ID_luminosite  . "<br>";   


// modification des données du formulaire dans la BDD (table Produit)

                  $modification->updateInfosProduit(        $connexion,
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

// modification dans la BDD des donnée du formulaire concernant les connectiques

$modification->updateInfosConnectique($connexion, $connectique_24);

?>

