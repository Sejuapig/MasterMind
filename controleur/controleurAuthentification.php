<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/bd.php";
class ControleurAuthentification{

private $vue;
private $bd;


function __construct(){
	$this->vue=new Vue();
	$this->bd=new bd();
}

/*
fonction qui permet de générer la vue de connexion

*/
function genereVueConnexion($dejaEssayé){
	$this->vue->genereVueConnexion($dejaEssayé);
}

/*
fonction qui permet de verifier le pseudo mdp avec le mdp de la base
@param $pseudo le pseudo à vérifier 
*/
function verificationPseudo($pseudo){
$mdpBD = $this->bd->getMdp($_POST['pseudo']);
	if(crypt($_POST['pwd'], $mdpBD)	== $mdpBD)
	{
		$_SESSION['authentification'] = TRUE;
		$_SESSION['pseudoJoueur'] = $pseudo;
		$this->authentificationReussie();
	}
	else
	{
		session_unset('pseudoJoueur');
		$this->vue->genereVueConnexion(TRUE);
	}
}

function authentificationReussie(){
$tab = array('black', 'red', 'yellow', 'red');
$tabVerif = array('black', 'white');
$this->vue->genereVueJeu($tab, $tabVerif);

}

}
