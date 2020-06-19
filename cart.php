<?php
include 'header.php';
?>

<h1>
	<p></p>
</h1>


	<h2>
		<p>Votre caddie</p>
	</h2>

		<?php

		include 'db_connect.php';

		session_start();

		$cart=$_SESSION['cart'];

		if(isset($_POST['supprimer'])){
			$delete = $_POST['id'];
			unset($cart[$delete]);
			$_SESSION['cart']=$cart;
			header("Location: cart.php");
		}

		foreach ($_SESSION['cart'] as $key => $value) {

			$sql="SELECT * from images WHERE id = '$value'";
			$result = mysqli_query($db, $sql);

			while ($row = mysqli_fetch_array($result)){
				$email = $row['email'];
				$sql2 = "SELECT * FROM users WHERE email = '$email'";
				$result2 = mysqli_query($db, $sql2);

				while ($row2 = mysqli_fetch_array($result2)){

				echo "<div class='feedPlats'>
					<form action='' method='POST'>
					<input type='hidden' name='id' value='".$key."' />
					<p>
						<a href='plat.php'><img class='imagePlat' src='images/".$row['image']."'></img></a>
					</p>
					<p class='nomDuPlat'>
						".$row['nom']."".$key."
					</p>
					<p class='descriptionPlat'>
						".$row['text']."
					</p>
					<p class='prixPlat'>
						Prix: </br>
						".$row['prix']."
					</p>
					<p class='vendeurPlat'>
						Vendeur: </br>
						".$row2['name']."
					</p>
					<p class='adressePlat'>
						Adresse: </br>
						".$row2['rue']." </br>
						".$row2['npa'].", ".$row2['ville']."
					</p>
					<p align='right'>
						<button class='acheterBouton' type='submit' name='supprimer'>Retirer du panier</button>
					</p>
					</form>
				</div>";
				}
			}
		}
		?>

	</div>
</body>
</html>
