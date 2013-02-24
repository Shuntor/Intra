
<p>
<h2>Séléctionner une ou plusieurs base de donnée</h2>
<form action="index.php?p=base" method="post">
		<?php
			include ('connect.php');
			$req='show tables;';
			$table=mysql_query($req) or die('Erreur select : '.mysql_error());
			
			echo '<center><form action="base.php" method="post"><table>';
			while($data=mysql_fetch_array($table)) {
				echo '<tr><td><input type="checkbox" name="'.$data['Tables_in_agence'].'" ';
				if (isset($_POST[$data['Tables_in_agence']])){echo 'checked="checked"';}
				echo ' />'.$data['Tables_in_agence'].'</td></tr>';
			}
			echo '</table><input name="bouton" value="Afficher" type="submit" /></form></center>';
			
			if(isset($_POST['bouton'])) {
				$table=mysql_query($req) or die('Erreur select : '.mysql_error());
				while($data=mysql_fetch_array($table)) {
					if(isset($_POST[$data['Tables_in_agence']])) {
						$reqtab='SELECT * FROM '.$data['Tables_in_agence'].';';
						$reqcol='SHOW COLUMNS FROM '.$data['Tables_in_agence'].';';
						$tab=mysql_query($reqtab) or die('Erreur select : '.mysql_error());
						$col=mysql_query($reqcol) or die('Erreur select : '.mysql_error());
						echo '<br /><center><table border=1><tr>';
						while($datacol=mysql_fetch_array($col)) {
							echo '<th>'.$datacol['Field'].'</th>';
						}
						echo '</tr>';
						$col=mysql_query($reqcol) or die('Erreur select : '.mysql_error());
						while($datatab=mysql_fetch_array($tab)) {
							echo '<tr>';
							while($datacol=mysql_fetch_array($col)) {
								echo '<td>'.$datatab[$datacol['Field']].'</td>';
							}
							echo '</tr>';
							$col=mysql_query($reqcol) or die('Erreur select : '.mysql_error());
						}
						echo '</table></center><br />';
					}
				}
			}
			mysql_close();
		?>
