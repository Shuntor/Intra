<?php
	$conn = mysql_connect("localhost", "root", "")
	or die ("Connexion impossible");
	$base="agence";
	mysql_select_db("$base") OR DIE ("Base inconnue");
	mysql_query("SET NAMES UTF8");
?>	