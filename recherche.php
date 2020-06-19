<?php
include 'header.php';
?>

		<h1>
			<p></p>
		</h1>
		<h2>Votre recherche</h2>
		<form class="" action="" method="get">
			<p><input id="barreRecherche" type="text" name="search" placeholder="    Rechercher..."></p>
			<p><input type='submit' class='acheterBouton' name='submit' value='Rechercher'></p>
		</form>
	</div>
</body>
</html>

<?php
include 'db_connect.php';
if (isset($_GET['submit'])){
	$pattern = $_GET['search'];
	$sql = "SELECT * FROM images WHERE nom LIKE '%$pattern%' OR text LIKE  '%$pattern%'";
	$result = mysqli_query($db, $sql);
	$sql_vendeur = "SELECT * FROM users WHERE name LIKE '%$pattern%' OR rue LIKE  '%$pattern%' OR npa LIKE  '%$pattern%' OR ville LIKE  '%$pattern%'";
	$result_vendeur = mysqli_query($db, $sql_vendeur);

if ($result->num_rows > 0){

	while ($row = mysqli_fetch_array($result)) {
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
}elseif($result_vendeur->num_rows > 0){

	while ($row_vendeur = mysqli_fetch_array($result_vendeur)) {
	$email_vendeur = $row_vendeur['email'];
	$sql69 = "SELECT * FROM images WHERE email = '$email_vendeur'";
	$result69 = mysqli_query($db, $sql69);

		while ($row69 = mysqli_fetch_array($result69)){

		echo "<div class='feedPlats'>
			<form action='' method='POST'>
			<input type='hidden' name='id' value='".$row69['id']."' />
			<p>
				<a href='plat.php'><img class='imagePlat' src='images/".$row69['image']."'></img></a>
			</p>
			<p class='nomDuPlat'>
				".$row69['nom']."
			</p>
			<p class='descriptionPlat'>
				".$row69['text']."
			</p>
			<p class='prixPlat'>
				Prix: </br>
				".$row69['prix']."
			</p>
			<p class='vendeurPlat'>
				Vendeur: </br>
				".$row_vendeur['name']."
			</p>
			<p class='adressePlat'>
				Adresse: </br>
				".$row_vendeur['rue']." </br>
				".$row_vendeur['npa'].", ".$row_vendeur['ville']."
			</p>
			<p align='right'>
				<button class='acheterBouton' type='submit' name='panier'>Ajouter au panier</button>
			</p>
			</form>
		</div>";
		}
	}
}else{
	echo 'Aucun résultat.';
}
}
 ?>
