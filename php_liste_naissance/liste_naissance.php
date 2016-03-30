<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.ico" />
<title>Liste de naissance</title>
</head>
<body>
<img src="nounours.jpg" style="margin:1em;float:left;">
<h1>Liste de naissance</h1>
<h1>Bienvenue !</h1>
<h2>Mode d'emploi</h2>
Cette liste a pour objet de canaliser votre g�n�rosit� et r�partir les cadeaux pour le b�b�. Cela vous permettra, si vous le souhaitez, de faire un cadeau qui ne sera pas en 10 exemplaires.<br>
Le principe est le suivant:
<ol>
<li>Choisissez un cadeau dans la liste (exemple : entrez "2" dans la colonne "votre choix" si vous souhaitez offrir 2 bavoirs).</li>
<li>Entrez votre adresse e-mail en bas de la page et validez.</li>
<li>Votre futur cadeau est alors pris en compte (exemple : si vous avez choisi d'offrir la chaise haute, celle-ci ne sera plus disponible dans la liste).</li>
<li>C'est ensuite � vous d'aller choisir le cadeau dans le magasin de votre choix et au prix qui vous convient. Nous serons �galement ravis si c'est un objet d'occassion � condition qu'il soit assez r�cent (� cause des normes de s�curit�), en bon �tat et propre. </li>
<li>Merci d'avance ! Le b�b� a d�j�h�te de vous rencontrer !</li>
</ol>
<div style="clear:both;"></div>
<h2>Attention</h2>
Nous avons d�j� ou nous nous occupons nous-m�me de l'achat des articles suivants :
<ul>
<li>poussette, landeau, coque auto</li>
<li>table � langer et baignoire</li>
<li>lit</li>
<li>parc</li>
<li>v�tements taille naissance</li>
<li>sac � langer</li>
<li>n�cessaire de toilette</li>
</ul>

<h2>Notes :</h2>
<ul>
<li>Vous pouvez ne pas utiliser cette liste si vous avez une autre id�e.</li>
<li>Vous pouvez vous regrouper pour les gros cadeaux.</li>
<li>Un petit dessin est aussi un tr�s beau cadeau qui se suffit � lui-m�me. Pensez-y !</li>
<li>Nous pr�f�rerions des couleurs mixtes, sauf "coup de c&#339;ur".</li>
</ul>
<h2>Faites votre choix</h2>
S�lectionnez les quantit�s dont vous vous chargez et validez votre choix.<br>
Les photos sont l� � titre indicatif et ne d�signent pas un mod�le particulier.<br>
Les prix sont �galement un ordre de grandeur du cadeau (neuf) pour vous guider dans votre choix.<br>
<form method="post" action="valider.php">
<table>
<tr>
<td>Description</td>
<td>Ordre de grandeur du prix</td>
<td>Quantit� max souhait�e</td>
<td>Quantit� r�serv�e</td>
<td>Votre choix</td>
<td></td>
</tr>
<?
//include('make_db.php'); echo "<h1>TODO remove make_db from here !! pour la mise en service</h1>";
include('db_file.php'); // TODO reset this for operational mode
include('log_tools.php');
$base = read_db();
$style = 0;
foreach ($base as $id => $item) {
	$style = 1 - $style;
	$name = $item['name'];
	$price = $item['prix'];
	$max = $item['max'];
	$booked = $item['booked'];
	$image = $item['image'];
	$remaining = $max - $booked;
	echo "<tr class=\"row$style\">";
	echo "<td><b>$name</b></td>";
	if ($price != '') echo "<td>$price &euro;</td>";
	else echo "<td></td>";
	echo "<td>";
	echo $max;
	echo "</td>";
	echo "<td>";
	echo $booked;
	echo "</td>";
	echo "<td>";
	if ($remaining > 0) {
		echo "<input type=\"text\" size=\"3\" name=\"field$id\"> ";
	} else echo "-";
	echo "</td>";
	echo "<td>";
	if ($image != '') echo "<img src=\"$image\">";
	echo "</td>";
	echo "</tr>\n";
}
echo "</table>";
?>
email: <input type="text" size="40" name="email"><br>
Un email de confirmation vous sera envoy�.<br>
<input type="submit" value="Valider">
</form>
<hr>
Pour tout renseignement, changer d'avis, ou un probl�me, vous pouvez nous contacter : xxx<br>
</body>
</html>
