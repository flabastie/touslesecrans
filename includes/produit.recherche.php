<?php
/*
 *   17/05/2012 Auteur: François Labastie
 *   Class menuRecherche
 *   Gestion du module de recherche
 */


class produitRecherche
{
    // déclaration des propriétés
    private $tabResultat;
    private $IDproduit;
    private $marqueProduit;
    private $titreProduit;
    private $tailleProduit;
    private $resolutionProduit;
    private $prixProduit;
                           
      /*
       *   Constructeur
       *    
       */

      public function __construct() {

        $this->tabResultat = array();
        $this->IDproduit = NULL;
        $this->marqueProduit = NULL;
        $this->titreProduit = NULL;
        $this->tailleProduit = NULL;
        $this->resolutionProduit = NULL;
        $this->prixProduit = NULL;   

      }

      /*
       *   Fonction tousLesProduits()
       *   Récupère les infos de tous les produits depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function tousLesProduits($connexion)
      {
          // préparation de requete pour checkbox "marque"
          $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                      P.titre AS titre, T.label AS taille, R.label AS resolution
                                      FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                      ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID " ); 



            $stmt->execute();

            // réception comme objet
            $stmt->setFetchMode(PDO::FETCH_OBJ); 

            // remplissage tabResultat
            $i =0;
            while( $ligne = $stmt->fetch()) 
            {
                $this->tabResultat[$i]["ID"]          = $ligne->ID;
                $this->tabResultat[$i]["marque"]      = $ligne->marque;
                $this->tabResultat[$i]["prix"]        = $ligne->prix;
                $this->tabResultat[$i]["titre"]       = $ligne->titre;
                $this->tabResultat[$i]["taille"]      = $ligne->taille;   
                $this->tabResultat[$i]["resolution"]  = $ligne->resolution;
                $i++;
            }

          //  echo "<pre>"; print_r($this->tabResultat); echo "</pre>";   
          return $this->tabResultat;  
      }


      /*
       *   Fonction derniersProduits()
       *   Récupère les infos des derniers Produits depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function derniersProduits($connexion)
      {
          // préparation de requete pour checkbox "marque"
          $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                      P.titre AS titre, T.label AS taille, R.label AS resolution
                                      FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                      ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                      ORDER BY P.ID DESC LIMIT 0, 10 " ); 



            $stmt->execute();

            // réception comme objet
            $stmt->setFetchMode(PDO::FETCH_OBJ); 

            // remplissage tabResultat
            $i =0;
            while( $ligne = $stmt->fetch()) 
            {
                $this->tabResultat[$i]["ID"]          = $ligne->ID;
                $this->tabResultat[$i]["marque"]      = $ligne->marque;
                $this->tabResultat[$i]["prix"]        = $ligne->prix;
                $this->tabResultat[$i]["titre"]       = $ligne->titre;
                $this->tabResultat[$i]["taille"]      = $ligne->taille;   
                $this->tabResultat[$i]["resolution"]  = $ligne->resolution;
                $i++;
            }

          //  echo "<pre>"; print_r($this->tabResultat); echo "</pre>";   
          return $this->tabResultat;  
      }

      /*
       *   Fonction recup_Labels()
       *   Récupère la liste de tous les labels depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function recup_Labels($connexion, $nomCheckbox) {

          // nom de la checkbox
          $label = $nomCheckbox;
          // le tableau de labels
          $tab_label = array();

          switch ($label) {
            case 'marque':
              // récupération de la liste des marques
              $requete =  'SELECT * from Marque';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;

           case 'taille':
              // récupération de la liste des tailles
              $requete =  'SELECT * from Taille';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;

           case 'techno':
              // récupération de la liste des technologies
              $requete =  'SELECT * from Technologie';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;

            case 'resolution':
              // récupération de la liste des marques
              $requete =  'SELECT * from Resolution';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;

           case 'luminosite':
              $requete =  'SELECT * from Luminosite';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;

           case 'connectique':
              $requete =  'SELECT * from Connectique';
                foreach  ($connexion->query($requete) as $row) {
                  $tab_label[] = $row['label'];
                }
              break;
            
            default:
              # code...
              break;
          }

          return $tab_label;
      }


      /*
       *   Fonction recupChoixCheckbox()
       *   Récupère les noms choisis dans la BDD
       *   Paramètres : connexion et tableau venant de la checkbox
       */

      public function recupChoixCheckbox($connexion, $tab, $nomCheckbox) {

          // nom de la checkbox
          $label = $nomCheckbox;
          // tableau à retourner
          $tabResultat = array();
          // tableau venant de checkbox
          $tabDemande = $tab;
          // tableau venant de BDD
          $tabRequete = array();

          // recup des données depuis BDD
          switch ($label) {

            case 'marque':
                $requete=$connexion->query("SELECT * from Marque"); 
              break;

            case 'taille':
                $requete=$connexion->query("SELECT * from Taille"); 
              break;

            case 'techno':
                $requete=$connexion->query("SELECT * from Technologie"); 
              break;

            case 'resolution':
                $requete=$connexion->query("SELECT * from Resolution"); 
              break;

            case 'luminosite':
                $requete=$connexion->query("SELECT * from Luminosite"); 
              break;

            case 'connectique':
                $requete=$connexion->query("SELECT * from Connectique"); 
              break;
            
            default:
              # code...
              break;
          }

            // recup des données depuis BDD
            $requete->setFetchMode(PDO::FETCH_OBJ); 
            // remplissage de $tabRequete
            $i =0;
            while( $ligne = $requete->fetch()) {
              $tabRequete[$i] = $ligne->label;
              $i++;
            }
            // remplissage de $tabResultat
            foreach ($tabDemande as $cle => $choix) {
              $tabResultat[$cle] = $tabRequete[$choix-1];
            }

          // fermeture curseur
          $requete->closeCursor();

          return $tabResultat;
      }

      /*
       *   Fonction recupProduit()
       *   Récupère la liste de tous les labels depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function recupInfoProduit($connexion, $tab, $nomCheckbox) {

          // nom de la checkbox
          $label = $nomCheckbox;
          // tableau à retourner
          $tabResultat = array();
          // tableau venant de checkbox
          $tabDemande = $tab;

          // requêtes selon checkbox différente (ex. marque ou techno, etc.)
          switch ($label) {

            case 'marque':
            // préparation de requete pour checkbox "marque"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE M.label = ? " ); 
            break;

            case 'taille':
            // préparation de requete pour checkbox "taille"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE T.label = ? " ); 
            break;

            case 'techno':
            // préparation de requete pour checkbox "techno"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R JOIN Technologie Tech
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          AND Tech.ID = P.Technologie_ID
                                          WHERE Tech.label = ? " ); 
            break;

            case 'resolution':
            // préparation de requete pour checkbox "resolution"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE R.label = ? " ); 
            break;

            case 'luminosite':
            // préparation de requete pour checkbox "luminosite"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R JOIN Luminosite L
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE L.label = ? " ); 
            break;

            case 'connectique':
            // préparation de requete pour checkbox "connectique"
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R 
                                          JOIN Liaison Li JOIN Connectique C
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          AND P.ID = Li.Produit_ID AND C.ID = Li.Connectique_ID
                                          WHERE C.label = ? " ); 
            break;
            
            default:
              # code...
            break;
          }

          // Boucle selon le nombre de cases cochées
          for ($j=0; $j< sizeof($tabDemande); $j++){

              // exécution requête avec variable en paramètre
              $stmt->bindParam(1, $tabDemande[$j]);
              $stmt->execute();

              // réception comme objet
              $stmt->setFetchMode(PDO::FETCH_OBJ); 

              // remplissage tabResultat
              $i =0;
              while( $ligne = $stmt->fetch()) 
              {
                  $tabResultat[$j][$i]["ID"]          = $ligne->ID;
                  $tabResultat[$j][$i]["marque"]      = $ligne->marque;
                  $tabResultat[$j][$i]["prix"]        = $ligne->prix;
                  $tabResultat[$j][$i]["titre"]       = $ligne->titre;
                  $tabResultat[$j][$i]["taille"]      = $ligne->taille;   
                  $tabResultat[$j][$i]["resolution"]  = $ligne->resolution;
                  $i++;
              }

          }

          return $tabResultat;

      }

      /*
       *   Fonction recupPrix()
       *   Récupère la liste de tous les prix depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function recupInfoPrix($connexion, $_prixmin, $_prixmax) {

            // prix
            $prixmin = $_prixmin;
            $prixmax = $_prixmax;
            // tableau à retourner
            $tabResultat = array();

            // préparation de requete pour prixmin
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE P.prix BETWEEN ? AND ? " ); 

            // exécution requête avec variable en paramètre
            $stmt->bindParam(1, $prixmin);
            $stmt->bindParam(2, $prixmax);
            $stmt->execute();

            // réception comme objet
            $stmt->setFetchMode(PDO::FETCH_OBJ); 

            // remplissage tabResultat
            $i =0;
            while( $ligne = $stmt->fetch()) 
            {
                $tabResultat[$i]["ID"]          = $ligne->ID;
                $tabResultat[$i]["marque"]      = $ligne->marque;
                $tabResultat[$i]["prix"]        = $ligne->prix;
                $tabResultat[$i]["titre"]       = $ligne->titre;
                $tabResultat[$i]["taille"]      = $ligne->taille;   
                $tabResultat[$i]["resolution"]  = $ligne->resolution;
                $i++;
            }

            return $tabResultat;

      }

      /*
       *   Fonction recupPrixMin()
       *   Récupère la liste de tous les prix depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function recupPrixMin($connexion, $_prixmin) {

            // prix
            $prixmin = $_prixmin;
            // tableau à retourner
            $tabResultat = array();

            // préparation de requete pour prixmin
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE P.prix > ? " ); 

            // exécution requête avec variable en paramètre
            $stmt->bindParam(1, $prixmin);
            $stmt->execute();

            // réception comme objet
            $stmt->setFetchMode(PDO::FETCH_OBJ); 

            // remplissage tabResultat
            $i =0;
            while( $ligne = $stmt->fetch()) 
            {
                $tabResultat[$i]["ID"]          = $ligne->ID;
                $tabResultat[$i]["marque"]      = $ligne->marque;
                $tabResultat[$i]["prix"]        = $ligne->prix;
                $tabResultat[$i]["titre"]       = $ligne->titre;
                $tabResultat[$i]["taille"]      = $ligne->taille;   
                $tabResultat[$i]["resolution"]  = $ligne->resolution;
                $i++;
            }

            return $tabResultat;

      }

      /*
       *   Fonction recupPrixMax()
       *   Récupère la liste de tous les prix depuis la BDD
       *   Retourne un tableau de Strings
       */

      public function recupPrixMax($connexion, $_prixmax) {

            // prix
            $prixmax = $_prixmax;
            // tableau à retourner
            $tabResultat = array();

            // préparation de requete pour prixmin
            $stmt = $connexion->prepare(" SELECT P.ID AS ID, M.label AS marque, P.prix AS prix, 
                                          P.titre AS titre, T.label AS taille, R.label AS resolution
                                          FROM Produit P JOIN Marque M JOIN Taille T JOIN Resolution R
                                          ON M.ID = P.Marque_ID AND P.Taille_ID = T.ID AND P.Resolution_ID = R.ID
                                          WHERE P.prix < ? " ); 

            // exécution requête avec variable en paramètre
            $stmt->bindParam(1, $prixmax);
            $stmt->execute();

            // réception comme objet
            $stmt->setFetchMode(PDO::FETCH_OBJ); 

            // remplissage tabResultat
            $i =0;
            while( $ligne = $stmt->fetch()) 
            {
                $tabResultat[$i]["ID"]          = $ligne->ID;
                $tabResultat[$i]["marque"]      = $ligne->marque;
                $tabResultat[$i]["prix"]        = $ligne->prix;
                $tabResultat[$i]["titre"]       = $ligne->titre;
                $tabResultat[$i]["taille"]      = $ligne->taille;   
                $tabResultat[$i]["resolution"]  = $ligne->resolution;
                $i++;
            }

            return $tabResultat;

      }

        /*
        *   Fonction aFnbrProduitsTrouves()
        */

       function aFnbrProduitsTrouves($_leNbrDeProduits) {

        $leNbrDeProduits = $_leNbrDeProduits;

        switch ($leNbrDeProduits) {
          case 0:
            echo 'Aucun produit ne correspond à votre recherche';
            break;

          case 1:
            echo $leNbrDeProduits. ' produit trouvé';
            break;
          
          default:
            echo $leNbrDeProduits. ' produits trouvés';
            break;
        }

      }


}
?>
