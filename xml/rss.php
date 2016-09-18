<?php
header ( "Content-type: text/xml" ) ;

 // connexion BDD
include '../connexion/connect.php'; 

// inclusion de la classe produit.recherche
include(dirname(__FILE__).'/../includes/produit.recherche.php');

 // initialisation objet rechercheDerniersProduits
$rechercheDerniersProduits = new produitRecherche($connexion);
$tabDerniersProduits = array();
$tabDerniersProduits = $rechercheDerniersProduits->derniersProduits($connexion);

//echo "<pre>"; print_r($tabDerniersProduits); echo "</pre>";  

$date = date ( "Y:m:d" ) ;
   
$rss = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>" ;
$rss .= "<rss version=\"2.0\">" ;
$rss .= "<channel>" ;
$rss .= "<title>touslesecrans</title>" ;
$rss .= "<link>http://www.labastie.org/touslesecrans</link>" ;
$rss .= "<description>Le site de tous les écrans</description>" ;

    foreach ($tabDerniersProduits as $key => $value) 
    {
        // On crée l'item avec ces données
        $rss .= "<item>" ;  
            foreach ($tabDerniersProduits[$key] as $cle => $valeur) 
            {
                
                $rss .= "<title>".$tabDerniersProduits[$key]['titre']."</title>";
                $rss .= "<link>http://www.labastie.org/touslesecrans/index.php?page=detail_produit&#38;idproduit=".$tabDerniersProduits[$key]['ID']."</link>" ;
                $rss .= "<description>".$tabDerniersProduits[$key]['marque']." ".$tabDerniersProduits[$key]['prix']." € </description>";
                $rss .= "<lastBuildDate>".$date."</lastBuildDate>";

            }
        $rss .= "</item>" ;
    } 

$rss .= "</channel>" ;
$rss .= "</rss>" ;

// Affichage du contenu XML
echo $rss;


$connexion = NULL;

?>