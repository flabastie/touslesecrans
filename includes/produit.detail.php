<?php
/*
 *   20/05/2012 Auteur: François Labastie
 *   Class produitDetail
 *   Affichage des infos détaillées produits
 */


class produitDetail
{
    private $idProduit;
    private $tab_produitsConsultes;
    private $tab_InfosProduits;
    private $messageAlerte;
    private $codeErreur;

      /*
       *    Constructeur
       *    Initialise les tableaux de stockage des infos
       *    et le tableau d'enregistrement des ID produits visités
       *    
       */

      public function __construct( ) 
      {
          $this->tab_produitsConsultes = array();
          $this->tab_InfosProduits = array();
          $this->messageAlerte = NULL;
          $this->codeErreur = 0;
      }

      /*
       *    Fonction noteVisite()
       *    mise en tableau de session l'ID produit visité
       *    paramètre : ID du produit à enregistrer
       */

      public function noteVisite($_idProduit) 
      {
          array_push($this->tab_produitsConsultes, $_idProduit);
          return 1;
      }

      /*
       *    Fonction erreurID()
       *    Affichage d'un message d'alerte
       *    lorsque ID reçue en paramètre incorrecte
       */

      public function erreurID($codeErreur) 
      {
            if($codeErreur == 1){
                $this->messageAlerte = "ID produit non valide";
            }
            return $this->messageAlerte;
      }

      /*
       *    Fonction getDetailProduit()
       *    Récupère les infos détaillées du produit depuis BDD
       *    Paramètre : ID du produit dans la BDD
       *    Return tab_InfosProduits (tableau contenant les infos produits)
       */

      public function getDetailProduit($connexion, $_idProduit) {

          try
          {

              $stmt = $connexion->prepare(" SELECT  P.ID AS ID,
                                                    P.modele  AS modele,
                                                    P.prix AS prix,
                                                    P.titre AS titre,
                                                    P.ref_fabriquant AS ref_fabriquant,
                                                    P.ref_vendeur AS ref_vendeur,
                                                    P.slogan AS slogan,
                                                    P.resume AS resume,      
                                                    P.disponibilite AS disponibilite,
                                                    P.format AS format,      
                                                    P.techno_3D AS techno_3D,
                                                    P.techno_tactile AS techno_tactile,
                                                    P.reglage AS reglage,
                                                    P.aspect_dalle AS aspect_dalle,
                                                    P.contraste AS contraste,
                                                    P.temps_reponse AS temps_reponse,
                                                    P.angle_vision AS angle_vision,
                                                    P.pas_masque AS pas_masque,
                                                    P.rafraichissement AS rafraichissement,
                                                    P.haut_parleurs AS haut_parleurs,
                                                    P.couleur_dominante AS couleur_dominante,
                                                    P.conso_marche AS conso_marche,
                                                    P.conso_veille AS conso_veille,
                                                    P.poids AS poids,
                                                    P.dimensions AS dimensions,
                                                    P.description AS description,
                                                    P.Marque_ID,
                                                    P.Technologie_ID,
                                                    P.Taille_ID,
                                                    P.Luminosite_ID,
                                                    P.Resolution_ID,
                                                    M.ID, 
                                                    M.label AS marque,
                                                    T.ID,
                                                    T.label AS taille,
                                                    R.ID,
                                                    R.label AS resolution,
                                                    L.ID,
                                                    L.label as luminosite,
                                                    Tech.ID,
                                                    Tech.label as technologie

                                              FROM  Produit P 
                                                    JOIN Marque M 
                                                    JOIN Taille T 
                                                    JOIN Resolution R 
                                                    JOIN Luminosite L 
                                                    JOIN Technologie Tech

                                              ON    M.ID = P.Marque_ID 
                                              AND   P.Taille_ID = T.ID
                                              AND   P.Resolution_ID = R.ID
                                              AND   P.Luminosite_ID = L.ID
                                              AND   P.Technologie_ID = Tech.ID

                                              WHERE P.ID = ? " ); 

              // exécution requête avec variable en paramètre
              $stmt->bindParam(1, $_idProduit);
              $stmt->execute();

              // réception comme objet
              $stmt->setFetchMode(PDO::FETCH_OBJ); 

              // remplissage de tab_InfosProduits
              while( $ligne = $stmt->fetch()) 
              {
                  $this->tab_InfosProduits["ID"]                = $ligne->ID;
                  $this->tab_InfosProduits["marque"]            = $ligne->marque;
                  $this->tab_InfosProduits["modele"]            = $ligne->modele;
                  $this->tab_InfosProduits["prix"]              = $ligne->prix;
                  $this->tab_InfosProduits["titre"]             = $ligne->titre;
                  $this->tab_InfosProduits["ref_fabriquant"]    = $ligne->ref_fabriquant;
                  $this->tab_InfosProduits["ref_vendeur"]       = $ligne->ref_vendeur;
                  $this->tab_InfosProduits["slogan"]            = $ligne->slogan;   
                  $this->tab_InfosProduits["resume"]            = $ligne->resume;

                  $this->tab_InfosProduits["disponibilite"]     = $ligne->disponibilite;
                  $this->tab_InfosProduits["format"]            = $ligne->format;
                  $this->tab_InfosProduits["techno_3D"]         = $ligne->techno_3D;
                  $this->tab_InfosProduits["techno_tactile"]    = $ligne->techno_tactile;
                  $this->tab_InfosProduits["reglage"]           = $ligne->reglage;

                  $this->tab_InfosProduits["aspect_dalle"]      = $ligne->aspect_dalle;
                  $this->tab_InfosProduits["contraste"]         = $ligne->contraste;
                  $this->tab_InfosProduits["temps_reponse"]     = $ligne->temps_reponse;
                  $this->tab_InfosProduits["angle_vision"]      = $ligne->angle_vision;
                  $this->tab_InfosProduits["pas_masque"]        = $ligne->pas_masque;

                  $this->tab_InfosProduits["rafraichissement"]  = $ligne->rafraichissement;
                  $this->tab_InfosProduits["haut_parleurs"]     = $ligne->haut_parleurs;
                  $this->tab_InfosProduits["couleur_dominante"] = $ligne->couleur_dominante;
                  $this->tab_InfosProduits["conso_marche"]      = $ligne->conso_marche;
                  $this->tab_InfosProduits["conso_veille"]      = $ligne->conso_veille;

                  $this->tab_InfosProduits["poids"]             = $ligne->poids;
                  $this->tab_InfosProduits["dimensions"]        = $ligne->dimensions;
                  $this->tab_InfosProduits["description"]       = $ligne->description;

                  $this->tab_InfosProduits["taille"]            = $ligne->taille;
                  $this->tab_InfosProduits["resolution"]        = $ligne->resolution;
                  $this->tab_InfosProduits["luminosite"]        = $ligne->luminosite;
                  $this->tab_InfosProduits["technologie"]       = $ligne->technologie;

              }

          }

          catch (Exception $e)
          {
                echo ' Erreur : '.$e->getMessage(); 
                echo ' Numero : '.$e->getCode();
                die();
          }

          return $this->tab_InfosProduits;

      }

      /*
       *    Fonction getInfo()
       *    retourne une information sur le produit
       *    paramètre : label de l'info demandée
       */

      public function getInfo($_labelInfo) 
      {
          $labelInfo = $_labelInfo;
          $info = $this->tab_InfosProduits[$labelInfo]; 

          return $info;
      }

      /*
       *    Fonction getTechno3D()
       *    retourne oui si valeur = 1 sinon non
       *    paramètre : label de l'info demandée
       */

      public function getTechno3D($_labelInfo) 
      {
          $labelInfo = $_labelInfo;
          $info = NULL;

          // si valeur = 1 alors retour oui sinon non
          if ($this->tab_InfosProduits[$labelInfo]) {
              $info = "oui";
          }
          else 
          {
              $info = "non";
          }

          return $info;
      }

      /*
       *    Fonction getTechnoTactile()
       *    retourne oui si valeur = 1 sinon non
       *    paramètre : label de l'info demandée
       */

      public function getTechnoTactile($_labelInfo) 
      {
          $labelInfo = $_labelInfo;
          $info = NULL;
          
          // si valeur = 1 alors retour oui sinon non
          if ($this->tab_InfosProduits[$labelInfo]) {
              $info = "oui";
          }
          else 
          {
              $info = "non";
          }

          return $info;
      }

      /*
       *    Fonction getConnectiques()
       *    retourne la liste des connectiques du produit
       *    paramètre : ID du produit
       */

      public function getConnectiques($connexion, $_idProduit)
      {
        $this->idProduit = $_idProduit;
        $tabLabelconnectiques = array();
        $tabIDConnectiques = array();

          // Récupération des Connectique_ID depuis table liaison
          $stmt1 = $connexion->prepare( 'SELECT Connectique_ID AS ID FROM Liaison WHERE Produit_ID = ? ');

          // exécution requête avec variable en paramètre
          $stmt1->bindParam(1, $this->idProduit);
          $stmt1->execute();
          $stmt1->setFetchMode(PDO::FETCH_OBJ); 

          $i =0;
            while( $ligne = $stmt1->fetch()) {
              $tabIDConnectiques[$i] = $ligne->ID;
              $i++;
            }

          // debug
          //print_r($tabIDConnectiques);   

          // Récupération des labels de connectiques (table Connectique) à partir de leurs ID
          $stmt2 = $connexion->prepare( 'SELECT label FROM Connectique WHERE ID = ? ');

          // Création d'un nouveau tableau de couples (Connectique_ID , Produit_ID)
          $i=0;
          foreach ($tabIDConnectiques as $valeur) 
          {
                // exécution requête avec variable en paramètre
                $stmt2->bindParam(1, $valeur);
                $stmt2->execute();
                $stmt2->setFetchMode(PDO::FETCH_OBJ); 
                // récupération valeur label
                $ligne = $stmt2->fetch();
                // Remplissage tableau tabLabelconnectiques
                $tabLabelconnectiques[$i] = $ligne->label;
                $i++;
          }

          // debug
          //print_r($tabLabelconnectiques); 

        return implode(",  &nbsp;", $tabLabelconnectiques);
      }


}
?>
