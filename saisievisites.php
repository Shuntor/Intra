<?php session_start();
if (empty($_SESSION['id'])&& empty($_SESSION['nom'])){ ?>
		
	<p>
	<legend>Saisie de plusieurs visites</legend>
		<form method="post" action="index.php?p=visitesvalidees" onSubmit="return verif(this)">	
	
		<table>
		 <tr>
			<th></th>
		    <th>Detail</th>
		</tr>
		<?php
	foreach ($_SESSION['visites'] as $key => $value){
		
		$requete= "SELECT idbien, titrebien, detailbien, photobien FROM bien WHERE idbien='".$key."'";
		$resultat = mysql_query($requete) ;
		$ligne = mysql_fetch_array($resultat);
	
		?>
		<tr>
	    <td><img src="images/<?php echo $ligne["photobien"];?>" alt="images/<?php echo $ligne["photobien"];?>"/></td>
	    <td>
		<?php
		echo 'Details : '.$ligne["detailbien"].'<br/><br/>';	?></td></tr>	
	<?php } ?>
	</table>
								<!-- création du formulaire de saisie -->
								
			<center><table class="tabsaisivisite">
			<caption>Saisie des informations pour la visite de <?php echo $ligne["titrebien"] ?> </caption>
			<tr><td>Nom Prénom :</td><td> <input type='text' name='nom' value='Jean' required/></td></tr>
			
			<tr><td>Adresse :</td><td> <input type='text' name='adresse' value='Charles' required /></td></tr>
			
			<tr><td>Téléphone :</td><td> <input type='tel' value='010101010101' pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name='tel' required/></td></tr>
			
			<tr><td>Mail :</td> <td><input type='email' name='mail' value='aaa@bbb' required/></td></tr>
					
			<tr><td>Disponibilités :</td><td> <input type='text' name='dispo' value='Le 37 du mois' required/></td></tr>
			</table>
			<!--bloc contenant le bouton valider-->
			<div>
				<input type='submit' value='Valider' name='bp_valider' />
			</div>
		</form>
	
	</p>
<?php }else{?>

	<p>
	<legend>Saisie de plusieurs visites</legend>
	<form method="post" action="index.php?p=visitesvalidees" onSubmit="return verif(this)">
	
	<table>
	<tr>
	<th></th>
	<th>Detail</th>
	</tr>
	<?php
	foreach ($_SESSION['visites'] as $key => $value){
	
		$requete= "SELECT idbien, titrebien, detailbien, photobien FROM bien WHERE idbien='".$key."'";
		$resultat = mysql_query($requete) ;
		$ligne = mysql_fetch_array($resultat);
	
		?>
			<tr>
		    <td><img src="images/<?php echo $ligne["photobien"];?>" alt="images/<?php echo $ligne["photobien"];?>"/></td>
		    <td>
			<?php
			echo 'Details : '.$ligne["detailbien"].'<br/><br/>';	?></td></tr>	
		<?php } ?>
		</table>
									<!-- création du formulaire de saisie -->
									
				<center><table class="tabsaisivisite">
				<caption>Saisie des informations pour la visite de <?php echo $ligne["titrebien"] ?> </caption>

				<tr><td>Disponibilités :</td><td> <input type='text' name='dispo' value='Le 37 du mois' required/></td></tr>
				</table>
				<!--bloc contenant le bouton valider-->
				<div>
					<input type='submit' value='Valider' name='bp_valider' />
				</div>
			</form>
		
		</p>
<?php } ?>