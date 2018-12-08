<?php 

	session_start();

	session_destroy();

	header('Location:../biblio.php')
?>