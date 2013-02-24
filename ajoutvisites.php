<?php
session_start();

$_SESSION['visites'][$_GET["idbien"]]= $_POST["prio"];		?>
<table>
  <tr>
    <th>Bien</th>
    <th>Priorité</th>
  </tr> 
  <?php foreach ($_SESSION['visites'] as $key => $value ){ ?>
  <tr>
    <td><?php echo $key; ?></td>
    <td><?php echo $value; ?></td>
  </tr>
 <?php }?>
</table>

<form> <input type="button" value="GO BACK" onclick="history.go(-1)"> </form>

