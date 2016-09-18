 <?php
/*
  * 11/05/2012 Auteur: François Labastie
  * vues/footer.php
*/
?>

<footer>

    <div class="row">

        <div class="span12">

            <div class="pull-right">

                <form class="well form-inline" action="index.php" method="post">
                    <input type="text" class="input-small" placeholder="Email" name="login">
                    <input type="password" class="input-small" placeholder="Password" name="pass">
                    <button type="submit" class="btn">Se connecter</button>
                </form>

            </div>

        </div>

    </div>

</footer>



    <!-- Le javascript ================================================== -->


    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>

    <script src="assets/js/bootstrap-dropdown.js"></script>

    <script src="assets/js/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="assets/js/jquery.tablesorter.js"></script>

    <script type="text/javascript">$('.dropdown-toggle').dropdown();</script>
    <script type="text/javascript">$(".collapse").collapse()</script>

    <script src="assets/js/verif_checkbox.js"></script>

    <script type="text/javascript">
      $(function(){ 
        $("#myTable").tablesorter(); 
      });
    </script>