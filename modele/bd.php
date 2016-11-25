<?php
// Classe generale de definition d'exception
class MonException extends Exception{
	private $chaine;
	public function __construct($chaine){
	$this->chaine=$chaine;
	}

	public function afficher(){
	return $this->chaine;
	}

}


// Exception relative à un probleme de connexion
class ConnexionException extends MonException{
}

// Exception relative à un probleme d'accès à une table
class TableAccesException extends MonException{
}


// Classe qui gère les accès à la base de données

class Bd{
private $connexion;

// Constructeur de la classe
// remplacer X par les informations qui vous concernent

	public function __construct(){
	 try{
		$chaine="mysql:host=localhost;dbname=E145725X";
		$this->connexion = new PDO($chaine,"E145725X","E145725X");
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 }
	catch(PDOException $e){
		$exception=new ConnexionException("problème de connection à la base");
		throw $exception;
	}
	}




// A développer
// méthode qui permet de se deconnecter de la base
public function deconnexion(){
	 $this->connexion=null;
}


//A développer
// utiliser une requête classique
// méthode qui permet de récupérer les pseudos dans la table pseudo
// post-condition:
//retourne un tableau à une dimension qui contient les pseudos.
// si un problème est rencontré, une exception de type TableAccesException est levée

public function getAllPseudos(){
	try{
		$requete = "select * from pseudonyme;";
		$statement = $this->connexion->query($requete);
		$tabResult = $statement->fetchAll();
		foreach($tabResult as $row)
		{
		$pseudo[] = $row['pseudo'];
		}
		return $pseudo;
	}
	catch(PDOException $e)
	{
		throw new TableAccesException("problème avec la table parties");
	}	
}



//A développer
// utiliser une requête préparée
//vérifie qu'un pseudo existe dans la table pseudonyme
// post-condition retourne vrai si le pseudo existe sinon faux
// si un problème est rencontré, une exception de type TableAccesException est levée
public function pseudoExists($pseudo){
	 try{	
	$statement = $this->connexion->prepare("select pseudo from joueurs where pseudo=?;");
	$statement->bindParam(1, $pseudoParam);
	$pseudoParam=$pseudo;
	$statement->execute();
	$result=$statement->fetch(PDO::FETCH_ASSOC);

	if (isset($result["pseudo"])){
	return true;
	}
	else{
	return false;
	}
}
		catch(PDOException $e)
		{
		$this->deconnexion();
		throw new TableAccesException("problème avec la table parties");
		}
}




			
public function majPartie($pseudo, $partieGagnee, $nombreCoups){
	try{
		$statement = $this->connexion->prepare("INSERT INTO parties (pseudo, partieGagnee, nombreCoups) VALUES (?,?,?)");
		$statement->bindParam(1, $pseudo);
		$statement->bindParam(2, $partieGagnee);
		$statement->bindParam(3, $nombreCoups);
		$statement->execute();
	}
		catch(PDOException $e){
		$this->deconnexion();
		throw new TableAccesException("problème avec la table parties");
		}
}






public function getAllPartiesJoueurs($pseudo){
		try{
		$requete = "SELECT * FROM parties where pseudo ='".$pseudo."';";
		$statement=$this->connexion->query($requete);
		 return($statement->fetchAll(PDO::FETCH_ASSOC));
		} 
		catch(PDOException $e){
		$this->deconnexion();
		throw new TableAccesException("problème avec la table salon");
		}
}




public function getMeilleuresParties(){
	try
	{	
	$statement=$this->connexion->query("SELECT * FROM parties ORDER BY nombreCoups LIMIT 0, 5");
	return($statement->fetchAll(PDO::FETCH_ASSOC));	 
	} 
	catch(PDOException $e){
	$this->deconnexion();
	throw new TableAccesException("problème avec la table salon");
	}
}


public function getMdp($pseudo){
	try
	{
	$statement=$this->connexion->query("SELECT motDePasse FROM joueurs where pseudo = '".$pseudo."';");
	$res = $statement->fetch();
	return $res['motDePasse'];
	} 
	catch(PDOException $e)
	{
	$this->deconnexion();
	throw new TableAccesException("problème avec la table salon");
	}
}

public function setMdp($pseudo, $mdp){
	try
	{
	$statement = $this->connexion->prepare("UPDATE joueurs SET motDePasse = ? where pseudo = ?;");
	$statement->bindParam(1, $mdp);
	$statement->bindParam(2, $pseudo);
	$statement->execute();
	} 
	catch(PDOException $e)
	{
	$this->deconnexion();
	throw new TableAccesException("problème avec la table salon");
	}
}


public function newJoueur($pseudo, $mdp){
	try
	{
	//"INSERT INTO parties (pseudo, partieGagnee, nombreCoups) VALUES (?,?,?)"
	$statement = $this->connexion->prepare("INSERT INTO joueurs (pseudo, motDePasse) Values(?, ?)");
	$statement->bindParam(1, $pseudo);
	$statement->bindParam(2, crypt($mdp));
	$statement->execute();
	} 
	catch(PDOException $e)
	{
	$this->deconnexion();
	throw new TableAccesException("problème avec la table salon");
	}
}



}

?>
