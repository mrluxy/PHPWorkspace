<?php session_start() ?>
<?php
//Fonction qui affiche les message console : demande deux paramètres
//console(str 'type de message', str 'message')
function setMessageConsole($typeMessage, $message)
{
    $_SESSION["typeMessageConsole"] = $typeMessage;
    $_SESSION["messageConsole"] = $message;
    $url = explode("/", $_SERVER["PHP_SELF"]);
    $i = count($url)-1;
    echo("<META http-equiv='refresh' content='0; URL=".$url{$i}."'>");
}
function getMessageConsole()
{
    if(isset($_SESSION["typeMessageConsole"]) && isset($_SESSION["messageConsole"]))
    {
        $message = $_SESSION["messageConsole"];
        $typeMessage = $_SESSION["typeMessageConsole"];
        switch ($typeMessage) {

            //les differents messages

            case 'confirmation':
                echo("<div class='message $typeMessage'>");
                echo("<p>$message <a href='../ressources/phpFunctions/globalFunctions.php?messageConfirmation=true'>Oui </a><a href='#'>Non</a></p>");
                echo("</div>");
                break;
            
            case 'classique':
            echo("<div class='message $typeMessage'>");
            echo("<p>$message</p>");
            echo("</div>");
            break;

            default:
                setErreurPHP("TypeMessage : <b>$typeMessage</b> inconnu (getMessageConsole)");
                break;
        }
        unset($_SESSION["messageConsole"]);
        unset($_SESSION["typeMessageConsole"]);
    }
}
//Fonction qui affiche les erreurs PHP (si elles sont "traitées")
function setErreurPHP($erreur)
{
    $_SESSION["erreurPHP"] = $erreur;
    $url = explode("/", $_SERVER["PHP_SELF"]);
    $i = count($url)-1;
    echo("<META http-equiv='refresh' content='0; URL=".$url{$i}."'>");
}
function getErreurPHP()
{
    if(isset($_SESSION["erreurPHP"]))
    {
        $erreur = $_SESSION["erreurPHP"];
        echo("<div class='erreur PHP'><p>$erreur</p></div>");
        unset($_SESSION["erreurPHP"]);
    }
}
?>