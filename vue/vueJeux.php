<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Mastermind</title>
<link rel="stylesheet" href="css/vueJeux.css">
</head>
<body class="news">

<!-- bandeau menu -->

<header>
<div class="nav">
<ul>
<li class="home"><a href="#">Home</a></li>
<li class="Regame"><a class="active" href="#">Regame</a></li>
<li class="Deconnexion"><a href="#">Deconnection</a></li>
<li class="Don"><a href="#">Tipeee</a></li>
</ul>
</div>
</header>

<!-- tableau -->

<table class="tabjeux">
<?php
$tab = array('black.', 'red', 'yellow', 'red');
$tabV = array('black','white');
creerTab('grandrond', $tab, $tabV);

?>
</table>

<!-- Single button 
</table>
<tr>
<td>
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 Couleur<span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
</div>
</td>
</tr>
<tr>
<td>
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Couleur <span class="caret"></span>
</button>
</div>
</td>
</tr>
</table>
</body>
</html>-->


<?php
function creerTabV($nomClasse, $tabV){ //pour creer le petit tableau de vérificatoin des pion
echo '<table>';
for($j = 0; $j<2; $j++)
{
echo '<tr></tr>';
for($i = 0; $i<2; $i++)
{
echo '<td bgcolor="'.$tabV[$i].'" class="'.$nomClasse.'"></td>';
}
}
echo '</table>';
}

function creerTab($nomClasse, $tab, $tabV){ //pour creer le tableau principale.
for($j = 0; $j<10; $j++)
{
echo'<tr class="tabljeux"></tr>';
for($i = 0; $i<4; $i++)
{
echo '<td bgcolor="'.$tab[$i].'" class="'.$nomClasse.'"></td>';
}
echo '<td>';
creerTabV('petitrond', $tabV); //Ici on change le style des petitrond
echo '</td>';
}
}


?>
