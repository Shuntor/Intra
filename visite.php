<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['nom'])){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php?p=identification';
	header("Location: http://$host$uri/$extra");
	exit;
}else{
	$iddem= $_GET['iddem'];
	
	/*
	 * Cette page affiche la date de demande, le nom du client et les visites demandées
	 * 	dans la demande correspondante :
	 * 		Titre du bien, prix du bien et photo du bien	 
	 */
	$req="SELECT d.datedemande FROM demande d where d.idclient ='".$_SESSION['id']."'";
	$req=mysql_query($req) or die('Erreur select : '.mysql_error());
	$data=mysql_fetch_array($req);
	echo("Date de la demande : ".$data['datedemande']."<br/>Nom client : ".$_SESSION['nom']."<br/>")
	?>
	<table>
	<tr>
	<td>Titre bien</td>
	<td>Prix bien</td>
	<td>Photo</td>
	</tr>
	<?php
	$req="SELECT b.idbien, b.titrebien, b.prixbien, b.photobien FROM bien b, visiter v where v.iddemande='".$_GET['iddem']."' AND b.idbien=v.idbien";
 	$req=mysql_query($req) or die('Erreur select : '.mysql_error());
	while($data=mysql_fetch_array($req)){
		echo("<tr><td>".$data['titrebien']."</td>
				  <td>".$data['prixbien']." </td>
				  <td><a href="."index.php?p=detailbien&idbien=".$data['idbien']."><img src='images//".$data['photobien']."'</td></tr>");
	}
	?></table><?php 
	
}

?>