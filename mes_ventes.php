<?php
include 'header.php';
include 'db_connect.php';

if (isset($_POST['supprimer'])){

	$id = $_POST['id'];
	$delete = "DELETE FROM images WHERE id = '$id'";

	if (mysqli_query($db, $delete)) {
		echo "La vente a bien été retirée.";
	}else{
		echo "Fail";
	}
}

if (isset($_POST['modifier'])){
	session_start();
	$_SESSION['id']=$_POST['id'];
	header("Location: modifier.php");
}

?>

		<h1>
			<p></p>
		</h1>

		<h2>
			<p>Vos ventes</p>
		</h2>
		<div class="feedPlatsPrincipal">
      <?php

      include 'db_connect.php';

			session_start();
			$session = $_SESSION['email'];
      $sql="SELECT * from images WHERE email = '$session'";
      $result = mysqli_query($db, $sql);

      while ($row = mysqli_fetch_array($result)){

				echo "<div class='feedPlats'>
					<form action='' method='POST'>
					<input type='hidden' name='id' value='".$row['id']."' />
					<p>
						<a href='plat.php'><img class='imagePlat' src='images/".$row['image']."'></img></a>
					</p>
					<p class='nomDuPlat'>
						".$row['nom']."
					</p>
					<p class='descriptionPlat'>
						".$row['text']."
					</p>
					<p class='prixPlat'>
						Prix: </br>
						".$row['prix']."
					</p>
					<p align='right'>
						<button class='acheterBouton' type='submit' name='modifier'>Modifier</button>
						<button class='acheterBouton' type='submit' name='supprimer'>Supprimer</button>
					</p>
					</form>
				</div>";
			}

       ?>

		</div>
