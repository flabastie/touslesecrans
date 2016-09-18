<?php
/*
  * 28/05/2012 Auteur: François Labastie
  * vue/detail_produit.php
*/
?>
      <div class="row">

        <div class="span9">

              <table class="table" id="tab_ecran">

                  <tbody>
                    <tr>
                        <!-- Marque, Modele, Technologie, Taille  -->
                        <td colspan="2"><h3><span class="titre"><?php echo $detailProduit->getInfo("marque"); ?></span> 
                          <?php echo $detailProduit->getInfo("titre"); ?></h3></td>
                    </tr> 
                    <tr>
                        <!-- Références  -->
                        <td colspan="2">Ecran / Ref. TLE : <?php echo $detailProduit->getInfo("ref_vendeur"); ?> 
                          / Ref. Fabriquant : <?php echo $detailProduit->getInfo("ref_fabriquant"); ?></td>
                    </tr>
                    <tr>
                      <!-- slogan  -->
                      <td><h4><?php echo $detailProduit->getInfo("slogan"); ?></h4><br>
                        <!-- resume  -->
                        <ul class="caracteristiques">
                          <?php echo $detailProduit->getInfo("resume"); ?>
                        </ul>
                        <!-- Voir le descriptif détaillé  -->
                        <a href="#descriptif_produit"><button class="btn" type="submit">Voir le descriptif détaillé</button></a>
                      </td>                          
                      <!-- photo1  -->
                      <td>
                          <a class="thumbnail" href="#">
                            <?php Img::afficheImage($connexion, $IDproduit, '01'); ?>
                          </a>
                      </td>
                    </tr>
                  </tbody>

              </table>

        </div>

        <!-- Début side-bar ============================================================================== -->

        <div class="span3">

          <div class="well sidebar-detail">
              <p>
                <h2 class="pull-right"><?php echo $detailProduit->getInfo("prix"); ?></h2>
                <a href="index.php?page=panier&idproduit=<?php echo $IDproduit; ?>" class="btn btn-primary pull-right" type="submit">Ajouter au panier</a>
              </p>
              <div class="clear"></div>
              <p>
                <ul class="caracteristiques garantie">
                    <li>Garanti 2 ans</li>
                    <li>Retrait en magasin <br>(voir dispo) GRATUIT</li>
                    <li >Envoi à domicile sous 48H à partir de 10,99€</li>                              
                </ul>
              </p>
          </div>

        </div> 

        <!-- Fin side-bar ============================================================================== -->    

      </div><!-- /row1 -->

      <div id="descriptif_produit"></div>  

      <div class="row">

        <div class="span7">

          <table class="table" id="tab_ecran">

            <tbody>
              <tr>
                <td colspan="2"><h3><span class="titre">Description détaillée</span></h3></td>
              </tr> 

              <tr>

              <!-- Texte  -->
                <td>

                  <h4>CARACTERISTIQUES</h4><br>

                        <p><?php echo $detailProduit->getInfo("description"); ?></p>

                  <dl class="detail_caract">

                    <!-- Ecran  -->
                    <dt class="title"><h3>Ecran</h3></dt><dd class="title">&nbsp;</dd>

                    <dt class="even"><h4> Taille de l'écran</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("taille"); ?> Pouces</dd>
                      
                    <dt class="odd"><h4> Format(s) de l'image</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("format"); ?></dd>
                      
                    <dt class="even"><h4> Technologie d'écran</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("technologie"); ?></dd>

                    <dt class="odd"><h4> Technologie 3D</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getTechno3D("techno_3D"); ?></dd>
                      
                    <dt class="even"><h4> Ecran Tactile</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getTechnoTactile("techno_tactile"); ?></dd>
                      
                    <dt class="odd"><h4> Résolution max (pixels)</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("resolution"); ?></dd>

                    <dt class="even"><h4> Reglages de l'ecran</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("reglage"); ?></dd>
                      
                    <!-- Affichage  -->
                    <dt class="title"><h3>Affichage</h3></dt><dd class="title">&nbsp;</dd>

                    <dt class="even"><h4> Rapport de contraste</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("contraste"); ?></dd>

                    <dt class="odd"><h4> Luminosité</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("luminosite"); ?> cd/m2</dd>
                      
                    <dt class="even"><h4> Temps de réponse</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("temps_reponse"); ?> ms</dd>
                      
                    <dt class="odd"><h4> Angle(s) de vision</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("angle_vision"); ?></dd>

                    <dt class="even"><h4> Pas de masque</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("pas_masque"); ?> mm</dd>

                    <!-- Connectique  -->
                      <dt class="title"><h3>Connectique</h3></dt><dd class="title">&nbsp;</dd>

                    <dt class="even"><h4> Connexion(s) vidéo</h4></dt>   
                      <dd class="even"><?php echo $lesConnectiques ?></dd>

                    <!-- Divers  -->
                      <dt class="title"><h3>Divers</h3></dt><dd class="title">&nbsp;</dd>

                    <dt class="even"><h4> Couleur dominante</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("couleur_dominante"); ?></dd>

                    <!-- Normes  -->
                      <dt class="title"><h3>Normes</h3></dt><dd class="title">&nbsp;</dd>

                    <dt class="even"><h4> Consommation en fonctionnement</h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("conso_marche"); ?> watts</dd>
                      
                      <dt class="odd"><h4> Consommation en veille</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("conso_veille"); ?> watts</dd>

                    <!-- Encombrement  -->
                      <dt class="title"><h3>Encombrement</h3></dt><dd class="title">&nbsp;</dd>

                      <dt class="even"><h4> Poids </h4></dt>   
                      <dd class="even"><?php echo $detailProduit->getInfo("poids"); ?> Kg</dd>
                      
                      <dt class="odd"><h4> Dimensions</h4></dt>   
                      <dd class="odd"><?php echo $detailProduit->getInfo("dimensions"); ?> cm</dd>
                      
                  </dl>

                </td>  
              </tbody>
            </table>   

          </div>

          <div class="span3">   
          <table>    
            <tbody>
                  
                <tr>         
                  <td>
                    <a class="thumbnail" href="#">
                      <?php Img::afficheImage($connexion, $IDproduit, '02'); ?>
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a class="thumbnail" href="#">
                      <?php Img::afficheImage($connexion, $IDproduit, '03'); ?>
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <a class="thumbnail" href="#">
                      <?php Img::afficheImage($connexion, $IDproduit, '01'); ?>
                      </a>
                  </td>
                </tr>

            </tbody>
          </table>

          </div>

      </div><!-- /row2 -->



  