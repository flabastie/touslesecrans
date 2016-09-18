<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * vues/liste_produit.php
*/
?>


      <div class="row">

<?php 
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/
?>

        <div class="span3">

          <h4>AFFINEZ VOTRE RECHERCHE</h4>

          <!-- Début formulaire ============================================================================== -->

          <form name='formRecherche' method="post" action="index.php?page=liste_produit">

              <!-- Prix ==================================================================================== -->

              <div class="prix">
                PRIX
            
                <div class="controls">
                    <select name="prixmin" id="prixmin" class="prixmin" onChange="formRecherche.submit();">

                      <?php
                        // Affichage prixmin
                        $prixbase = 50;
                        $steps = 4;
                        for ($i = 0; $i < $steps; $i++)
                        {
                            $prix = $i * 50 + $prixbase;

                            if (isset($_SESSION['prixmin']) && $prix == $_SESSION['prixmin'])
                            {
                                $selectPrixmin = 'selected'; 
                            }    
                            else
                            {
                                $selectPrixmin = "";
                            }

                            if ($i == 0)
                            {
                                echo  '<option value="0">De ...</option>';
                            } 
                            else 
                            {
                                echo  '<option value="'.$prix.'" '.$selectPrixmin.' > > '.$prix.' € </option>';
                            }

                        }
                      ?>

                    </select>
                </div>

                <div class="controls">
                    <select name="prixmax" id="prixmax" class="prixmax" onChange="formRecherche.submit();">

                      <?php
                        // Affichage prixmax
                        $prixbase = 200;
                        $steps = 5;
                        for ($i = 0; $i < $steps = 5; $i++)
                        {
                            $prix = $i * 50 + $prixbase;

                            if (isset($_SESSION['prixmax']) && $prix == $_SESSION['prixmax'])
                            {
                                $selectPrixmax = 'selected'; 
                            }    
                            else
                            {
                                $selectPrixmax = "";
                            }
                            if ($i == 0)
                            {
                                echo  '<option value="0">Jusqu\'à ...</option>';
                            } 
                            else if ($i == $steps -1)
                            {
                                echo  '<option value="2000"> + '.$prix.' €</option>';
                            } 
                            else 
                            {
                                echo  '<option value="'.$prix.'" '.$selectPrixmax.' > < '.$prix.' € </option>';
                            }

                        }
                      ?>

                    </select>
                </div>
             
              </div>

            <div class="accordion" id="accordion2">

              <!-- Marque ==================================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  MARQUE
                    <div class="controls">
                      <?php
                        // Affichage checkbox marques (3 premières marques)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_marque']) && in_array($i+1, $_SESSION['checkbox_marque'])) 
                            {
                                $selectMarqueA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectMarqueA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="marque" name="marque[]" onChange="formRecherche.submit();"
                                    '. $selectMarqueA .' value='.($i+1).'>'.$tabLabMarques[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                    + marques
                    </a>
                </div>

                <div id="collapseOne" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox marques (marques suivantes)
                        for ($i = 3; $i < sizeof($tabLabMarques); $i++)
                        {

                            if (isset($_SESSION['checkbox_marque']) && in_array($i+1, $_SESSION['checkbox_marque'])) 
                            {
                                $selectMarqueB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectMarqueB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="optionsCheckbox" name="marque[]" onChange="formRecherche.submit();"
                                    '. $selectMarqueB .' value='.($i+1).'>'.$tabLabMarques[$i].
                                  '</label>';
                        }
                      ?> 
                    </div>
                  </div> 
                </div>
              </div>

              <!-- Taille ==================================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  TAILLE DE L'ECRAN
                    <div class="controls">
                      <?php
                        // Affichage checkbox tailles (3 premières tailles)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_taille']) && in_array($i+1, $_SESSION['checkbox_taille'])) 
                            {
                                $selectTailleA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectTailleA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="taille" name="taille[]" onChange="formRecherche.submit();"
                                    '. $selectTailleA .' value='.($i+1).'>'.$tabLabTailles[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                    + tailles
                    </a>
                </div>

                <div id="collapseTwo" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox tailles (tailles suivantes)
                        for ($i = 3; $i < sizeof($tabLabTailles); $i++)
                        {

                            if (isset($_SESSION['checkbox_taille']) && in_array($i+1, $_SESSION['checkbox_taille'])) 
                            {
                                $selectTailleB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectTailleB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="taille" name="taille[]" onChange="formRecherche.submit();"
                                    '. $selectTailleB .' value='.($i+1).'>'.$tabLabTailles[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                  </div> 
                </div>
              </div>

              <!-- Technologie Ecran ============================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  TECHNOLOGIE DE L'ECRAN
                    <div class="controls">
                      <?php
                        // Affichage checkbox technologies (3 premières technologies)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_techno']) && in_array($i+1, $_SESSION['checkbox_techno'])) 
                            {
                                $selectTechnoA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectTechnoA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="techno" name="techno[]" onChange="formRecherche.submit();"
                                    '. $selectTechnoA .' value='.($i+1).'>'.$tabLabTechnos[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
                    + technologies
                    </a>
                </div>

                <div id="collapseThree" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox technologies (technologies suivantes)
                        for ($i = 3; $i < sizeof($tabLabTechnos); $i++)
                        {

                            if (isset($_SESSION['checkbox_techno']) && in_array($i+1, $_SESSION['checkbox_techno'])) 
                            {
                                $selectTechnoB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectTechnoB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="techno" name="techno[]" onChange="formRecherche.submit();"
                                    '. $selectTechnoB .' value='.($i+1).'>'.$tabLabTechnos[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                  </div> 
                </div>
              </div>

              <!-- Resolution ============================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  RESOLUTION MAX (Pixels)
                    <div class="controls">
                      <?php
                        // Affichage checkbox resolutions (3 premières resolutions)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_resolution']) && in_array($i+1, $_SESSION['checkbox_resolution'])) 
                            {
                                $selectResolutionA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectResolutionA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="resolution" name="resolution[]" onChange="formRecherche.submit();"
                                    '. $selectResolutionA .' value='.($i+1).'>'.$tabLabResolutions[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">
                    + résolutions
                    </a>
                </div>

                <div id="collapseFour" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox resolutions (resolutions suivantes)
                        for ($i = 3; $i < sizeof($tabLabResolutions); $i++)
                        {

                            if (isset($_SESSION['checkbox_resolution']) && in_array($i+1, $_SESSION['checkbox_resolution'])) 
                            {
                                $selectResolutionB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectResolutionB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="resolution" name="resolution[]" onChange="formRecherche.submit();"
                                    '. $selectResolutionB .' value='.($i+1).'>'.$tabLabResolutions[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                  </div> 
                </div>
              </div>

              <!-- Luminosité ============================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  LUMINOSITE
                    <div class="controls">
                      <?php
                        // Affichage checkbox luminosités (3 premières luminosités)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_luminosite']) && in_array($i+1, $_SESSION['checkbox_luminosite'])) 
                            {
                                $selectLuminositeA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectLuminositeA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="luminosite" name="luminosite[]" onChange="formRecherche.submit();"
                                    '. $selectLuminositeA .' value='.($i+1).'>'.$tabLabLuminosites[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">
                    + luminosités
                    </a>
                </div>

                <div id="collapseFive" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox luminosités (luminosités suivantes)
                        for ($i = 3; $i < sizeof($tabLabLuminosites); $i++)
                        {

                            if (isset($_SESSION['checkbox_luminosite']) && in_array($i+1, $_SESSION['checkbox_luminosite'])) 
                            {
                                $selectLuminositeB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectLuminositeB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="luminosite" name="luminosite[]" onChange="formRecherche.submit();"
                                    '. $selectLuminositeB .' value='.($i+1).'>'.$tabLabLuminosites[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                  </div> 
                </div>
              </div>

              <!-- Connectique ============================================================================== -->

              <div class="accordion-group">
                <div class="accordion-inner">
                  CONNECTIQUE
                    <div class="controls">
                      <?php
                        // Affichage checkbox connectiques (3 premières connectiques)
                        for ($i = 0; $i < 3; $i++)
                        {
                            if (isset($_SESSION['checkbox_connectique']) && in_array($i+1, $_SESSION['checkbox_connectique'])) 
                            {
                                $selectConnectiqueA = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectConnectiqueA = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="connectique" name="connectique[]" onChange="formRecherche.submit();"
                                    '. $selectConnectiqueA .' value='.($i+1).'>'.$tabLabConnectiques[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseSix">
                    + connectiques
                    </a>
                </div>

                <div id="collapseSix" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <div class="controls">
                      <?php
                        // Affichage checkbox connectiques (connectiques suivantes)
                        for ($i = 3; $i < sizeof($tabLabConnectiques); $i++)
                        {

                            if (isset($_SESSION['checkbox_connectique']) && in_array($i+1, $_SESSION['checkbox_connectique'])) 
                            {
                                $selectConnectiqueB = 'checked="checked"'; 
                            }    
                            else
                            {
                                $selectConnectiqueB = "";
                            }

                            echo  '<label class="checkbox">
                                    <input type="checkbox" id="connectique" name="connectique[]" onChange="formRecherche.submit();"
                                    '. $selectConnectiqueB .' value='.($i+1).'>'.$tabLabConnectiques[$i].
                                  '</label>';
                        }
                      ?>
                    </div>
                  </div> 
                </div>
              </div>

            </div>

          </form>

          <!-- Fin formulaire =============================================================================== -->

        </div>

        <div class="span9">

                    <table class="table well" id="myTable">

                        <thead>
                          <tr>
                            <th><?php $uneRecherche->aFnbrProduitsTrouves($nbrProduits); ?></th>
                            <th>Ordre Alphabétique</th>
                            <th>Prix</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          // on calcule la derniereEntree de produit à afficher sur la page
                          $derniereEntree = $premiereEntree+$nbreProduitParPage;
                          // si le derniereEntree > taille du tableau alors derniereEntree = size tableau
                          if($derniereEntree > sizeof($_SESSION["infosProduit"]))
                          {
                            $derniereEntree = sizeof($_SESSION["infosProduit"]);
                          }
                          for($i=$premiereEntree; $i < $derniereEntree; $i++)
                          {

                          echo '  
                            <tr onclick="document.location=\'index.php?page=detail_produit&idproduit='.$_SESSION["infosProduit"][$i]['ID'].'\'">
                                <td>
                                    <a class="thumbnail" href="index.php?page=detail_produit&idproduit='.$_SESSION["infosProduit"][$i]['ID'].'">';
                                            // Affichage image produit
                                            Img::afficheImage($connexion, $_SESSION["infosProduit"][$i]['ID'], '01');
                          echo '   </a>
                                </td>
                               
                                <td>'  .    $_SESSION["infosProduit"][$i]['marque']  . ' <br>'
                                       .    $_SESSION["infosProduit"][$i]['titre']  . '<br>
                                            Taille de l\'écran ' . $_SESSION["infosProduit"][$i]['taille'] . ' pouces<br>
                                            Résolution max (pixels) ' . $_SESSION["infosProduit"][$i]['resolution'] . ' <br>
                                </td>

                                <td><h3>' . $_SESSION["infosProduit"][$i]['prix'] . ' € </h3></td>
                            </tr>';
                          }      
                          ?> 

                        </tbody>
                    </table>

                    <!-- pagination =============================================================================== -->

                    <div class="pagination">
                      <ul>
                        <?php
                            if($nbreDePages >1)
                            {
                                for($i=1; $i<=$nbreDePages; $i++)
                                {
                                    // si page actuelle
                                    if($i==$pageActuelle)
                                    {
                                        echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                    }
                                    else 
                                    {
                                        echo '<li><a href="index.php?page=liste_produit&numpage='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                            }
                        ?>
                      </ul>
                    </div>

        </div>

      </div><!-- /row -->





