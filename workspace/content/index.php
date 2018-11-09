<!--Ici se trouvera le gestionnaire de TP permettant entre autre de : créer, lister, renommer et supprimer un TP.-->
<!--Mise en place de la page grâce au templating-->
<?php require_once("../template/start.php"); ?>
<?php require_once("../ressources/phpFunctions/indexFunctions.php"); ?>

<p class="title centered">Bienvenue dans le Workspace</p>
<p class="subtitle centered"><a href="./index.php?function=newtp">Créer un nouveau TP</a></p>

<?php afficherTP()?>


<?php require_once("../template/end.php"); ?>
<!-- Fin du document -->