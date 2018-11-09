<?php require_once("../ressources/phpFunctions/globalFunctions.php"); ?>
<!-- Ici va se trouver la fonction qui va setup le document web + appeler les différents styles et pour finir, la navbar.-->
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <!--TODO : permettre à l'utilisateur de choisir le titre du document (si aucun choix : titre=nom du doc)-->
    <title>Travail dans le Workspace</title>

    <!-- Tant qu'on est dans un Workspace, pas besoin de ces balises...
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    -->

    <!--Déclaration des différents style css presents dans "../ressources/css"-->
    <!--Ajout manuel de Bootstrap. une base css.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--Ajout manuel de Google Icons. https://material.io/tools/icons/ -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
    $dir = "../ressources/css";
    //  si le dossier pointe existe
    if (is_dir($dir)) {
  
      // si il contient quelque chose
      if ($dh = opendir($dir)) {
  
        // boucler tant que quelque chose est trouve
        while (($style = readdir($dh)) !== false) {
          if ($style != "." && $style != "..")
          {
            echo("<link href='$dir/$style' rel='stylesheet'>");
          }
        }
        // on ferme la connection
        closedir($dh);
      }
    }
    ?>
    <!--Pour le gestionnaire de TP, on a pas besoin de navbar, si on en met une, c'est avec un require_once directement dans le TP qui en a besoin.-->
</head>
<body>
  <?php 
    getErreurPHP();
    getMessageConsole();
  ?>
<!--Fin de la fonction start.php-->