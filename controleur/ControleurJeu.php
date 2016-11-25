<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/bd.php";
class ControleurJeu{

private $vue;
private $bd;


function __construct(){
	$this->vue=new Vue();
	$this->bd=new bd();
}

function getPionSelected(){
//$this->$jeu->majLignePion($_SESSION['pionJoueur']);
//$tab = $this->$jeu->getTab();
$tab = array('black', 'red', 'yellow', 'red');
$tabVerif = array('black', 'white');
$this->vue->genereVueJeu($tab, $tabVerif);
}

}
