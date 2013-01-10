
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link rel="stylesheet" type="text/css" href="styles.css">
	
	<title> Agence Immobiliere de Victor Iungmann</title>
</head>
<body>
<?php include ('connect.php'); ?>


<!--______________________________________Bandeau______________________________________-->
	<div id="bandeau">
	<html>
	
	</html>


	</div>

<!--______________________________________Menu______________________________________-->

	<div id="menu8">  
	<ul>
		<li><a href="index.php?p=accueil" title="Home">Accueil</a></li>	
		<li><a href="index.php?p=consultprix" title="prix">Biens par prix</a></li>
		<li><a href="index.php?p=consultcat" title="cat">Biens par categorie</a></li>	
		<li><a href="index.php?p=recherche" title="cat">Recherche d'un bien</a></li>	
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
			?>
	</p>	
		
	</div>


<!--______________________________________Pied de page______________________________________-->
	<div id="pied_page"><html>Victor Iungmann       v.iungmann@gmail.com
	</html></div>



</body>
</html>
