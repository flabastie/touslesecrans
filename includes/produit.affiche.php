<?php
/*
 *   17/05/2012 Auteur: François Labastie
 *   Class produitAffiche
 *   Affichage des infos produits
 */


class produitAffiche
{
    private $tabInfos;
    private $tabProduits;

    private $nbrProduits;

    private $idProduit;
    private $marque;
    private $prix;
    private $titre;
    private $taille;
    private $resolution;

    private $tabPrix      = array();
    private $tabMarque      = array();
    private $tabTaille      = array();
    private $tabTechno      = array();
    private $tabResolution  = array();
    private $tabLuminosite  = array();
    private $tabConnectique = array();

      /*
       *   Constructeur
       *    
       */

      public function __construct(  $_tabPrix,
                                    $_tabMarque, 
                                    $_tabTaille, 
                                    $_tabTechno, 
                                    $_tabResolution, 
                                    $_tabLuminosite, 
                                    $_tabConnectique ) 
      {
          $this->tabPrix        = $_tabPrix;
          $this->tabMarque      = $this->simplifieTableau($_tabMarque);
          $this->tabTaille      = $this->simplifieTableau($_tabTaille);
          $this->tabTechno      = $this->simplifieTableau($_tabTechno);
          $this->tabResolution  = $this->simplifieTableau($_tabResolution);
          $this->tabLuminosite  = $this->simplifieTableau($_tabLuminosite);
          $this->tabConnectique = $this->simplifieTableau($_tabConnectique);

          $this->tabProduits = array_merge(   $this->tabPrix,
                                              $this->tabMarque , 
                                              $this->tabTaille, 
                                              $this->tabTechno, 
                                              $this->tabResolution, 
                                              $this->tabLuminosite, 
                                              $this->tabConnectique );

          $this->nbrProduits = sizeof($this->tabProduits);

          // affichage pour débugage
         // echo "<pre>"; print_r($this->tabProduits); echo "</pre>";

      }

      /*
       *   Fonction simplifieTableau()
       */

      public function simplifieTableau($_tabData) {

          $tabData = $_tabData;
          $tabResultat = array();

          // simplification du tableau
          if(!empty($tabData)) {
              $i = 0;
              foreach ($tabData as $cle1 => $valeur1) {
                  foreach ($valeur1 as $cle2 => $valeur2) {

                    $tabResultat[$i] = $valeur2;
                   $i++;
                  }
              }
          }
          return $tabResultat;
      }

      /*
       *   Fonction getTabProduits()
       *   Retourne le tableau d'infos de produits
       */

      public function getTabProduits() {

          return $this->tabProduits;

      }

      /*
       *   Fonction getNbrProduits()
       *   Retourne le nombre de produits
       */

      public function getNbrProduits() {

          return $this->nbrProduits;

      }

      /*
       *   Fonction getIdProduit()
       *   Retourne l'ID du produit
       */

      public function getIdProduit($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['ID'];

      }

      /*
       *   Fonction getMarque()
       *   Retourne la marque du produit
       */

      public function getMarque($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['marque'];

      }

      /*
       *   Fonction getPrix()
       *   Retourne le prix du produit
       */

      public function getPrix($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['prix'];

      }

      /*
       *   Fonction getTitre()
       *   Retourne le titre du produit
       */

      public function getTitre($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['titre'];

      }

      /*
       *   Fonction getTaille()
       *   Retourne la taille du produit
       */

      public function getTaille($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['taille'];

      }

      /*
       *   Fonction getResolution()
       *   Retourne la resolution du produit
       */

      public function getResolution($numero) {

          $leNumero = $numero;
          return $this->tabProduits[$leNumero]['resolution'];

      }


}
?>
