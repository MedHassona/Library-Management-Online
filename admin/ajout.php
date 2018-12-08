<?php session_start(); ?>

<html>
<head>
<title>nouveau livre Infos</title>
 		<meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="../style/style-admin.css">
</head>
<body class="autre-body">
<header>
	<div class="up-div">
		<div class="logout">
			<a href="logout.php" class="dec">Déconnexion</a>
		</div>
		
	</div>
	<div class="mid-div">
		<a href="cherche.php" class="btn cher">chercher</a>
		<a href="../commun/livre.php" class="btn liv">livres</a>
		<a href="supr.php" class="btn sup">suprimer</a>
		<a href="update1.php" class="btn upd">update</a>
		<a href="ajout.php" class="btn upd">ajouter</a><br/><br/><br><br>
		<a href="emprunte.php" class="btn emp">emprintés</a>
		<a href="commande.php" class="btn com">commandes</a>
		<a href="" class="btn env">envoi notificatio</a>
		<a href="admin.php" class="btn hom">page home</a>
	</div>
</header>
<div class="infos">
	<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post" ><br><br>
		<input type="text" name="id_livre" placeholder="Id livre"><br><br>
		<input type="text" name="titre" placeholder="Titre "><br><br>
		<input type="text" name="nom_aut" placeholder="Auteur"><br><br>
		<input type="text" name="qte" placeholder="Quantité "><br><br>
		<input type="text" name="ray" placeholder="Rayon "><br><br>
		<input type="submit" value="ajouter" name="submit">
	</form>
</div>

<?php 
include('../included/parametres.php');
	
if (isset($_POST['submit'])) {
	


if( !empty($_POST['nom_aut']) && !empty($_POST['ray']) && !empty($_POST['titre']) )
{
	$id_livre = $_POST['id_livre'];$titre=$_POST['titre']; $qte=$_POST['qte']; $nom_aut=$_POST['nom_aut'];
	 $ray=$_POST['ray'];

	 //Requête SQL
		$requete="INSERT INTO livre VALUES('$id_livre','$titre','$nom_aut','$ray','$qte')";

	//controle des entrées		
			if ($idcom) 
			{				
				$result=mysql_query($requete,$idcom);
				if(!$result)
				{
					echo "<h2>Erreur d'insertion \n n˚",mysql_errno()," : ",mysql_error()."</h2>";
				}else echo " <script>
								alert('Livre ajouté ');
								window.location.href='admin.php';
							</script>";
			}else echo " <script>
								alert('connexion failed :')!
								window.location.href='admin.php';
						</script>";
}else  {
			echo " <script>
						alert('Remplir les infos du nouveau livre !');
						window.location.href='ajout.php';
					</script>";
} 
}


?>

</body>
</html>