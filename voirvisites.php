<?php
session_start();	

if (!empty($_SESSION['visites'])){
	
	?>
	<table>
	  <tr>
	    <th>idBien</th>
	    <th>adresseBien</th>
	    <th>prixBien</th>
	    <th>priorité</th>
	    <th></th>
	  </tr>
	  
	  <?php foreach ($_SESSION['visites'] as $key => $value ){ 
	  $req="(SELECT adrbien, prixbien FROM bien where idbien = '".$key."')";
	  $req=mysql_query($req) or die('Erreur select : '.mysql_error());
	  $data=mysql_fetch_array($req);
	  ?>
	  <tr>
	    <td><?php echo $key; ?></td>
	    <td><?php echo $data["adrbien"]?></td>
	    <td><?php echo $data["prixbien"]; ?></td>
	    <td><?php echo $value; ?></td>
	    <td><a href="index.php?p=supvisite&idBien=<?php  echo $key;?>"><img src="images/corbeille.jpg"></a></td>
	  </tr>
	 <?php }?>
	</table>
	
	<a href="index.php?p=saisievisites"><input type="submit" value="Saisie des visites" name="bp_saisie" /></a><?php 
}else{
	echo ("Aucune visite n'a été demandée...");	
	}?>
	