<?php
/*
 *   24/05/2012 Auteur: François Labastie
 *   Class Login
 *   Gestion de l'authentification
 */


class Login
{

	private static $login;
	private static $pass;
	private static $role;
	private static $resultatAdmin;


	/*
	 *    	Fonction firstLogin()
	 *    	Vérifie si utilisateur autorisé à se logger
	 *    	paramètres : $connexion, $_login, $_pass
	 * 		Retourne 1 si autorisé sinon 0
	 */

	static function firstLogin($connexion, $_login, $_pass)
	{
			self::$login = $_login;
			self::$pass = $_pass;
			self::$role = NULL;

	    try
	    {
	    	// Recherche de login et pass correspondants aux paramètres
        	$stmt = $connexion->prepare("SELECT ID FROM labastieecrans.Utilisateur WHERE login= ? AND pass= ?");

        	$stmt->bindParam(1, self::$login);
        	$stmt->bindParam(2, self::$pass);
        	$stmt->execute();

        	$resultat = $stmt->rowCount();

	        // echo $stmt->rowCount();
	    }
	    catch (Exception $e)
	    {
	          echo ' Erreur : '.$e->getMessage(); 
	          echo ' Numero : '.$e->getCode();
	          die();
	    }

	    return $resultat;

	}

	/*
	 *    	Fonction isLogged()
	 *   	Vérifie si utilisateur est déjà loggé
	 * 		paramètres : $connexion, $_login, $_pass
	 * 		Retourne 1 si loggé sinon 0
	 */

	static function isLogged($connexion)
  	{

	    if( (isset($_SESSION['Auth'])) && (isset($_SESSION['Auth']['login'])) && (isset($_SESSION['Auth']['pass'])) )
	    {

	      	extract($_SESSION['Auth']);

	      	try
	      	{
	          	$stmt = $connexion->prepare("SELECT ID FROM labastieecrans.Utilisateur WHERE login= ? AND pass= ?");
	          	$stmt->bindParam(1, $login);
	          	$stmt->bindParam(2, $pass);
	          	$stmt->execute();
	          	// réception comme objet
	          	$stmt->setFetchMode(PDO::FETCH_OBJ); 
	      	}

	      	catch (Exception $e)
	      	{
	          	echo ' Erreur : '.$e->getMessage(); 
	          	echo ' Numero : '.$e->getCode();
	          	die();
	      	}

	      	if($stmt->rowCount() > 0) 
	      	{
	        	return true;
	      	}

	    }

	    else
	    {
	      return false;
	    }

  	}

  	/*
	 *    	Fonction isAdmin()
	 *   	Vérifie si utilisateur est admin
	 * 		paramètres : $connexion, $_login, $_pass
	 * 		Retourne 1 si admin sinon 0
	 */

  	static function isAdmin($connexion)
  	{

  		if( (isset($_SESSION['Auth'])) && (isset($_SESSION['Auth']['login'])) && (isset($_SESSION['Auth']['pass'])) )
	    {

	      	extract($_SESSION['Auth']);

  			self::$login = $_SESSION['Auth']['login'];
			self::$pass = $_SESSION['Auth']['pass'];
		//	self::$role = NULL;
			self::$resultatAdmin = 0;

  			try
	      	{
	          	$stmt = $connexion->prepare("SELECT role AS role FROM labastieecrans.Utilisateur WHERE login= ? AND pass= ?");
	          	$stmt->bindParam(1, self::$login);
	          	$stmt->bindParam(2, self::$pass);
	          	$stmt->execute();
	          	// réception comme objet
	          	$stmt->setFetchMode(PDO::FETCH_OBJ); 

	          	$ligne = $stmt->fetch();
	          	self::$role = $ligne->role;
	          	self::$resultatAdmin = !(strcmp ( self::$role , 'admin' ));
	          	//print_r($ligne);
	      	}

	      	catch (Exception $e)
	      	{
	          	echo ' Erreur : '.$e->getMessage(); 
	          	echo ' Numero : '.$e->getCode();
	          	die();
	      	}

	    }

	    return self::$resultatAdmin;

  	}

  	   /*
       *   Fonction afficheInserer()
       */

      static public function afficheInserer() {

            return  '<li><a href="index.php?page=saisie_produit"> Insérer</a></li>
                  <li><a href="index.php?page=logout"> Déconnexion</a></li>';
      }

      /*
       *   Fonction afficheModifier()
       */

      static public function afficheModifier($_id) {

      	$id = $_id;

            return  '<li><a href="index.php?page=update_produit&idproduit='.$id.'"> Modifier</a></li>
                  <li><a href="index.php?page=logout"> Déconnexion</a></li>';
      }



}
?>
