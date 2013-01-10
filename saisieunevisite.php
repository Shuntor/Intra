<p>
<legend>Saisie d'une visite</legend>
<form method="post" action="index.php?p=saisieunevisite">
	<form method="post" action="index.php?p=visitevalidee">
	<?php
							
	$requete= "SELECT idbien, titrebien, detailbien, photobien FROM bien WHERE idbien='".$_GET["idbien"]."'";
	$resultat = mysql_query($requete) ;

	$nb=mysql_num_rows($resultat);

	echo '<center>Details du bien<br/><br/>';
	$ligne = mysql_fetch_array($resultat);

	?>
	<img src="images/<?php echo $ligne["photobien"];?>" alt="images/<?php echo $ligne["photobien"];?>"/>
	<?php
	echo 'Details : '.$ligne["detailbien"].'<br/><br/>';
	echo '</center><hr/>';
	?>
	
							<!-- création du formulaire de saisie -->
							
		<center><table class="tabsaisivisite">
		<caption>Saisie des informations pour la visite de <?php echo $ligne["titrebien"] ?> </caption>
		<tr><td>Nom :</td><td> <input type='text' name='nom' ./></td></tr>
		
		<tr><td>Prénom :</td><td> <input type='text' name='prenom' /></td></tr>
		
		<tr><td>Adresse :</td><td> <input type='text' name='adresse' /></td></tr>
		
		<tr><td>Code postal :</td><td> <input type='text' name='codeP' /></td></tr>
		
		<tr><td>Ville :</td><td> <input type='text' name='ville' /></td></tr>
		
		<tr><td>Téléphone :</td><td> <input type='text' name='tel' /></td></tr>
		
		<tr><td>Mail :</td> <td><input type='text' name='mail' /></td></tr>
		
		<?php echo '<input type="hidden" name="idbien" value="'.$ligne["idbien"].'"> ';   ?> 
		
		<!--bloc contenant le bouton valider-->
			<input type='submit' value='Valider' name='bp_valider' />
		
	</form>
</form>

</p>