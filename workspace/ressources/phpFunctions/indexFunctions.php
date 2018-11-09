<?php
//Déclaration de la plupart des fonctions

//fonction qui va récupérer les TPs
function getTP()
{
    //Ouverture du CSV et définition de la méthode d'éxploitation.
    $csv = new SplFileObject("../ressources/TPs.csv");
    $csv->setFlags(SplFileObject::READ_CSV);
    $csv->setCsvControl(';');
    
    foreach($csv as $ligne)
    {
        foreach($ligne as $tp)
        {
            if($tp != NULL)
            {
                $lesTPs[] = $tp;
            }
        }
    }
    if(isset($lesTPs))
    {
        return($lesTPs);
    }
    
}
//fonction qui va afficher les TPs
function afficherTP()
{
    $lesTPs = getTP();
    if(isset($lesTPs))
    {
        echo("<p class='title'>Affichage des TP :</p>");
        foreach($lesTPs as $unTP)
        {
            echo('<p class="subtitle tp"><a href="./'.$unTP.'.php">'.$unTP.'</a></p>');
        }
    }
    else
    {
        echo("<p class='subtitle'>Oups, il semblerait qu'il n'y ait aucun Tp à afficher...</p>");
    }
}
function newtp()
{
    //premièrement : on va créer le formulaire à remplir(normalement, imotep, je peut l'afficher)
    if(!empty($_POST))
    {
        if(isset($_POST["nomTP"]))
        {
            $nom = $_POST["nomTP"];
            if(isset($_POST["titreTP"]))
            {
                $titre = $_POST["titreTP"];
            }
            else
            {
                $titre = $nom;
            }
            //Continuer le code avec la création du TP.
            setMessageConsole("classique","//Continuer le code avec la création du TP.");
        }
        else
        {
            setMessageConsole("classique", "Le TP n'a pas de nom, il est donc impossible de le créer.");
        }
    }
    else
    {
        ?>
        <!--
        <h1 class='centered'>FORMULAIRE DE CRÉATION DE TP</h1>
        <form action='../ressources/phpFunctions/indexFunctions.php?func=newtp method="POST"'>
            <label>Nom du formulaire :</label><br/>
            <input type='text' name='nomTP' placeholder='TPPHP1_Declarations_des_variables'><br/>
            <input type='text' name='titreTP' placeholder='TP1 : Les variables !'><br/>
        </form>
        -->
        <?php
        $form = ("
        <h1 class='centered'>FORMULAIRE DE CRÉATION DE TP</h1>
        <form action='./index.php?function=newtp' method=".'POST'.">
            <p>Nom du formulaire :</p>
            <p><input type='text' name='nomTP' placeholder='TPPHP1_Declarations_des_variables'></p>
            <p>Titre de la page :</p>
            <p><input type='text' name='titreTP' placeholder='TP1 : Les variables !'></p>
            <br/>
            <p><input type='submit' value='Valider'class='button'></p>
        </form>");
        setMessageConsole("classique",$form);
    }
}
?>

<?php
//la fonction qui va appeler toutes les autres
function selectFunc()
{
    if(!empty($_GET))
    {
        $fonction = $_GET["function"];
        switch ($fonction) {
            case 'newtp':
                newtp();
                break;
            
            default:
                setErreurPHP("Fonction : <b>$fonction</b> introuvable (selectFunc)");
                break;
        }
    }
}
?>

<?php
//Voici le core du document
selectFunc();
?>