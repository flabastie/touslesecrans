<?php
header ( "Content-type: text/xml" ) ;
/*
  * 28/05/2012 Auteur: François Labastie
  * catalogue_produit.php
*/

 // connexion BDD
include '../connexion/connect_mysql.php'; 

      // Requete
      $query = "SELECT  P.ID AS ID,
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
                  AND   P.Technologie_ID = Tech.ID ";


      $resultat = mysql_query($query, $conn);

      // Construction de la chaine xml
      $prologue_et_racine = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><articles></articles>";

      // Création d'un 2ième document à lier avec feuille de style xslt
      // Construction de la chaine xml
      $prologue_et_racine2 = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><?xml-stylesheet href=\"catalogue_produit.xsl\" type=\"text/xsl\"?><articles></articles>";

      $xml  = new SimpleXMLElement($prologue_et_racine);
      $xml2 = new SimpleXMLElement($prologue_et_racine2);

      // Récup valeurs issues de la requete
      while ($ligne = mysql_fetch_object($resultat))
      {         
            $produit = $xml->addChild('produit');
            $produit2 = $xml2->addChild('produit');
            $produit->addChild('marque', $ligne->marque);
            $produit2->addChild('marque', $ligne->marque);
            $produit->addChild('modele', $ligne->modele);
            $produit2->addChild('modele', $ligne->modele);
            $produit->addChild('prix', $ligne->prix);
            $produit2->addChild('prix', $ligne->prix);
            $produit->addChild('titre', $ligne->titre);
            $produit2->addChild('titre', $ligne->titre);
            $produit->addChild('ref_fabriquant', $ligne->ref_fabriquant);
            $produit2->addChild('ref_fabriquant', $ligne->ref_fabriquant);
            //$produit->addChild('slogan', htmlspecialchars($ligne->slogan) );
            $produit->addChild('description', htmlspecialchars($ligne->description) );
            $produit2->addChild('description', htmlspecialchars($ligne->description) );
            //$produit->addChild('description', html_entity_decode(htmlspecialchars($ligne->description)) );
            
      }   

      //$xml->asXML('lecatalogue.xml');

      // Retour xml
	echo $xml->asXML();

      $xml2->asXML('lecatalogue.xml');



      

      // Récup valeurs issues de la requete
/*      while ($ligne = mysql_fetch_object($resultat))
      {         
            $produit2 = $xml2->addChild('produit');
            
            
            
            
            
            //$produit->addChild('slogan', htmlspecialchars($ligne->slogan) );
            
            //$produit->addChild('description', html_entity_decode(htmlspecialchars($ligne->description)) );
            
      }   

 */     
   

mysql_close($conn);

?>