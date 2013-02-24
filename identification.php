<?php session_start(); 
if (!(empty($_SESSION['id']))&& !(empty($_SESSION['nom']))){
	echo ("Vous êtes connecté sous le nom de <strong>".$_SESSION['nom']."</strong>.
			<br/> Vous habitez actuellement <strong>".$_SESSION['adr']."</strong>.");
	?>
	<div><a href=" index.php?p=demandes">Anciennes demandes</a></div>
	<div><a href=" index.php?p=recherches">Nouvelles demandes</a></div>
	<div><a href=" index.php?p=deco">Deconnexion</a></div>
	<?php 
}else{?>
	<form method="post" action="index.php?p=identification" onSubmit="return verif(this)">
	<table class="tab">
			<tr><td>Identifiant :</td><td> <input type='text' name='id' value='2' required/></td></tr>
			<tr><td>Mail :</td> <td><input type='email' name='mail' value='intranet@cict.fr' required/></td></tr>
	</table>
			<div>
				<input type='submit' value='Valider' name='bp_valider' >
			</div>
	</form>
	<?php 
	if(isset($_POST["bp_valider"])){
		//Requete permettant de rechercher l'id du client dans la base
		$req="SELECT idclient, emailclient FROM client where idclient ='".$_POST['id']."'";
		$req=mysql_query($req) or die('Erreur select : '.mysql_error());
		$data=mysql_fetch_array($req);
		if(empty($data)){
			echo ("Identifiant inconnu...");
		}elseif($data['emailclient'] != $_POST['mail']){
			echo ("ID reconnu mais mauvais mail...");
		}else{
			$_SESSION['id']=$_POST['id'];
			$req="SELECT nomclient, adrclient FROM client where idclient ='".$_SESSION['id']."'";
			$req=mysql_query($req) or die('Erreur select : '.mysql_error());
			$data=mysql_fetch_array($req);
			echo ("Bravo <strong>".$data['nomclient']."</strong>, vous vous êtes connecté !<br/>
				   Vous habitez actuellement <strong>".$data['adrclient']."</strong>.<br/>
				   Nous sommes très heureux de vous revoir !");
			$_SESSION['nom']=$data['nomclient'];
			$_SESSION['adr']=$data['adrclient'];
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'index.php?p=identification';
			header("Location: http://$host$uri/$extra");
			exit;
		}
	}
}
