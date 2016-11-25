<?php

require_once 'controleurAuthentification.php';
require_once 'ControleurJeu.php';



class Routeur {

	private $ctrlAuthentification;
	private $ctrlJeu;

 

	public function __construct() {
		$this->ctrlAuthentification = new ControleurAuthentification();
		$this->ctrlJeu = new ControleurJeu();
	}

	// Traite une requête entrante
 	public function routerRequete()
 	{
 		//si le formulaire de connexion est soumis
 		if(isset($_POST['soumettreAuthentification']) && !isset($_POST['pionJoueur']))
 		{
 			//on sauvegarde les variables
 			$_SESSION['soumettreAuthentification'] = $_POST['soumettreAuthentification'];
 			$_SESSION['authentification'] = FALSE;
 			$_SESSION['pseudo'] = $_POST['pseudo'];

 			//on verifie si le mot de passe lié au login est le bon
			$this->ctrlAuthentification->verificationPseudo($_SESSION['pseudo']);
		}

		//sinon si le formulaire de connexion n'est pas soumis 
		else if(!isset($_POST['soumettreAuthentification']) && !isset($_POST['pionJoueur']))
		{	
			//on détruit la variable 'soumettreAuthentification'
			session_unset('soumettreAuthentification');

			//on affiche la vue permettant l'authentification
			$this->ctrlAuthentification->genereVueConnexion(FALSE);
		}
		else if(isset($_POST['pionJoueur']))
		{
			$_SESSION['pionJoueur'] = $_POST['pionJoueur'];
			$this->ctrlJeu->getPionSelected($_POST['pionJoueur']);
		}


	}
}
	



?>
