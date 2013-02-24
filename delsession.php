
<form method="post" action="index.php?p=delsession">
	
<?php
session_start();
session_destroy();
?>
		Session effacée!
</form>
