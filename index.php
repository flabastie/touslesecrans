<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * index.php
  * page FrontController
*/

// ouverture session
session_start();
 
// connexion BDD
include 'connexion/connect.php'; 

// inclusion de la classe login
include(dirname(__FILE__).'/includes/login.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tous les Ecrans</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- styles css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-32783007-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>

    </head>

    <!-- page ==================================================================================================== -->
    <body>

      <div class="container">

        <?php

        $resultatLogin = 0;
        $isLogged = Login::isLogged($connexion);
        $isAdmin = 0;
        $menuAdmin = NULL;


          // Vérification du formulaire de login
          if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass']))
          {
              extract($_POST);
              $pass = sha1($pass);
              $resultatLogin = Login::firstLogin($connexion, $login, $pass);
        
              if ($resultatLogin > 0) 
              {
                      $_SESSION['Auth'] = array( 'login' => $login, 'pass' => $pass );
                      $isLogged = Login::isLogged($connexion);
                      $isAdmin = Login::isAdmin($connexion);
              }

          }
          // print_r($_SESSION['Auth']);

          // -- header ===================================================================================================
        	include 'controleurs/header.php'; 

          // Test si tentative de connexion échouée
          if (isset($_POST['login']) && isset($_POST['pass']) && !isset($_SESSION['Auth']) )
          {
            // Redirection
            include(dirname(__FILE__).'/vues/nologin.php');
          }
          else if ($resultatLogin > 0)
          {
            include(dirname(__FILE__).'/vues/oklogin.php');
          }

          else
          {
          	// inclusion du controleur si spécifié en paramètre dans l'url
          	if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
          	{
                include 'controleurs/'.$_GET['page'].'.php';
          	}
          	else
          	{
                include 'controleurs/liste_produit.php';
          	}

          }

      // footer ===================================================================================================
     include 'controleurs/footer.php';

     ?>

     </div> <!-- /container -->

    </body>
</html>

<?php $connexion = NULL ?>
