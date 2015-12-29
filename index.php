<?php
session_start();
ini_set('display_errors','off');
require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
require_once 'config/connexion.inc.php';

//***SMARTY****//
require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('template/');

$comptage="SELECT COUNT(*) as nbart FROM articles WHERE publie = 1";
$requestcompt = mysql_query($comptage);

$resultcomptage = mysql_fetch_array($requestcompt);
$nbart = $resultcomptage['nbart'];
$nbartpage = 2;
$pagecourante = (isset($_GET['page']) ? $_GET['page'] : 1);
$nbpage = ceil($nbart/$nbartpage);
$debut = (($pagecourante - 1) *$nbartpage);

$select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM `articles` WHERE 1 LIMIT $debut,$nbartpage ";
$request = mysql_query($select_all_post); //on crée une variable dans laquelle on va pousser les elements de la requete sql


if (isset($_SESSION['msg_reussi'])) {
    ?><div class="alert alert-success" id="notif">
    <?php echo $_SESSION['msg_reussi']; ?></div><?php
        unset($_SESSION['msg_reussi']);
    }
   while ($result_request = mysql_fetch_array($request)) {
       $tableauArticleSmarty[] = $result_request;
   }
   //$smarty->debugging = true;
$smarty->assign('tableauArticleSmarty', $tableauArticleSmarty);
$smarty->assign('nbpage', $nbpage);
$smarty->display('index.tpl');   
    include_once 'include/menu.inc.php'; 
    include_once 'include/footer.inc.php';
  
    ?>

