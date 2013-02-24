
<form method="post" action="index.php?p=detailbien">
<?php

if (isset($_GET['idbien']))
{
	$req = mysql_query("SELECT  b.idbien, b.titrebien, b.detailbien, b.adrbien, b.prixbien, t.nomtype, b.photobien FROM bien b, typebien t 
						WHERE b.idtype=t.idtype AND b.idbien = '" .$_GET['idbien']. "'
						group by 1 ");
	if (($donnees = mysql_fetch_array($req)))
	{
		$req2 = mysql_query("SELECT count(v.idbien) from visiter v where v.idbien = '" .$_GET['idbien']. "'  group by 1");

		?>
		<table>
			<caption><?php 
			 if ($req2 == 0) 
			 	{echo ("Personne n'a encore visité ce bien !");} 
			 else if ($req2 >0) 
				{ echo ("Il y a '".$req2."' personnes qui veulent visiter ce bien."); } ?>

			</caption>
			<tr>
				<td>Nom du bien</td>
				<td>Detail bien</td>
				<td>Adresse</td>
				<td>Type</td>
				<td>Photo</td>
				<td>Prix</td><?php
				}?>
			</tr>
			<tr>
				<td><?php echo $donnees['titrebien']; ?></td>
				<td><?php echo $donnees['detailbien'] ?></td>
				<td><?php echo $donnees['adrbien'] ?></td>
				<td><?php echo $donnees['nomtype'] ?></td>
				<td><a href="index.php?p=detailbien&idbien=<?php echo $donnees['idbien'];?>"><img src="images//<?php echo $donnees['photobien']; ?>"></a></td>
				<td><?php echo $donnees['prixbien'] ?></td>
			</tr>
		</table>

		<table>
			<tr>
				<?php $req = mysql_query("SELECT b.photobien, b.idbien, b.titrebien FROM bien b WHERE b.idbien in (SELECT idbien2 FROM ressembler WHERE idbien1 = '" .$_GET['idbien']. "')");
				$images=mysql_fetch_array($req);
				if (empty($images)){
					echo("Aucun bien ne lui ressemble...");
				}else{
					?><caption> Ces biens lui ressemble : </caption><?php 
					while ($images=mysql_fetch_array($req))
					{ ?>
						<td><?php echo $donnees['titrebien']; ?></td>								
						<td><a href="index.php?p=detailbien&idbien=<?php echo $images['idbien'];?>"><img src="images/<?php echo $images['photobien']; ?>"></a></td>						<?php 
					} 
				} ?>
			</tr>
		</table>
<?php
}
else
{
	echo "Erreur aucun bien selectionne";
}

?>
</form>


