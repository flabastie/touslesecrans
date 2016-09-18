<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * image.class.php
*/


class Img
{

	   /*
       *    Fonction creerMin()
       *    Fabrique la miniature d'une image téléchargée
       *    paramètre : image, chemin, nom, dimensions
       */

	static function creerMin($img,$chemin,$nom,$mlargeur=100,$mhauteur=100)
	{
		// On supprime l'extension du nom
		$nom = substr($nom,0,-4);
		// On récupère les dimensions de l'image
		$dimension=getimagesize($img);
		// On cré une image à partir du fichier récup
		if(substr(strtolower($img),-4)==".jpg"){$image = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img),-4)==".png"){$image = imagecreatefrompng($img); }
		else if(substr(strtolower($img),-4)==".gif"){$image = imagecreatefromgif($img); }
		// L'image ne peut etre redimensionne
		else{return false; }
		
		// Création des miniatures
		// On cré une image vide de la largeur et hauteur voulue
		$miniature =imagecreatetruecolor ($mlargeur,$mhauteur); 
		// On va gérer la position et le redimensionnement de la grande image
		if($dimension[0]>($mlargeur/$mhauteur)*$dimension[1] ){ $dimY=$mhauteur; $dimX=$mhauteur*$dimension[0]/$dimension[1]; $decalX=-($dimX-$mlargeur)/2; $decalY=0;}
		if($dimension[0]<($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mlargeur*$dimension[1]/$dimension[0]; $decalY=-($dimY-$mhauteur)/2; $decalX=0;}
		if($dimension[0]==($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mhauteur; $decalX=0; $decalY=0;}
		// on modifie l'image crée en y plaçant la grande image redimensionné et décalée
		imagecopyresampled($miniature,$image,$decalX,$decalY,0,0,$dimX,$dimY,$dimension[0],$dimension[1]);
		// On sauvegarde le tout
		imagejpeg($miniature,$chemin."/".$nom.".jpg",90);
		return true;
	}

      /*
       *    Fonction afficheImage()
       *    recherche et affiche une image
       *    paramètre : ID du produit et numéro image : '01', '02' ou '03' (string)
       */

      static function afficheImage($connexion, $_idProduit, $_num)
      {
        $idProduit = (string) $_idProduit;
        $num = $_num;
        $nomFichier = '';
        $resultat = 0;

        // Nom à rechercher 
        $nomRecherche = $idProduit."_.".$num;

        // Recheche
        $folder = "images";
        $dossier = opendir($folder);
        while ($Fichier = readdir($dossier)) 
        {
            if ($Fichier != "." && $Fichier != "..") 
            {
                $cheminEtFichier = $folder."/".$Fichier;
                $nomFichier = $Fichier;
                $nomSansExt = substr($nomFichier, 0, -4);
                //echo $cheminEtFichier."<BR>";
                // $numeroFichier = intval($nomFichier); 

                if(!strcmp ( $nomSansExt , $idProduit."_".$num))
                {
                  echo '<img alt="produit_'.$nomSansExt.'" src='.$cheminEtFichier.'>';
                  $resultat = 1;
                }
            }

        }
        // si rien trouvé alors affichage d'image neutre
        if ($resultat == 0)
        {
          echo '<img alt="" src="http://placehold.it/360x268">';
        }

        closedir($dossier);

      }




}

?>
