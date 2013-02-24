
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link rel="stylesheet" type="text/css" href="styles.css">
	
	<title> Agence Immobiliere de Victor Iungmann</title>
<body>

<!--- ce script est aussi anti-clic droit --->
<script language="JavaScript1.2">
function refresh()
	{
	document.location.reload();
                return false;
	}
document.oncontextmenu = refresh;
</script>

<noscript><a href="http://www.editeurjavascript.com/">ajax</a></noscript>

<?php include ('connect.php'); ?>


<!--______________________________________Bandeau______________________________________-->
	<div id="bandeau">
	</div>

<!--______________________________________Menu______________________________________-->

	<div id="menu8">  
	<ul>
		<li><a href="index.php?p=accueil" title="Home">Accueil</a></li>	
		<li><a href="index.php?p=consultprix" title="prix">Biens par prix</a></li>
		<li><a href="index.php?p=consultcat" title="cat">Biens par categorie</a></li>	
		<li><a href="index.php?p=recherche" title="rech">Recherche d'un bien</a></li>	
		<li><a href="index.php?p=recherches" title="rechs">Recherche de biens</a></li>
		<li><a href="index.php?p=voirvisites" title="rechs">Voir visites</a></li>
		<li><a href="index.php?p=identification" title="base">Identification</a></li>
		<li><a href="index.php?p=base" title="base">Bases</a></li>
	</ul>
	</div>

<!--______________________________________Contenu______________________________________-->
	<div id="contenu">
	<p>
			<?php
			if(empty($_GET['p']))
				{echo("Accueil");}
			else if($_GET['p']=='consultprix')
				{include("consultprix.php");}
			else if($_GET['p']=='accueil')
				{include("accueil.php");}
			else if($_GET['p']=='consultcat')
				{include("consultcat.php");}
			else if($_GET['p']=='detailbien')
				{include("detailbien.php");}
			else if($_GET['p']=='recherche')
				{include("recherche.php");}
			else if($_GET['p']=='saisieunevisite')
				{include("saisieunevisite.php");}
			else if($_GET['p']=='visitevalidee')
				{include("visitevalidee.php");}
			else if($_GET['p']=='recherches')
				{include("recherches.php");}
			else if($_GET['p']=='base')
				{include("base.php");}
			else if($_GET['p']=='ajoutvisites')
				{include("ajoutvisites.php");}
			else if($_GET['p']=='visitesvalidees')
				{include("visitesvalidees.php");}	
			else if($_GET['p']=='voirvisites')
				{include("voirvisites.php");}
			else if($_GET['p']=='supvisite')
				{include("supvisite.php");}	
			else if($_GET['p']=='saisievisites')
				{include("saisievisites.php");}
			else if($_GET['p']=='identification')
				{include("identification.php");}
			else if($_GET['p']=='demandes')
				{include("demandes.php");}
			else if($_GET['p']=='nouvdem')
				{include("nouvdem.php");}
			else if($_GET['p']=='deco')
				{include("deco.php");}
			else if($_GET['p']=='visite')
				{include("visite.php");}
			?>
	</p>	
	</div>


<!--______________________________________Pied de page______________________________________-->
	<div id="pied_page"><html>Victor Iungmann       v.iungmann@gmail.com
	</html></div>

</body>
</html>
