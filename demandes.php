<?php
session_start();
echo "Anciennes demandes";
//Test pour svoir si la personne est connectée
if (empty($_SESSION['id']) || empty($_SESSION['nom'])){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php?p=identification';
	header("Location: http://$host$uri/$extra");
	exit;
}else{
	$req="SELECT iddemande, datedemande FROM demande where idclient ='".$_SESSION['id']."'";
	$req=mysql_query($req) or die('Erreur select : '.mysql_error());
	while($data=mysql_fetch_array($req)){
		echo ("<div><a href="."index.php?p=visite&iddem=".$data['iddemande'].">".date("d/m/Y", strtotime($data['datedemande']))."</a></div>");

	}
	
}
	
?>