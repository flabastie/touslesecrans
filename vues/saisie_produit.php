 <?php
/*
  * 11/05/2012 Auteur: François Labastie
  * vues/saisie_produit.php
*/
?>
<!-- ckeditor  -->
    
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="assets/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#textarea2").ckeditor();
        });
    </script>

<div class="row">

  <div class="span9">

    <form class="form-horizontal" method="post" action="index.php?page=insert_produit" enctype="multipart/form-data">
      <fieldset>
        <!-- Ecran  -->
        <legend>Saisie des infos écran</legend>

        <!-- Marque  -->
        <div class="control-group">
          <label class="control-label" for="input01">01 | Marque</label>
          <div class="controls">
            <select class="span5" name="marque_01">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeMarques"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeMarques"][$i] .'">'. $_SESSION["listeMarques"][$i] .'</option>';
              }
              ?>
              </select>
          </div>
        </div>

        <!-- Modele  -->
        <div class="control-group">
          <label class="control-label" for="input02">02 | Modèle</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="le modèle" id="input02" name="modele_02" value="xxxx">
          </div>
        </div>

        <!-- prix  -->
        <div class="control-group">
          <label class="control-label" for="input03">03 | Prix</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 129,99" name="prix_03">
              <span class="add-on">€</span>
            </div>
          </div>
        </div>

        <!-- titre  -->
        <div class="control-group">
          <label class="control-label" for="input04">04 | Titre</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="la ref vendeur" id="input05" name="titre_04">
          </div>
        </div>

        <!-- ref_fabriquant  -->
        <div class="control-group">
          <label class="control-label" for="input05">05 | Ref_fabriquant</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="la ref fabriquant" id="input04" name="ref_fabriquant_05">
          </div>
        </div>

        <!-- ref_vendeur  -->
        <div class="control-group">
          <label class="control-label" for="input06">06 | Ref_vendeur</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="la ref vendeur" id="input05" name="ref_vendeur_06">
          </div>
        </div>

        <!-- slogan  -->
        <div class="control-group">
          <label class="control-label" for="input07">07 | Slogan</label>
            <div class="controls">
              <textarea rows="3" id="textarea1" class="input-xxlarge ckeditor" placeholder="xxxxxx" name="slogan_07"></textarea>
            </div>
        </div>

        <!-- résumé  -->
        <div class="control-group">
          <label class="control-label" for="input08">08 | Résumé</label>
            <div class="controls">
              <textarea rows="10" id="textarea2" class="input-xxlarge ckeditor" placeholder="xxxxxx" name="resume_08"></textarea>
            </div>
        </div>

        <!-- disponibilite  -->
        <div class="control-group">
          <label class="control-label" for="input09">09 | Disponibilite</label>
          <div class="controls">
            <select class="span5" name="disponibilite_09">
                <option value="1" selected="selected">En stock</option>
                <option value="0">Epuisé</option>
                <option value="2">Hors catalogue</option>
              </select>
          </div>
        </div>

        <!-- taille_ecran  -->
        <div class="control-group">
          <label class="control-label" for="input10">10 | Taille écran</label>
          <div class="controls">
            <select class="span5" name="taille_10">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeTailles"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeTailles"][$i] .'">'. $_SESSION["listeTailles"][$i] .'</option>';
              }
              ?>
              </select>
          </div>
        </div>

        <!-- format  -->
        <div class="control-group">
          <label class="control-label" for="input11">11 | Format</label>
          <div class="controls">
            <select class="span5" name="format_11">
                <option value="-" selected="selected">-</option>
                <option value="16/9">16/9</option>
                <option value="16/10">16/10</option>
                <option value="4/3">4/3</option>
              </select>
          </div>
        </div>

        <!-- techno_ecran  -->
        <div class="control-group">
          <label class="control-label" for="input12">12 | Techno écran</label>
          <div class="controls">
            <select class="span5" name="techno_12">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeTechnos"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeTechnos"][$i] .'">'. $_SESSION["listeTechnos"][$i] .'</option>';
              }
              ?>
              </select>
          </div>
        </div>

        <!-- resolution  -->
        <div class="control-group">
          <label class="control-label" for="input13">13 | Résolution</label>
          <div class="controls">
            <select class="span5" name="resolution_13">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeResolutions"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeResolutions"][$i] .'">'. $_SESSION["listeResolutions"][$i] .'</option>';
              }
              ?>
              </select>
          </div>
        </div>

        <!-- techno_3D  -->
        <div class="control-group">
          <label class="control-label" for="input14">14 | Techno_3D</label>
          <div class="controls">
            <select class="span5" name="techno3D_14">
                <option value="0" selected="selected">non</option>
                <option value="1">oui</option>
              </select>
          </div>
        </div>

        <!-- techno_tactile  -->
        <div class="control-group">
          <label class="control-label" for="input15">15 | Techno_tactile</label>
          <div class="controls">
            <select class="span5" name="techno_tactile_15">
                <option value="0" selected="selected">non</option>
                <option value="1">oui</option>
              </select>
          </div>
        </div>

        <!-- reglage  -->
        <div class="control-group">
          <label class="control-label" for="input16">16 | Réglage</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="oui / non / autre" id="input14" name="reglage_16">
          </div>
        </div>

        <!-- aspect_dalle  -->
        <div class="control-group">
          <label class="control-label" for="input17">17 | Aspect de la dalle</label>
          <div class="controls">
            <select class="span5" name="aspect_dalle_17">
                <option value="-" selected="selected">-</option>
                <option value="Dalle mate">Dalle mate</option>
                <option value="Dalle brillante">Dalle brillante</option>
              </select>
          </div>
        </div>

        <!-- contraste  -->
        <div class="control-group">
          <label class="control-label" for="input18">18 | Contraste</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="ex. 50000:1" id="input14" name="contraste_18">
          </div>
        </div>

        <!-- luminosite  -->
        <div class="control-group">
          <label class="control-label" for="input19">19 | Luminosité</label>
          <div class="controls">
            <div class="input-append">
            <select class="span5" name="luminosite_19">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeLuminosites"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeLuminosites"][$i] .'">'. $_SESSION["listeLuminosites"][$i] .'</option>';
              }
              ?>
              </select>
              <span class="add-on">cd/m2</span>
            </div>
          </div>
        </div>

        <!-- temps_response  -->
        <div class="control-group">
          <label class="control-label" for="input20">20 | Temps de réponse</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 5" name="temps_reponse_20">
              <span class="add-on">ms</span>
            </div>
          </div>
        </div>

        <!-- angle_vision  -->
        <div class="control-group">
          <label class="control-label" for="input21">21 | Angle de vision</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="ex. 160° (horizontal) / 160° (vertical)" id="input01" name="angle_21">
          </div>
        </div>

        <!-- pas_de_masque  -->
        <div class="control-group">
          <label class="control-label" for="input22">22 | Pas de masque</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="ex. 160° (horizontal) / 160° (vertical)" id="input01" name="pas_de_masque_22">
          </div>
        </div>

        <!-- rafraichissement  -->
        <div class="control-group">
          <label class="control-label" for="input23">23 | Rafraichissement</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 75" name="rafraichissement_23">
              <span class="add-on">Hz</span>
            </div>
          </div>
        </div>

        <!-- connexion video  -->
        <div class="control-group">
          <label class="control-label" for="input24">24 | Connectiques</label>
          <div class="controls">
            <select class="span3" id="multiSelect" multiple="multiple" name="connectique_24[]">
              <?php 
              for ($i=0; $i < sizeof($_SESSION["listeConnectiques"]); $i++)
              {
                echo '<option value="'. $_SESSION["listeConnectiques"][$i] .'">'. $_SESSION["listeConnectiques"][$i] .'</option>';
              }
              ?>
              </select>
          </div>
        </div>

        <!-- haut_parleurs  -->
        <div class="control-group">
          <label class="control-label" for="input25">25 | Haut parleurs</label>
          <div class="controls">
            <select class="span5" name="haut_parleurs_25">
                <option value="0" selected="selected">non</option>
                <option value="1">oui</option>
              </select>
          </div>
        </div>

        <!-- couleur_dominante  -->
        <div class="control-group">
          <label class="control-label" for="input26">26 | Couleur dominante</label>
          <div class="controls">
            <input type="text" class="input-xlarge" placeholder="ex. Noir" id="input01" name="couleur_26">
          </div>
        </div>

        <!-- conso_marche  -->
        <div class="control-group">
          <label class="control-label" for="input27">27 | Conso en marche</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 15" name="conso_marche_27">
              <span class="add-on">watts</span>
            </div>
          </div>
        </div>

        <!-- conso_veille  -->
        <div class="control-group">
          <label class="control-label" for="input28">28 | Conso en veille</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 0,50" name="conso_veille_28">
              <span class="add-on">watts</span>
            </div>
          </div>
        </div>

        <!-- poids  -->
        <div class="control-group">
          <label class="control-label" for="input29">29 | Poids</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 2,80" name="poids_29">
              <span class="add-on">kg</span>
            </div>
          </div>
        </div>
 
        <!-- dimensions  -->
        <div class="control-group">
          <label class="control-label" for="input30">30 | Dimensions</label>
          <div class="controls">
            <div class="input-append">
              <input id="appendedInput" class="input-xlarge" type="text" size="16" placeholder="ex. 33.3 x 44.4 x 16" name="dimensions_30">
              <span class="add-on">cm</span>
            </div>
          </div>
        </div>

        <!-- description  -->
        <div class="control-group">
          <label class="control-label" for="input31">31 | Description</label>
            <div class="controls">
              <textarea rows="10" id="textarea3" class="input-xxlarge ckeditor" placeholder="xxxxxx" name="description_31"></textarea>
            </div>
        </div>

        <!-- Image 1  -->
        <div class="control-group">
          <label class="control-label" for="input32">32 | Image 1</label>
          <div class="controls">
            <input type="file" class="input-xlarge" placeholder="image 1" id="input_img01" name="img_01">
          </div>
        </div>

        <!-- Image 2  -->
        <div class="control-group">
          <label class="control-label" for="input33">33 | Image 2</label>
          <div class="controls">
            <input type="file" class="input-xlarge" placeholder="image 2" id="input_img02" name="img_02">
          </div>
        </div>

        <!-- Image 3  -->
        <div class="control-group">
          <label class="control-label" for="input34">34 | Image 3</label>
          <div class="controls">
            <input type="file" class="input-xlarge" placeholder="image 3" id="input_img03" name="img_03">
          </div>
        </div>

      </fieldset>

        <!-- boutons de validation  -->
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Valider</button>
            <button class="btn">Annuler</button>
          </div>

    </form>

    </div> <!-- Fin span9  -->  

</div><!-- /row1 -->

   