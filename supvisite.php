<?php
session_start();
unset($_SESSION['visites'][$_GET['idBien']]);


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php?p=voirvisites';
header("Location: http://$host$uri/$extra");
exit;

?>

