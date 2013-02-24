
	<h2>Recherche de biens</h2>
		<form action="index.php?p=recherches" method="post">
			<form action="index.php?p=recherches" method="post">
				<INPUT type=text name="rech" <?php if(isset($_POST['rech'])) {echo 'value="'.$_POST['rech'].'" ';} ?>>
				<INPUT name="bouton" type="submit" value="Rechercher">
			</form>
			
			<?php
				if(isset($_POST['bouton'])) {
				echo '<h2>Biens trouvés</h2>';
				
				if (COUNT(explode(" ", $_POST["rech"]))>3) {echo "<p>Vous avez saisie trop de mot.</p>";}
				else {
					$exp = array();
					$exp = explode(" ", $_POST["rech"]);
					
					
					$req="(SELECT idbien, detailbien, photobien FROM bien";
					if (COUNT(explode(" ", $_POST["rech"]))==1) {$req=$req." WHERE detailbien LIKE '%".$exp[0]."%');";} 
					elseif (COUNT(explode(" ", $_POST["rech"]))==2) {$req=$req." WHERE detailbien LIKE '%".$exp[0]."%' AND detailbien LIKE '%".$exp[1]."%')
					UNION (SELECT idbien, detailbien, photobien FROM bien WHERE detailbien LIKE '%".$exp[0]."%' OR detailbien LIKE '%".$exp[1]."%');";}
					elseif (COUNT(explode(" ", $_POST["rech"]))==3) {$req=$req." WHERE detailbien LIKE '%".$exp[0]."%' AND detailbien LIKE '%".$exp[1]."%' AND detailbien LIKE '%".$exp[2]."%') 
					UNION (SELECT detailbien, photobien FROM produit WHERE detailbien LIKE '%".$exp[0]."%' AND detailbien LIKE '%".$exp[1]."%' OR detailProd LIKE '%".$exp[1]."%' 
					AND detailbien LIKE '%".$exp[2]."%' OR detailbien LIKE '%".$exp[0]."%' AND detailbien LIKE '%".$exp[2]."%') 
					UNION (SELECT idbien, detailbien, photobien FROM produit WHERE detailbien LIKE '%".$exp[0]."%' OR detailbien LIKE '%".$exp[1]."%' 
					OR  detailbien LIKE '%".$exp[2]."%');";}
					$req=mysql_query($req) or die('Erreur select : '.mysql_error());
						
			// Ajout mot saisie en gras		
					$replacements = array();
					$patterns = array();			// la chaine que je cherche a etre remplacée (ici detailbien)
					$j=0;
					while ($j<count($exp)){
					$patterns[] = ".$exp[$j]."; 				//on met les mots à remplacer dans patterns
					$replacements[] = " <b> " . $exp[$j] . " </b> ";		// on les remplace
					$j++;
					}
				
					if (mysql_num_rows($req)==0) {echo 'Aucun bien trouvé...';}
					else {
						echo '<center><table border=1><tr><th>Image</th><th>Détail du bien</th><th></th></tr>';
						while($data=mysql_fetch_array($req)) {
							$data["detailbien"] = preg_replace($patterns, $replacements, $data["detailbien"]);
							echo '<tr><td><img src="images/'.$data["photobien"].'" \></td><td>'.$data["detailbien"].'</td>
							<td><form action="index.php?p=ajoutvisites&idbien='.$data["idbien"].'" method="post">
								<select name="prio" >
									<option value="1" > Intéressé au plus haut point ! </option>
									<option value="2" > Très intéressé </option>
									<option value="3" > intéressé </option>
									<option value="4" > Peu intéressé </option>
									<option value="5" > Très peu intéressé </option>
								</select>
								
								<input name="visiter" value="visiter" type="submit" /></form></td>
							</tr>';
						}
						echo '</table></center>';
					}
				}
				}
				mysql_close();
			?>
	</form>

