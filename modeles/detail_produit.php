<?php
/*
  * 28/05/2012 Auteur: François Labastie
  * modele/detail_produit.php
*/


// récupération des infos produit dans tableau
$detailProduit->getDetailProduit($connexion, $IDproduit);

// Récupération des connectiques du produit
$lesConnectiques = $detailProduit->getConnectiques($connexion, $IDproduit);

?>
