<?php
/*
  * 11/05/2012 Auteur: François Labastie
  * vues/header.php
*/
?>


<header id="overview" class="jumbotron subhead">

    <div class="subnav">
        <ul class="nav nav-pills">

            <!-- Navigation du haut -->
            <li class="active">
                <a href="index.php?page=liste_produit">Accueil</a>
            </li>

            <li><a href="xml/rss.php"><img src="xml/feed-icon-14x14.png"></a></li>

            <li class="dropdown">
                <a class="dropdow-toggle" data-toggle="dropdown" href="index.php?page=liste_produit">
                    Infos
                    <b class="caret"> </b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="xml/catalogue_produit.php">Catalogue XML</a></li>
                    <li><a href="xml/lecatalogue.xml">Catalogue tableau</a></li>
                    <li><a href="index.php?page=yahoo_pipes">Autres infos</a></li>
                </ul>
            </li>
            
            <?php echo $menuAdmin; ?>

            <!-- Boutons Mon panier et Mon compte -->
            <li class="active pull-right"><a href="index.php?page=panier"><i class="icon-shopping-cart icon-white"></i> Mon panier</a></li>
            <li class="divider-vertical nav pull-right">&nbsp;&nbsp;</li>
            <li class="active pull-right"><a href="index.php?page=inscription_client"><i class="icon-user icon-white"></i> Mon compte</a></li>   
        <ul>

    </div>

    <!-- Header titre et slogan -->
    <div class="hero-unit">
        <h1><a class="brand" href="index.php?page=liste_produit">Tous les Ecrans</a></h1>
        <p>Bienvenue sur le site de tous les Ecrans</p>
    </div>

</header>

