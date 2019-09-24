<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');

// si la session est vide renvoyer sur la page de connection
if (empty($_SESSION['pseudo'])){
    header('Location: connection.html');
}
?>