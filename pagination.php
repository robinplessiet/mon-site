<?php
session_start();
require_once 'config/bdd.inc.php';
include_once 'include/header.inc.php';
require_once 'config/connexion.inc.php';

$comptage="SELECT COUNT(*) as nbart FROM articles WHERE publie = 1";
$requestcompt = mysql_query($comptage);

$resultcomptage = mysql_fetch_array($requestcompt);
$nbart = $resultcomptage['nbart'];
$nbartpage = 2;
$pagecourante = (isset($_GET['page']) ? $_GET['publie'] : 1);
$nbpage = ceil($nbart/$nbartpage);
$debut = (($pagecourante - 1) *$nbartpage);
$select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') as date_fr FROM `articles` WHERE 1 LIMIT $debut,$nbartpage ";

?>