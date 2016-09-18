<?php
/*
  * 24/05/2012 Auteur: François Labastie
  * controleurs/logout.php
  * page de logout
*/
$_SESSION = array();
session_destroy();


//On inclut le modèle
include(dirname(__FILE__).'/../modeles/logout.php');
 
//On inclut la vue
include(dirname(__FILE__).'/../vues/logout.php');
?>
