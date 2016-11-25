<?php
require_once "controleur/routeur.php";
require_once "vue/vue.php";


session_start();
$routeur=new Routeur();
$routeur->routerRequete();
?>
