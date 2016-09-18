<?php
/*
  * 28/05/2012 Auteur: François Labastie
  * vue/panier.php
*/
?>

<div class="row">

    <div class="span12">

        <?php

        if ($qteproduit == 0)
        {
            echo '<div class="hero-unit">';
            echo '<h2>Votre panier est vide. </h2>' ;
            echo ' 
            <div class="subnav">
                <ul class="nav nav-pills">
                    <li class="active pull-right"><a href="index.php?page=liste_produit"><i class="icon-shopping-cart icon-white"></i> Continuer vos achats</a></li>
                    <li class="divider-vertical nav pull-right">&nbsp;&nbsp;</li>
                <ul>
            </div>';
            echo '</div>';
        }

        else
        {
            echo '<table class="table well panier">';
            
            echo    '<thead>
                        <tr>
                            <th colspan="2"><h4>Produit</h4></th>
                            <th colspan="2"><h4>Quantit&eacute;</h4></th>
                            <th colspan="2"><h4>Prix</h4></th>
                            <th colspan="2"><h4>Sous Total</h4></th>
                            <th colspan="2"><h4>Supprimer</h4></th>
                        </tr>
                    </thead> ';

                echo ' <tbody> ';

                $total_commande = 0;

                for( $j=0; $j< sizeof( $_SESSION['panier']['idproduit'] ) ; $j++ )
                {

                    // création objet detailProduit
                    $detailProduit = new produitDetail();

                    // récupération des infos produit
                    $detailProduit->getDetailProduit($connexion, $_SESSION['panier']['idproduit'][$j]);

                    $idproduit = $_SESSION['panier']['idproduit'][$j];
                    $marque = $detailProduit->getInfo("marque");
                    $modele = $detailProduit->getInfo("modele");
                    $quantite = $_SESSION['panier']['qteproduit'][$j];
                    $prix = $_SESSION['panier']['prixproduit'][$j];
                    $sous_total = $quantite * $prix;
                    $total_commande = $total_commande + $sous_total;

                    echo '<tr>';
                        echo '<td colspan="2"><a href="index.php?page=detail_produit&idproduit='.$idproduit.'">' . $marque . ' | ' . $modele . '</a></td>';
                        echo '  <td colspan="2"><span class="label label-info quantite">'. $quantite .' </span>
                                <a class="btn" href="index.php?page=panier&moinsproduit='.$idproduit.'">-</a>
                                <a class="btn" href="index.php?page=panier&plusproduit='.$idproduit.'">+</a> ' ;
                        echo '<td colspan="2">'. $prix .' € </td>';
                        echo '<td colspan="2">'. $sous_total .' € </td>';
                        echo '<td><a class="btn" href="index.php?page=panier&supproduit='.$idproduit.'">Supprimer</a></td>';
                    echo '</tr>  ';
                }

                echo '<tr>';
                    echo '<td colspan="10"><h3> TOTAL COMMANDE :  '. $total_commande .' € </h3></td>';
                echo '</tr>';

                echo '</tbody>';

            echo '</table>';

            echo ' 
            <div class="subnav">
                <ul class="nav nav-pills">
                    <li class="active pull-right"><a href="index.php?page=liste_produit"><i class="icon-shopping-cart icon-white"></i> Continuer vos achats</a></li>
                    <li class="divider-vertical nav pull-right">&nbsp;&nbsp;</li>
                    <li class="active pull-right"><a href="index.php?page=inscription_client"><i class="icon-thumbs-up icon-white"></i> Passer la commande</a></li>   
                <ul>
            </div>';

        }

        ?>
               
            </div>

    </div>

</div>


