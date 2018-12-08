<?php
//parametres connexion
	define("MYHOST","localhost");
	define("MYUSER","root");
	define("MYPASS","");
	$base="biblio";
//se connecter a la base de données 
	$base="biblio";
	$idcom=@mysql_connect(MYHOST,MYUSER,MYPASS);
	$idbase=@mysql_select_db($base);

?>