<center>

<fieldset><legend>Consulter une categorie</legend>
		<form method="post" action="index.php?p=consultcat">
			<select name="categorie">			
<?php			$req = mysql_query("SELECT nomtype FROM typebien");

				while ($donnees = mysql_fetch_array($req))
				{?>
					<option value="<?php echo $donnees['nomtype']; ?>"<?php 
					if ((isset($_POST["categorie"])) AND ($_POST["categorie"] == $donnees['nomtype'])) 
						{echo "selected";}?> > <?php echo $donnees['nomtype']; ?> 
					</option>
<?php 			}?>
			</select>
									
			<input type="submit" value="Afficher" />
		</form>
</fieldset>

<?php
if ((isset($_POST["categorie"])))
{
?>	
	<table><caption><?php echo $_POST["categorie"];?></caption>
	<tr>
		<th>Nom du bien</th>
		<th>Photo</th>
	</tr>

<?php	$req = mysql_query("SELECT b.idbien, b.titrebien, b.photobien FROM bien b, typebien t WHERE b.idtype=t.idtype AND t.nomtype IN(SELECT nomtype from typebien where nomtype= '" .$_POST['categorie']. "' ) ");
		while ($donnees = mysql_fetch_array($req))
		{?>
			<tr>
				<td><?php echo $donnees['titrebien']; ?></td>
				<td><a href="index.php?p=detailbien&idbien=<?php echo $donnees['idbien'];?>"><img src="images/<?php echo $donnees['photobien']; ?>" ></a></td>
			</tr>

<?php   }?>
		</table><?php
}

?></center>