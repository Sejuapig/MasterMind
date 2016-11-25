<?php
class Vue{

//---------------------------------------Fonction appelée à l'exterieur----------------------------------------------
function genereVueJeu($tab, $tabVerif){
	$this->genereHeader("vueJeux");
	$this->genereNavBar();
	$this->genereTableauJeu($tab, $tabVerif);
	$tabPions = array("green", "yellow", "red", "blue", "pink", "purple", "orange", "grey");
	$this->afficherBoutonsJeu($tabPions);
}

function genereVueConnexion($dejaEssaye){
	$this->genereHeader("vueConnexion");
	$this->genereNavBar();
	$this->demandePseudo($dejaEssaye);
}

//---------------------------------------Fin Fonction appelée à l'exterieur----------------------------------------------





//---------------------------------------Fonction appelée à seulement dans la classe Vue----------------------------------------------

		//---------------------------------------Fonction utilHTML Générale----------------------------------------------
		function genereHeader($nomFile)
		{
			echo '<!DOCTYPE html>
			<html>
			<head>
			<meta charset="utf-8">
			<title>Mastermind</title>
			<link rel="stylesheet" href="vue/css/'.$nomFile.'.css">
			</head>';
		}

		function genereNavBar()
		{
			echo '
		<div class="nav">
		<ul>
		<li class="home"><a href="#">Home</a></li>
		<li class="Regame"><a class="active" href="#">Regame</a></li>
		<li class="Deconnexion"><a href="#">Déconnexion</a></li>
		<li class="Don"><a href="#">Tipeee</a></li>
		</ul>
		</div>';
		}

		//---------------------------------------Fin Fonction utilHTML Générale----------------------------------------------



		//---------------------------------------Fonction utilHTML propre aux vues----------------------------------------------
		/*
		fonction qui génère la vue permettant à l'utilisateur de se connecter
		@param booleen $dejaEssaye:
		"True" si l'utilisateur a déjà essayé de se connecter mais avec de mauvais identifiants
		"False" et si c'est sa première tentative
		*/
		function demandePseudo($dejaEssaye){
			if($dejaEssaye == TRUE){
		?>
		<body>
			<h1>Mastermind</h1>
			<div class="container">
				<div id="login">
					<form action="index.php" method="POST">
						<fieldset class="clearfix">
							<p><span class="fontawesome-user"></span><input name ="pseudo" type="text" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p>
							<p><span class="fontawesome-lock"></span><input name ="pwd" type="password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>
							<p><input name="soumettreAuthentification" type="submit" value="Connexion"></p>
							<p style = "color:red; text-align: center; font-size:16px;"> Mauvais identifiants </p>
						</fieldset>
					</form>
					<p><a href="#">Vien t'amuser avec nous, clique ici pour nous rejoindre </a><span class="fontawesome-arrow-right"></span></p>
				</div>
			</div>
		</body>
		</html>
		<?php
		}
		else{
		?>
		<body>
			<h1>Mastermind</h1>
			<h2>By Jean Francois Copé and Co</h2>
			<div class="container">
				<div id="login">
					<form action="index.php" method="POST">
						<fieldset class="clearfix">
							<p><span class="fontawesome-user"></span><input name ="pseudo" type="text" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p>
							<p><span class="fontawesome-lock"></span><input name ="pwd" type="password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>
							<p><input name="soumettreAuthentification" type="submit" value="Connexion"></p>

						</fieldset>
					</form>
					<p><a href="#">Vien t'amuser avec nous, clique ici pour nous rejoindre</a><span class="fontawesome-arrow-right"></span></p>
				</div>
			</div>
		</body>
		</html>
		<?php
		}
		}



		function genereTableauJeu($tab, $tabVerif){
			$this->creerTabJeu($tab, $tabVerif);
		}

		//pour creer le tableau principal
		function creerTabJeu($tab, $tabVerif){ //pour creer le tableau principale.
			echo '<table class="tabjeux">';
		    for($j = 0; $j<10; $j++)
		    {
		      echo '<tr>';
		      for($i = 0; $i<4; $i++)
		      {
		        echo '<td bgcolor="'.$tab[$i].'" class="grandrond"></td>';
		      }
		      echo '<td>';
		      $this->creerTabVerif($tabVerif); //Ici on change le style des petitrond
		      echo '</td>';
		      echo '</tr>';
		   	}
		   	echo '</table>';
		}

		function creerTabVerif($tabVerif){ //pour creer le petit tableau de vérificatoin des pion
		  echo '<table>';
		  for($j = 0; $j<2; $j++)
		  {
		    echo '<tr></tr>';
		    for($i = 0; $i<2; $i++)
		    {
		      echo '<td bgcolor="'.$tabVerif[$i].'" class="petitrond"></td>';
		    }
		  }
		  echo '</table>';
		}

		function afficherBoutonsJeu($tab){
			echo'<form style="position:relative; top:-500px;"action="index.php" method="POST">';
			for($i = 0; $i < sizeof($tab); $i++)
			{
				echo '<input style="background-color: '.$tab[$i].' ; color:'.$tab[$i].'; cursor:pointer" class="petitRondSelection" name ="pionJoueur" type="submit" value="'.$tab[$i].'"></input>';
			}
			echo '</form>';
		}

		//---------------------------------------Fin Fonction utilHTML propre aux vues----------------------------------------------

}
?>
