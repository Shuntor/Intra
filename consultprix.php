
<p>
<fieldset><legend>Consultation des bien par prix </legend>
<form action="index.php?p=consultprix" method="post">

	Quel est votre choix ? </br>

<input type="radio" name="choix" value="BasPrix"<?php if(isset($_POST['choix']) AND $_POST["choix"]=="BasPrix") {echo 'checked';} ?>> < 200.000 euros

<input type="radio" name="choix" value="MoyenPrix"<?php if(isset($_POST['choix']) AND $_POST["choix"]=="MoyenPrix") {echo 'checked';} ?>> de 200.000 euros à 300.000 euros 

<input type="radio" name="choix" value="GrosPrix"<?php if(isset($_POST['choix']) AND $_POST["choix"]=="GrosPrix") {echo 'checked';} ?>> > 300.000 euros </br>

<input type="submit" value="Afficher" name="ok">
</fieldset>


<?php
if (isset($_POST['choix']))
{
	switch($_POST['choix']){
		case 'BasPrix':
			$requete = mysql_query ("SELECT b.idbien, b.titrebien, b.detailbien, b.prixbien, t.nomtype, b.photobien FROM bien b, typebien t WHERE prixbien <200000 AND b.idtype=t.idtype");
			?>
			<table>
			<tr>
				<td><?php echo ("Titre bien"); ?> </td>
				<td><?php echo ("Detail bien"); ?> </td>
				<td><?php echo ("Prix du bien"); ?> </td>
				<td><?php echo ("Nom du type"); ?> </td>
				<td><?php echo ("Photo du bien"); ?> </td>
			</tr>
			<?php
			while ($resultat = mysql_fetch_array($requete)){ ?>
				<tr>
				<td><?php echo $resultat["titrebien"];?></td>
				<td><?php echo $resultat["detailbien"];?></td>
				<td><?php echo $resultat["prixbien"];?></td>
				<td><?php echo $resultat["nomtype"];?></td>
				<td><a href="index.php?p=detailbien&idbien=<?php echo $resultat['idbien'];?>"><img src= 'images/<?php echo $resultat['photobien']; ?>'/></a></td>
				</tr>
				<?php } ?>
			</table>
		<?php break; 

		case 'MoyenPrix':
			$requete = mysql_query ("SELECT b.idbien, b.titrebien, b.detailbien, b.prixbien, t.nomtype, b.photobien FROM bien b, typebien t WHERE prixbien >200000 AND prixbien <300000 AND b.idtype=t.idtype");
			?>
			<table>
			<tr>
				<td><?php echo ("Titre bien"); ?> </td>
				<td><?php echo ("Detail bien"); ?> </td>
				<td><?php echo ("Prix du bien"); ?> </td>
				<td><?php echo ("Nom du type"); ?> </td>
				<td><?php echo ("Photo du bien"); ?> </td>
			</tr>
			<?php
			while ($resultat = mysql_fetch_array($requete)){ ?>
				<tr>
				<td><?php echo $resultat["titrebien"];?></td>
				<td><?php echo $resultat["detailbien"];?></td>
				<td><?php echo $resultat["prixbien"];?></td>
				<td><?php echo $resultat["nomtype"];?></td>
				<td><a href="index.php?p=detailbien&idbien=<?php echo $resultat['idbien'];?>"><img src= 'images/<?php echo $resultat['photobien']; ?>'/></a></td>
				</tr>
				<?php } ?>
			</table>
		<?php break; 
		
		case 'MoyenPrix':
			$requete = mysql_query ("SELECT b.idbien, b.titrebien, b.detailbien, b.prixbien, t.nomtype, b.photobien FROM bien b, typebien t WHERE prixbien >300000 AND b.idtype=t.idtype");
			?>
			<table>
			<tr>
				<td><?php echo ("Titre bien"); ?> </td>
				<td><?php echo ("Detail bien"); ?> </td>
				<td><?php echo ("Prix du bien"); ?> </td>
				<td><?php echo ("Nom du type"); ?> </td>
				<td><?php echo ("Photo du bien"); ?> </td>
			</tr>
			<?php
			while ($resultat = mysql_fetch_array($requete)){ ?>
				<tr>
				<td><?php echo $resultat["titrebien"];?></td>
				<td><?php echo $resultat["detailbien"];?></td>
				<td><?php echo $resultat["prixbien"];?></td>
				<td><?php echo $resultat["nomtype"];?></td>
				<td><a href="index.php?p=detailbien&idbien=<?php echo $resultat['idbien'];?>"><img src= 'images/<?php echo $resultat['photobien']; ?>'/></a></td>
				</tr>
				<?php } ?>
			</table>
		<?php break; 
	}
}
?>




<!-- <?php mysql_close($conn);?> -->

</form>
</p>
