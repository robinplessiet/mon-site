<?php
session_start();
ini_set('display_errors','off');
require_once 'config/bdd.inc.php'; //chargement du fichier de connection a la base de données
include_once 'include/header.inc.php';
require_once 'config/connexion.inc.php';

//***SMARTY****//
require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('template/');
//if $statut=FALSE

if (isset($_POST['envoyer'])) { //envoyé et posté je traite les données
    $titre = addcslashes($_POST['titre'], "'%_"); //sécurisation des variables
    $texte = addcslashes($_POST['texte'], "'%_"); // print_r($_post)
    $publie = (!empty($_POST['publie']) ? $_POST['publie'] : 0); //définition de la valeur publie

    $date = date("Y-m-d"); //date du systeme

    $req_insertion = "INSERT INTO articles (titre, texte, date, publie) VALUES ('$titre', '$texte', '$date', $publie) ";
    //echo $req_insertion;

    $erreur_image = $_FILES['image']['error'];

    if ($erreur_image != 0) {//boucle si l'image ne renvoie pas 0 alors afficher une erreur, sinom on continue le traitement
        $_SESSION['msg_error'] = "Une erreur est survenue";
        header("location: article.php");
    } else {

        mysql_query($req_insertion); //execution de la requete

        $id_article = mysql_insert_id(); //définition de l'article

        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id_article.jpg"); //deplacement et renomage de l'image

        $_SESSION['msg_reussi'] = "Insertion de l'article OK"; //affichage du resultat
        header("location: index.php");
    }
} else {

    /* ----------------- HTML ------------------ */
    ?>

    <?php
    include_once 'include/header.inc.php';
    if (isset($_SESSION['msg_error'])) {
        ?><div class="alert alert-error" id="notif">
            <?php echo $_SESSION['msg_error']; ?></div><?php
        unset($_SESSION['msg_error']);
    }

    if (isset($_SESSION['msg_error'])) {

        $smarty->assign('msg_error', $_SESSION['msg_error']);
    }
    //$smarty->debugging = true;

    $smarty->display('article.tpl');

    include_once 'include/menu.inc.php';
    include_once 'include/footer.inc.php';
}
?>