<?php

$statut = FALSE;    //Creer une variable initialisée à FALSE
if (isset($_COOKIE['sid'])) {// tester la présence de $_COOKIE
    $sid = $_COOKIE['sid'];
    $select_statut = "SELECT * FROM connexion WHERE sid = '$sid'"; //attribuer la valeur de sid à une variable

    $request_statut = mysql_query($select_statut);
    $tableau_statut = mysql_fetch_array($request_statut);
//Vérification en bdd de la présence de la valeur
    if ($tableau_statut) {

        $statut = TRUE; //si on a un résultat, on modifie la valeur de la variable de connexion pour lu donner la valeur TRUE
    }
}
?>
