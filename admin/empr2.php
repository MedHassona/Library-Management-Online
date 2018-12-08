<?php 
	session_start();

	include('../included/parametres.php');
if (isset($_POST['commander'])) {

if(!empty($_POST['id_livre']) )
{	
	
	$id_livre= $_POST['id_livre'];
	$id_client = $_SESSION['id'];

$id = $id_livre;

$requete="SELECT * FROM livre WHERE id_livre=$id";

//requete de selection
$result=@mysql_query($requete,$idcom);

if ($result) 
{
	$ligne=mysql_fetch_array($result,MYSQL_ASSOC);
	$nqte = $ligne['qte'];
	$nqte--;
	$requete1="UPDATE `livre` SET  `qte` = '$nqte' WHERE `livre`.`id_livre` = '$id_livre';";
	$result1=@mysql_query($requete1,$idcom);

//table emprunter
	$requete2="INSERT INTO emprunter VALUES('$id_client','$id_livre',CURDATE(),ADDDATE(CURDATE(), INTERVAL 1 MONTH))";
			$result3=@mysql_query($requete2,$idcom);

	if ($result1 && $result3) 
	{
			

			//requete de selection
			$result2=@mysql_query($requete,$idcom);
			$ligne=mysql_fetch_array($result2,MYSQL_ASSOC);

			echo"<h4> vous avez emprunté : </h4>";
			echo "<table border=\"1\"> <tr>";
			foreach($ligne as $nomcol=>$valcol)
			{ 
				echo " <th> $nomcol </th>"; 
			}
				echo "<tr>";

				echo "<tr>";

			do
			{
				echo "<tr>";
				foreach($ligne as $valcol)
				{
				 	echo "<td> $valcol </td>"; 
				}
				echo "</tr>";

			} while($ligne=mysql_fetch_array($result,MYSQL_NUM));
				echo "</table>";
	}else //si non on laisse l'ancienne valeur de la quantité
	{
		$nqte++;
		$requete1="UPDATE `livre` SET  `qte` = '$nqte' WHERE `livre`.`id_livre` = '$id_livre';";
		$result1=@mysql_query($requete1,$idcom);
		echo "vous n'avez plus le droit d'emprinter des livres :/";
		

	}

}
// récupération et affichage des données
	

}else {echo "<script>
			alert('veuilez entrer l'Id du livre à commander !');
			window.location.href='commande.php';
			</script>";
}
}


?>