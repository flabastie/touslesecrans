 <?php
/*
  * 11/05/2012 Auteur: François Labastie
  * vues/inscription_client.php
*/
?>


<script src="assets/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

    $(function() {
        $("#valider").click(function(){

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
               
            valid = true;
            if($("#nom").val() == ""){
                $("#nom").next(".erreur-message").fadeIn().text("Veuillez entrer votre nom");
                valid = false;
            }
            else
            {
                $("#nom").next(".erreur-message").fadeOut();
            }

            if($("#prenom").val() == ""){
                $("#prenom").next(".erreur-message").fadeIn().text("Veuillez entrer votre prenom");
                valid = false;
            }
            else
            {
                $("#prenom").next(".erreur-message").fadeOut();
            }

            if($("#adresse").val() == ""){
                $("#adresse").next(".erreur-message").fadeIn().text("Veuillez entrer votre adresse");
                valid = false;
            }
            else
            {
                $("#adresse").next(".erreur-message").fadeOut();
            }

            if($("#cp").val() == ""){
                $("#cp").next(".erreur-message").fadeIn().text("Veuillez entrer votre code postal");
                valid = false;
            }
            else
            {
                $("#cp").next(".erreur-message").fadeOut();
            }

            if($("#ville").val() == ""){
                $("#ville").next(".erreur-message").fadeIn().text("Veuillez entrer votre ville");
                valid = false;
            }
            else
            {
                $("#ville").next(".erreur-message").fadeOut();
            }

            if($("#pseudo").val() == ""){
                $("#pseudo").next(".erreur-message").fadeIn().text("Veuillez entrer votre pseudo");
                valid = false;
            }
            else
            {
                $("#pseudo").next(".erreur-message").fadeOut();
            }

            if($("#mdp").val() == ""){
                $("#mdp").next(".erreur-message").fadeIn().text("Veuillez entrer votre mot de passe");
                valid = false;
            }
            else
            {
                $("#mdp").next(".erreur-message").fadeOut();
            }

            if($("#cmdp").val() == ""){
                $("#cmdp").next(".erreur-message").fadeIn().text("Veuillez confirmer votre mot de passe");
                valid = false;
            }
            else
            {
                $("#cmdp").next(".erreur-message").fadeOut();
            }

            if($("#mail").val() == ""){
                $("#mail").next(".erreur-message").fadeIn().text("Veuillez entrer votre email");
                valid = false;
            }
            else if (!filter.test($("#mail").val()))
            {
                $("#mail").next(".erreur-message").fadeIn().text("Veuillez un email valide");
                valid = false;
            }
            else
            {
                $("#mail").next(".erreur-message").fadeOut();
            }

            return valid;
        });

    });


</script>


    <div class="row">

        <div class="span12">

                <form class="form-horizontal" action="index.php" method="post">

                  <legend>Déjà inscrit</legend>
                    <div class="control-group">
                      <label class="control-label">Identifiant</label>
                        <div class="controls">
                          <input type="text" class="input-small" placeholder="Email" name="login">
                        </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password</label>
                        <div class="controls">
                          <input type="password" class="input-small" placeholder="Password" name="pass">
                        </div>
                    </div>
                    <!-- bouton de validation  -->
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>

                </form>

        </div>
    </div>

<div class="row">

  <div class="span12">

    <form id="F_inscri" class="form-horizontal" method="post" action="index.php?page=identification_client" >
    
      <fieldset>
        <!-- Ecran  -->
        <legend>Nouveau client</legend>

        <!-- Nom  -->
        <div class="control-group">
          <label class="control-label">Nom</label>
          <div class="controls">
            <input type="text" class="input-xlarge" name="nom" id="nom">
            <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Prénom  -->
        <div class="control-group">
          <label class="control-label">Prénom</label>
          <div class="controls">
              <input class="input-xlarge" type="text" name="prenom" id="prenom">
              <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Adresse  -->
        <div class="control-group">
          <label class="control-label">Adresse</label>
            <div class="controls">
              <textarea rows="3" class="input-xlarge" name="adresse" id="adresse"></textarea>
              <span class="erreur-message">erreur</span>
            </div>
        </div>

        <!-- Code postal  -->
        <div class="control-group">
          <label class="control-label">Code postal</label>
          <div class="controls">
            <input type="text" class="input-xlarge" name="cp" id="cp">
            <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Ville  -->
        <div class="control-group">
          <label class="control-label">Ville</label>
          <div class="controls">
            <input type="text" class="input-xlarge" name="ville" id="ville">
            <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Pseudo  -->
        <div class="control-group">
          <label class="control-label">Pseudo</label>
          <div class="controls">
              <input class="input-xlarge" type="text" name="pseudo" id="pseudo">
              <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Mot de passe  -->
        <div class="control-group">
          <label class="control-label">Password</label>
          <div class="controls">
            <input type="text" class="input-xlarge" name="mdp" id="mdp">
            <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Confirmation du Mot de passe  -->
        <div class="control-group">
          <label class="control-label">Confirmation Password</label>
          <div class="controls">
              <input class="input-xlarge" type="text" name="cmdp" id="cmdp">
              <span class="erreur-message">erreur</span>
          </div>
        </div>

        <!-- Adresse email  -->
        <div class="control-group">
          <label class="control-label">Adresse email</label>
          <div class="controls">
              <input class="input-xlarge" type="text" name="mail" id="mail">
              <span class="erreur-message">erreur</span>
          </div>
        </div>

      </fieldset>

        <!-- boutons de validation  -->
          <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Valider" id="valider">
          </div>

    </form>

    </div> <!-- Fin span9  -->  

</div><!-- /row1 -->

   