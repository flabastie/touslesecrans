<?php
/*
 *   21/05/2012 Auteur: François Labastie
 *   Class produitUpdate
 *   Modifications dans la BDD
 */



class produitUpdate
{
    // déclaration des propriétés
    private $nomlabel;
    // ID du produit nouvellement inséré dans BDD
    private $ID_updateProduit;
    // tableaux pour insertion des couples "Connectique_ID / Produit_ID"
    private $tabConnectiques;
    private $tab_ConnectiqueProduit;
    // Variables pour insertions des infos dans la table Produit
    private $modele_02;
    private $prix_03;
    private $titre_04; 
    private $ref_fabriquant_05;
    private $ref_vendeur_06;
    private $slogan_07;
    private $resume_08;
    private $disponibilite_09;
    private $format_11;
    private $techno3D_14; 
    private $techno_tactile_15;
    private $reglage_16;
    private $aspect_dalle_17;
    private $contraste_18;
    private $temps_reponse_20;
    private $angle_21;
    private $pas_de_masque_22;
    private $rafraichissement_23;
    private $haut_parleurs_25;
    private $couleur_26;
    private $conso_marche_27;
    private $conso_veille_28;
    private $poids_29;
    private $dimensions_30; 
    private $description_31;
    private $ID_marque;
    private $ID_technologie;
    private $ID_taille;
    private $ID_luminosite;
    private $ID_resolution;

      /*
       *   Constructeur
       *    
       */

      public function __construct($_ID) {

        $tabConnectiques = array();
        $tab_ConnectiqueProduit = array();
        $this->ID_updateProduit = $_ID;

      }

      /*
       *    Fonction recup_Labels()
       *    Prend en paramètre un nom de marque (par ex.) et retourne l'ID correspondant
       *    Ne s'applique qu'aux tables Marque, Technologie, Taille, Resolution, Luminosite
       *    Type de paramètre de retour : entier
       */

      public function recup_idLabel($connexion, $_nomTable, $_nomLabel) {

        switch ($_nomTable) {
          case 'Marque':
            $stmt = $connexion->prepare("SELECT * FROM `Marque` WHERE Marque.label = ? ");
            break;

          case 'Technologie':
            $stmt = $connexion->prepare("SELECT * FROM `Technologie` WHERE label = ? ");
            break;

          case 'Taille':
            $stmt = $connexion->prepare("SELECT * FROM `Taille` WHERE label = ? ");
            break;

          case 'Resolution':
            $stmt = $connexion->prepare("SELECT * FROM `Resolution` WHERE label = ? ");
            break;

          case 'Luminosite':
            $stmt = $connexion->prepare("SELECT * FROM `Luminosite` WHERE label = ? ");
            break;
          
          default:
            # code...
            break;
        }

        // exécution requête avec variable en paramètre
        $stmt->bindParam(1, $_nomLabel);
        $stmt->execute();

        // réception comme objet
        $stmt->setFetchMode(PDO::FETCH_OBJ); 

        $ligne = $stmt->fetch();

        return $ligne->ID;
      } 


      /*
       *    Fonction insertInfosProduit()
       *    Prend en paramètre les données du formulaire
       *    et les insère dans la table Produit de la BDD
       */

      public function updateInfosProduit(   $connexion,
                                            $_modele_02, 
                                            $_prix_03, 
                                            $_titre_04, 
                                            $_ref_fabriquant_05, 
                                            $_ref_vendeur_06,
                                            $_slogan_07, 
                                            $_resume_08, 
                                            $_disponibilite_09,
                                            $_format_11, 
                                            $_techno3D_14, 
                                            $_techno_tactile_15, 
                                            $_reglage_16, 
                                            $_aspect_dalle_17, 
                                            $_contraste_18,
                                            $_temps_reponse_20, 
                                            $_angle_21, 
                                            $_pas_de_masque_22, 
                                            $_rafraichissement_23, 
                                            $_haut_parleurs_25, 
                                            $_couleur_26, 
                                            $_conso_marche_27, 
                                            $_conso_veille_28, 
                                            $_poids_29, 
                                            $_dimensions_30, 
                                            $_description_31,
                                            $_ID_marque,
                                            $_ID_technologie,
                                            $_ID_taille,
                                            $_ID_luminosite,
                                            $_ID_resolution   ) 
      {
              $this->modele_02 = $_modele_02;
              $this->prix_03 =  $_prix_03;
              $this->titre_04 = $_titre_04;
              $this->ref_fabriquant_05 = $_ref_fabriquant_05;
              $this->ref_vendeur_06 = $_ref_vendeur_06;
              $this->slogan_07 = $_slogan_07;
              $this->resume_08 = $_resume_08;
              $this->disponibilite_09 = $_disponibilite_09;
              $this->format_11 = $_format_11;
              $this->techno3D_14 = $_techno3D_14;
              $this->techno_tactile_15 = $_techno_tactile_15;
              $this->reglage_16 = $_reglage_16;
              $this->aspect_dalle_17 = $_aspect_dalle_17;
              $this->contraste_18 = $_contraste_18;
              $this->temps_reponse_20 = $_temps_reponse_20;
              $this->angle_21 = $_angle_21;
              $this->pas_de_masque_22 = $_pas_de_masque_22;
              $this->rafraichissement_23 = $_rafraichissement_23;
              $this->haut_parleurs_25 = $_haut_parleurs_25;
              $this->couleur_26 = $_couleur_26;
              $this->conso_marche_27 = $_conso_marche_27;
              $this->conso_veille_28 = $_conso_veille_28;
              $this->poids_29 = $_poids_29;
              $this->dimensions_30 = $_dimensions_30;
              $this->description_31 = $_description_31;
              $this->ID_marque = $_ID_marque;
              $this->ID_technologie = $_ID_technologie;
              $this->ID_taille = $_ID_taille;
              $this->ID_luminosite = $_ID_luminosite;
              $this->ID_resolution = $_ID_resolution;

              try
              {
              // insertion dans table Utilisateur
              $requete = 'UPDATE Produit SET      `modele` =  :modele , 
                                                  `prix` = :prix ,
                                                  `titre` = :titre ,
                                                  `ref_fabriquant` = :ref_fabriquant , 
                                                  `ref_vendeur` = :ref_vendeur ,
                                                  `slogan` = :slogan ,
                                                  `resume` = :resume ,
                                                  `disponibilite` = :disponibilite,
                                                  `format` = :format ,
                                                  `techno_3D` = :techno_3D ,
                                                  `techno_tactile` = :techno_tactile ,
                                                  `reglage` = :reglage ,
                                                  `aspect_dalle` = :aspect_dalle ,
                                                  `contraste` = :contraste ,
                                                  `temps_reponse` = :temps_reponse ,
                                                  `angle_vision` = :angle_vision ,
                                                  `pas_masque` = :pas_masque ,
                                                  `rafraichissement` = :rafraichissement ,
                                                  `haut_parleurs` = :haut_parleurs ,
                                                  `couleur_dominante` = :couleur_dominante ,
                                                  `conso_marche` = :conso_marche ,
                                                  `conso_veille` = :conso_veille ,
                                                  `poids` = :poids ,
                                                  `dimensions` = :dimensions ,
                                                  `description` = :description,
                                                  `Marque_ID` = :marque_id,
                                                  `Technologie_ID` = :technologie_id,
                                                  `Taille_ID` = :taille_id,
                                                  `Luminosite_ID` = :luminosite_id,
                                                  `Resolution_ID` = :resolution_id
          
                                                   WHERE `ID` = :id
                                                  
                                            )';

              $stmt = $connexion->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

              $stmt->execute(array(   ':modele' => $this->modele_02, 
                                      ':prix' => $this->prix_03, 
                                      ':titre' => $this->titre_04, 
                                      ':ref_fabriquant' => $this->ref_fabriquant_05, 
                                      ':ref_vendeur' => $this->ref_vendeur_06,
                                      ':slogan' => $this->slogan_07, 
                                      ':resume' => $this->resume_08, 
                                      ':disponibilite' => $this->disponibilite_09,
                                      ':format' => $this->format_11, 
                                      ':techno_3D' => $this->techno3D_14, 
                                      ':techno_tactile' => $this->techno_tactile_15, 
                                      ':reglage' => $this->reglage_16, 
                                      ':aspect_dalle' => $this->aspect_dalle_17, 
                                      ':contraste' => $this->contraste_18,
                                      ':temps_reponse' => $this->temps_reponse_20, 
                                      ':angle_vision' => $this->angle_21, 
                                      ':pas_masque' => $this->as_de_masque_22, 
                                      ':rafraichissement' => $this->rafraichissement_23, 
                                      ':haut_parleurs' => $this->haut_parleurs_25, 
                                      ':couleur_dominante' => $this->couleur_26, 
                                      ':conso_marche' => $this->conso_marche_27, 
                                      ':conso_veille' => $this->conso_veille_28, 
                                      ':poids' => $this->poids_29, 
                                      ':dimensions' => $this->dimensions_30, 
                                      ':description' => $this->description_31,
                                      ':marque_id' => $this->ID_marque,
                                      ':technologie_id' => $this->ID_technologie,
                                      ':taille_id' => $this->ID_taille,
                                      ':luminosite_id' => $this->ID_luminosite,
                                      ':resolution_id' => $this->ID_resolution,
                                      ':id' => $this->ID_updateProduit
                                ));

              }

              catch (Exception $e)
              {
                  echo ' Erreur : '.$e->getMessage(); 
                  echo ' Numero : '.$e->getCode();
                  die();
              }

      }

      /*
       *    Fonction insertInfosConnectique()
       *    Prend en paramètre les données du formulaire correspondantes aux connectiques (tableau)
       *    et l'ID du produit et les insère dans la table Liaison de la BDD
       */

      public function updateInfosConnectique($connexion, $_tabConnectiques)
      {
          $this->tabConnectiques = $_tabConnectiques;

          // Récupération des ID de connectiques (table Connectique) à partir de leurs noms
          $stmt1 = $connexion->prepare( 'SELECT ID FROM Connectique WHERE label = ? ');

          // Création d'un nouveau tableau de couples (Connectique_ID , Produit_ID)
          foreach ($this->tabConnectiques as $valeur) 
          {
                // exécution requête avec variable en paramètre
                $stmt1->bindParam(1, $valeur);
                $stmt1->execute();
                $stmt1->setFetchMode(PDO::FETCH_OBJ); 
                // récupération valeur ID
                $ligne = $stmt1->fetch();
                $id = $ligne->ID;
                // Remplissage tableau associatif tab_ConnectiqueProduit
                $this->tab_ConnectiqueProduit[$id] = $this->ID_updateProduit;
          }

          // requete pour insertion des couples (Connectique_ID , Produit_ID) dans table Liaison
          $stmt2 = $connexion->prepare ("UPDATE Liaison SET `Connectique_ID` = ? WHERE Produit_ID = ? ");
        
          foreach ($this->tab_ConnectiqueProduit as $cle => $valeur) 
          {
              // exécution requête avec variable en paramètre
              $stmt2->bindParam(1, $cle);
              $stmt2->bindParam(2, $valeur);
              $stmt2->execute();
          } 

      }

    /*
     *    Fonction afficheInfosProduit()
     *    Prend en paramètre le champ à afficher
     *    Retourne la donnée récupérée
     */

    public function afficheInfosProduit($connexion, $_nomlabel)
    {

      $this->nomlabel = $_nomlabel;

      // Récupération de l'info selon id
      switch ($this->nomlabel) {

        case 'modele':
          $stmt = $connexion->prepare( "SELECT modele as result FROM Produit WHERE ID = ? ");
          break;

        case 'prix':
          $stmt = $connexion->prepare( "SELECT prix as result FROM Produit WHERE ID = ? ");
          break;

        case 'titre':
          $stmt = $connexion->prepare( "SELECT titre as result FROM Produit WHERE ID = ? ");
          break;

        case 'ref_fabriquant':
          $stmt = $connexion->prepare( "SELECT ref_fabriquant as result FROM Produit WHERE ID = ? ");
          break;

        case 'ref_vendeur':
          $stmt = $connexion->prepare( "SELECT ref_vendeur as result FROM Produit WHERE ID = ? ");
          break;

        case 'slogan':
          $stmt = $connexion->prepare( "SELECT slogan as result FROM Produit WHERE ID = ? ");
          break;

        case 'resume':
          $stmt = $connexion->prepare( "SELECT resume as result FROM Produit WHERE ID = ? ");
          break;

        case 'disponibilite':
          $stmt = $connexion->prepare( "SELECT disponibilite as result FROM Produit WHERE ID = ? ");
          break;

        case 'format':
          $stmt = $connexion->prepare( "SELECT format as result FROM Produit WHERE ID = ? ");
          break;

        case 'techno_3D':
          $stmt = $connexion->prepare( "SELECT techno_3D as result FROM Produit WHERE ID = ? ");
          break;

        case 'techno_tactile':
          $stmt = $connexion->prepare( "SELECT techno_tactile as result FROM Produit WHERE ID = ? ");
          break;

        case 'reglage':
          $stmt = $connexion->prepare( "SELECT reglage as result FROM Produit WHERE ID = ? ");
          break;
 
        case 'aspect_dalle':
          $stmt = $connexion->prepare( "SELECT aspect_dalle as result FROM Produit WHERE ID = ? ");
          break;

        case 'contraste':
          $stmt = $connexion->prepare( "SELECT contraste as result FROM Produit WHERE ID = ? ");
          break;

        case 'temps_reponse':
          $stmt = $connexion->prepare( "SELECT temps_reponse as result FROM Produit WHERE ID = ? ");
          break;

        case 'angle_vision':
          $stmt = $connexion->prepare( "SELECT angle_vision as result FROM Produit WHERE ID = ? ");
          break;

        case 'pas_masque':
          $stmt = $connexion->prepare( "SELECT pas_masque as result FROM Produit WHERE ID = ? ");
          break;

        case 'rafraichissement':
          $stmt = $connexion->prepare( "SELECT rafraichissement as result FROM Produit WHERE ID = ? ");
          break;

        case 'haut_parleurs':
          $stmt = $connexion->prepare( "SELECT haut_parleurs as result FROM Produit WHERE ID = ? ");
          break;

        case 'couleur_dominante':
          $stmt = $connexion->prepare( "SELECT couleur_dominante as result FROM Produit WHERE ID = ? ");
          break;

        case 'conso_marche':
          $stmt = $connexion->prepare( "SELECT conso_marche as result FROM Produit WHERE ID = ? ");
          break;

        case 'conso_veille':
          $stmt = $connexion->prepare( "SELECT conso_veille as result FROM Produit WHERE ID = ? ");
          break;

        case 'poids':
          $stmt = $connexion->prepare( "SELECT poids as result FROM Produit WHERE ID = ? ");
          break;   

        case 'dimensions':
          $stmt = $connexion->prepare( "SELECT dimensions as result FROM Produit WHERE ID = ? ");
          break;

        case 'description':
          $stmt = $connexion->prepare( "SELECT description as result FROM Produit WHERE ID = ? ");
          break;

        case 'Marque_ID':
          $stmt = $connexion->prepare( "SELECT Marque_ID as result FROM Produit WHERE ID = ? ");
          break;

        case 'Technologie_ID':
          $stmt = $connexion->prepare( "SELECT Technologie_ID as result FROM Produit WHERE ID = ? ");
          break;

        case 'Taille_ID':
          $stmt = $connexion->prepare( "SELECT Taille_ID as result FROM Produit WHERE ID = ? ");
          break;

        case 'Luminosite_ID':
          $stmt = $connexion->prepare( "SELECT Luminosite_ID as result FROM Produit WHERE ID = ? ");
          break;

        case 'Resolution_ID':
          $stmt = $connexion->prepare( "SELECT Resolution_ID as result FROM Produit WHERE ID = ? ");
          break;

        default:
          # code...
          break;
      }

      $stmt->bindParam(1, $this->ID_updateProduit);
      $stmt->execute();
      // Récupération comme objet
      $stmt->setFetchMode(PDO::FETCH_OBJ); 

      $ligne = $stmt->fetch();
      $resultat = $ligne->result;

      return $resultat;

    }

    /*
     *    Fonction afficheInfosBase()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheInfosBase($connexion, $_label)
    {

      $label = $_label;
      $chaineRetour = -1;

      switch ($label) 
      {

        case 'Marque_ID':
            $idLabel = $this->afficheInfosProduit($connexion, 'Marque_ID');
            // Affichage du code html correspondant à select
            for ($i=0; $i < sizeof($_SESSION["listeMarques"]); $i++)
            {
                if($i == $idLabel-1) // -1 car début à 0 dans tableaux, et début à 1 dans base
                {
                  echo '<option value="'. $_SESSION["listeMarques"][$i] .'" selected="selected" >'. $_SESSION["listeMarques"][$i] .'</option>';
                }
                else 
                {
                  echo '<option value="'. $_SESSION["listeMarques"][$i] .'">'. $_SESSION["listeMarques"][$i] .'</option>';
                }

            }
            break;

        case 'Technologie_ID':
            $idLabel = $this->afficheInfosProduit($connexion, 'Technologie_ID');
            // Affichage du code html correspondant à select
            for ($i=0; $i < sizeof($_SESSION["listeTechnos"]); $i++)
            {
              if($i == $idLabel-1) // -1 car début à 0 dans tableaux, et début à 1 dans base
              {
                echo '<option value="'. $_SESSION["listeTechnos"][$i] .'" selected="selected" >'. $_SESSION["listeTechnos"][$i] .'</option>';
              }
              else
              {
                echo '<option value="'. $_SESSION["listeTechnos"][$i] .'">'. $_SESSION["listeTechnos"][$i] .'</option>';
              }
          
            }
            break;

        case 'Taille_ID':
            // Récupération de Taille_ID dans table Produit
            $idLabel = $this->afficheInfosProduit($connexion, 'Taille_ID');
            // Affichage du code html correspondant à select
            for ($i=0; $i < sizeof($_SESSION["listeTailles"]); $i++)
            {
                if($i == $idLabel-1) // -1 car début à 0 dans tableaux, et début à 1 dans base
                {
                  echo '<option value="'. $_SESSION["listeTailles"][$i] .'" selected="selected" >'. $_SESSION["listeTailles"][$i] .'</option>';
                }
                else 
                { 
                  echo '<option value="'. $_SESSION["listeTailles"][$i] .'">'. $_SESSION["listeTailles"][$i] .'</option>';
                }

            }
            break;

        case 'Luminosite_ID':
            $idLabel = $this->afficheInfosProduit($connexion, 'Luminosite_ID');
            // Affichage du code html correspondant à select
            for ($i=0; $i < sizeof($_SESSION["listeLuminosites"]); $i++)
            {
              if($i == $idLabel-1) // -1 car début à 0 dans tableaux, et début à 1 dans base
              {
                echo '<option value="'. $_SESSION["listeLuminosites"][$i] .'" selected="selected" >'. $_SESSION["listeLuminosites"][$i] .'</option>';
              }
              else
              {
                echo '<option value="'. $_SESSION["listeLuminosites"][$i] .'">'. $_SESSION["listeLuminosites"][$i] .'</option>';
              }
            }
            break;

        case 'Resolution_ID':
            $idLabel = $this->afficheInfosProduit($connexion, 'Resolution_ID');
            // Affichage du code html correspondant à select
            for ($i=0; $i < sizeof($_SESSION["listeResolutions"]); $i++)
            {
              if($i == $idLabel-1) // -1 car début à 0 dans tableaux, et début à 1 dans base
              {
                echo '<option value="'. $_SESSION["listeResolutions"][$i] .'" selected="selected" >'. $_SESSION["listeResolutions"][$i] .'</option>';
              }
              else
              {
                echo '<option value="'. $_SESSION["listeResolutions"][$i] .'">'. $_SESSION["listeResolutions"][$i] .'</option>';
              }

            }
            break;
        
        default:
          # code...
          break;
      }


    }


    /*
     *    Fonction afficheDispoProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheDispoProduit($connexion)
    {

        $resultatDispo = $this->afficheInfosProduit($connexion, 'disponibilite');
        $chaineRetour = '';

        switch ($resultatDispo) 
        {
          case 1:
                  $chaineRetour = '<option value="1" selected="selected">En stock</option>
                                  <option value="0">Epuisé</option>
                                  <option value="2">Hors catalogue</option>';
            break;

          case 0:
                  $chaineRetour = '<option value="1">En stock</option>
                                  <option value="0" selected="selected">Epuisé</option>
                                  <option value="2">Hors catalogue</option>';
            break;

          case 2:
                  $chaineRetour = '<option value="1">En stock</option>
                                  <option value="0">Epuisé</option>
                                  <option value="2" selected="selected">Hors catalogue</option>';
            break;
          
          default:
                  $chaineRetour = '<option value="1">En stock</option>
                                  <option value="0">Epuisé</option>
                                  <option value="2" selected="selected">Hors catalogue</option>';
            break;
        }

        return $chaineRetour;

    }

    /*
     *    Fonction afficheFormatProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheFormatProduit($connexion)
    {

        $resultatFormat = $this->afficheInfosProduit($connexion, 'format');
        $chaineRetour = '';

        switch ($resultatFormat) 
        {
          case '-':
                  $chaineRetour = '<option value="-" selected="selected">-</option>
                                  <option value="16/9">16/9</option>
                                  <option value="16/10">16/10</option>
                                  <option value="4/3">4/3</option>';
            break;

          case '16/9':
                  $chaineRetour = '<option value="-" >-</option>
                                  <option value="16/9" selected="selected">16/9</option>
                                  <option value="16/10">16/10</option>
                                  <option value="4/3">4/3</option>';
            break;

          case '16/10':
                  $chaineRetour = '<option value="-">-</option>
                                  <option value="16/9">16/9</option>
                                  <option value="16/10" selected="selected">16/10</option>
                                  <option value="4/3">4/3</option>';
            break;

          case '4/3':
                  $chaineRetour = '<option value="-">-</option>
                                  <option value="16/9">16/9</option>
                                  <option value="16/10">16/10</option>
                                  <option value="4/3" selected="selected">4/3</option>';
            break;
          
          
          default:
                  $chaineRetour = '<option value="-" selected="selected">-</option>
                                  <option value="16/9">16/9</option>
                                  <option value="16/10">16/10</option>
                                  <option value="4/3">4/3</option>';
            break;
        }

        return $chaineRetour;

    }

    /*
     *    Fonction afficheTechno3DProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheTechno3DProduit($connexion)
    {

        $resultatTechno3D = $this->afficheInfosProduit($connexion, 'techno_3D');
        $chaineRetour = '';

        switch ($resultatTechno3D) 
        {
          case 0:
                  $chaineRetour = '<option value="0" selected="selected">non</option>
                                  <option value="1">oui</option>';
            break;

          case 1:
                  $chaineRetour = '<option value="0" >non</option>
                                  <option value="1" selected="selected">oui</option>';
            break;
          
          default:
            //
            break;
        }

        return $chaineRetour;

    }

    /*
     *    Fonction afficheTechnoTactileProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheTechnoTactileProduit($connexion)
    {

        $resultatTechnoTactile = $this->afficheInfosProduit($connexion, 'techno_tactile');
        $chaineRetour = '';

        switch ($resultatTechnoTactile) 
        {
          case 0:
                  $chaineRetour = '<option value="0" selected="selected">non</option>
                                  <option value="1">oui</option>';
            break;

          case 1:
                  $chaineRetour = '<option value="0" >non</option>
                                  <option value="1" selected="selected">oui</option>';
            break;
          
          default:
            //
            break;
        }

        return $chaineRetour;

    }

    /*
     *    Fonction afficheAspectDalleProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheAspectDalleProduit($connexion)
    {

        $resultatAspectDalle = $this->afficheInfosProduit($connexion, 'aspect_dalle');
        $chaineRetour = '';

        switch ($resultatAspectDalle) 
        {
          case '-':
                  $chaineRetour = '<option value="-" selected="selected">-</option>
                                  <option value="Dalle mate">Dalle mate</option>
                                  <option value="Dalle brillante">Dalle brillante</option>';
            break;

          case 'Dalle mate':
                  $chaineRetour = '<option value="-" >-</option>
                                  <option value="Dalle mate" selected="selected">Dalle mate</option>
                                  <option value="Dalle brillante">Dalle brillante</option>';
            break;

          case 'Dalle brillante':
                  $chaineRetour = '<option value="-" >-</option>
                                  <option value="Dalle mate">Dalle mate</option>
                                  <option value="Dalle brillante" selected="selected">Dalle brillante</option>';
            break;
          
          default:
            //
            break;
        }

        return $chaineRetour;

    }

    /*
     *    Fonction afficheTechnoTactileProduit()
     *    Prend en paramètre la connexion
     *    Retourne la chaine html à afficher
     */

    public function afficheHPProduit($connexion)
    {

        $resultatHP = $this->afficheInfosProduit($connexion, 'haut_parleurs');
        $chaineRetour = '';

        switch ($resultatHP) 
        {
          case 0:
                  $chaineRetour = '<option value="0" selected="selected">non</option>
                                  <option value="1">oui</option>';
            break;

          case 1:
                  $chaineRetour = '<option value="0" >non</option>
                                  <option value="1" selected="selected">oui</option>';
            break;
          
          default:
            //
            break;
        }

        return $chaineRetour;

    }

      /*
       *    Fonction afficheInfosConnectique()
       *    Prend en paramètre la connexion
       *    Retourne la chaine html à afficher
       */

      public function afficheInfosConnectique($connexion)
      {
          $tabConnectiques_ID = array();

          // Récupération des ID de connectiques correspondantes au produit dans table Liaison
          $stmt = $connexion->prepare( 'SELECT Connectique_ID AS ID FROM Liaison WHERE Produit_ID = ? ');
          // exécution requête avec variable en paramètre
          $stmt->bindParam(1, $this->ID_updateProduit);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_OBJ);

          // Création d'un nouveau tableau
          $i=0;
          while($ligne=$stmt->fetch())
          {
            $tabConnectiques_ID[$i] = $ligne->ID;
            $i++;
          }

          // Récupération des noms de connectiques
          $requete =  'SELECT * from Connectique';
          foreach  ($connexion->query($requete) as $row) 
          {
              $tab_label[] = $row['label'];
          }

          // Affichage du code html correspondant à select
          foreach ($tab_label as $key => $value) 
          {
            if( in_array($key, $tabConnectiques_ID))
            {
              //echo $key. " ". $value . "<br>";
              echo '<option value="'. $_SESSION["listeConnectiques"][$key] .'" selected="selected" >'. $_SESSION["listeConnectiques"][$key] .'</option>';
            }
            else
            {
              echo '<option value="'. $_SESSION["listeConnectiques"][$key] .'" >'. $_SESSION["listeConnectiques"][$key] .'</option>';
            }

          }  
          
      }


}
?>
