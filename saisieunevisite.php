<p>


<legend>Saisie d'une visite</legend>
	<form method="post" action="index.php?p=visitevalidee" onSubmit="return verif(this)">
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
		<tr><td>Nom Prénom :</td><td> <input type='text' name='nom' required/></td></tr>
		
		<tr><td>Adresse :</td><td> <input type='text' name='adresse' required /></td></tr>
		
		<tr><td>Téléphone :</td><td> <input type='tel' pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name='tel' required/></td></tr>
		
		<tr><td>Mail :</td> <td><input type='email' name='mail' required/></td></tr>
				
		<tr><td>Disponibilités :</td><td> <input type='text' name='dispo' required/></td></tr>
		</table>
		<?php echo '<input type="hidden" name="idbien" value="'.$ligne["idbien"].'"> ';   ?> 
		
		<!--bloc contenant le bouton valider-->
		<div>
			<input type='submit' value='Valider' name='bp_valider' />
		</div>
	</form>

</p>