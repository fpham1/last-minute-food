<?php

include 'header.php';
session_start();

if (isset($_POST['panier'])){
	if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
		array_push($_SESSION['cart'], $_POST['id']);
	}else{
		array_push($_SESSION['cart'], $_POST['id']);
	}
}

?>

		<h1>
			<p></p>
		</h1>

		<h2>
			<p>Derniers ajouts</p>
		</h2>
		<div class="feedPlatsPrincipal">

			<?php

			include 'db_connect.php';

			$sql="SELECT * from images";
			$result = mysqli_query($db, $sql);

			while ($row = mysqli_fetch_array($result)){
				$email = $row['email'];
				$sql2 = "SELECT * FROM users WHERE email = '$email'";
				$result2 = mysqli_query($db, $sql2);

				while ($row2 = mysqli_fetch_array($result2)){

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
						<button class='acheterBouton' type='submit' name='panier'>Ajouter au panier</button>
					</p>
					</form>
				</div>";
				}
			}

			 ?>

		</div>

	</div>
</body>
</html>
