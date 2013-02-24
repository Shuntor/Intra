<form method="post" action="index.php?p=accueil">
<?php
	if(isset($_POST["bp_valider"]))
			{

				//requete permettant d insérer le client dans la base de donnée
				$requete="insert into client values(NULL,'".$_POST['nom']."','".$_POST['adresse']."','".$_POST['tel']."','".$_POST['mail']."')";
				$resultat = mysql_query($requete) OR DIE ("Erreur, probleme de requete sur client");
				
				
				$requete4="SELECT LAST_INSERT_ID() FROM client ";
				$resultat4 = mysql_query($requete4) OR DIE ("Erreur, probleme de requete4");
				$ligne2 = mysql_fetch_array($resultat4);
				
				//requete permettant d'enregistrer la demande de visite dans la base de donnée
				$datenow=date("Y-m-d H:i:s");
				$requete2="insert into demande values(NULL,'".$datenow."' ,'".$_POST['dispo']."', LAST_INSERT_ID())";
				$resultat2 = mysql_query($requete2) OR DIE ("Erreur, probleme de requete lors de l'insertion dans la base demande. ");
		
				$demande="SELECT LAST_INSERT_ID() FROM demande ";
				$resultat5 = mysql_query($demande) OR DIE ("Erreur, probleme de requete5");
				$ligne3 = mysql_fetch_array($resultat5);
				
				//Insertion dans Visiter
				$requeteVis = "insert into visiter values('".$_POST['idbien']."','".$ligne3['LAST_INSERT_ID()']."',1)";
				$resReqVis=mysql_query($requeteVis) OR DIE ("Erreur, probleme de requete lors de l'insertion dans la base Visite. ");
				
								
				
			}
?>

<br/><br/><br/><br/>


	<?php echo "Vous avez été enregistré avec le n° client suivant : ".$ligne2['LAST_INSERT_ID()']."<br/><br/>";?>
	<?php echo "Votre commande a bien été enregistrée avec le n° de demande suivant : ".$ligne3['LAST_INSERT_ID()']."<br/><br/>";?>
	
	<a href="index.php?p=accueil"><input type="submit" value="Retourner à l'accueil" name="bp_retour" /></a>

</form>