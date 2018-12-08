<?php 
	session_start();
	$id_client = $_SESSION['id'];

	include('../included/parametres.php');

/*
			echo "<script>
						alert('veuilez entrer l'Id du livre à commander !');
						window.location.href='commande.php';
				</script>";*/
	
	
$id_livre = $_POST['id_livre'];
$id = $id_livre;

$requete="SELECT * FROM livre WHERE id_livre=$id";

//requete de selection
$result=@mysql_query($requete,$idcom);
$nbart=mysql_num_rows($result);

	if ($nbart >= 1) 
	{

	//table commander
		$requete2="INSERT INTO commande (`id`, `id_client`, `id_livre`)  VALUES(NULL ,'$id_client','$id_livre')";
				$result2=@mysql_query($requete2,$idcom);

				if ($result2) 
				{
					echo "<script>
								alert('la commande envoyé :)');
								window.location.href='users.php';
							</script>";
				 }
	}else
	{
		echo "<script>
					alert('le livre indiqué introuvable !');
					window.location.href='commande.php';
				</script>";
				

	}

?>