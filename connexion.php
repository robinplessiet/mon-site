<?php
session_start();
ini_set('display_errors', 'off');
require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
require_once 'config/connexion.inc.php';

//***SMARTY****//
require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('template/');

if (isset($_POST['connexion'])) {
    $email = addcslashes($_POST['email'], "'%_");
    $mdp = addcslashes($_POST['mdp'], "'%_");
    $select_id = "SELECT * FROM connexion WHERE email = '$email' AND mdp = '$mdp'";
//echo $select_id;
    $request_connexion = mysql_query($select_id);
    $tableau = mysql_fetch_array($request_connexion);

    if ($tableau) {
        $sid = md5($email . time());
        $update = 'UPDATE connexion SET sid="valeur" WHERE id="$id" ';
        //execution de la requete
        setcookie('sid', "$sid", time() + (30 * 60)); //en seconde

        $_SESSION['msg_reussi'] = "connexion réussi"; //Mse en session du message de confirmation
        header("location: index.php"); //Redirection vers l'accueil
    } else {
        $_SESSION['msg_error'] = "Accés refusé !";
        header("location: connexion.php");
    }
} else {


    include_once 'include/header.inc.php';
    if (isset($_SESSION['msg_error'])) {
        ?><div class="alert alert-error" id="notif">
        <?php echo $_SESSION['msg_error']; ?></div><?php
            unset($_SESSION['msg_error']);
        }

        if (isset($_SESSION['connexion'])) {

            $smarty->assign('connexion', $_SESSION['connexion']);
        }
//$smarty->debugging = true;

        $smarty->display('connexion.tpl');


        include_once 'include/menu.inc.php';
        include_once 'include/footer.inc.php';
    }
    ?>