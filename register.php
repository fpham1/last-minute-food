<?php
include 'header.php';
?>

<?php

include 'db_connect.php';


if (isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$membertype = "";
	$rue = $_POST['rue'];
	$npa = $_POST['npa'];
	$ville = $_POST['ville'];

	if (isset($_POST['radio']))   // if ANY of the options was checked
	  $membertype = $_POST['radio'];    // echo the choice
	else
	  echo "Veuillez choisir un statut.";

	$sql = "INSERT INTO users (name, email, password, category, rue, npa, ville)
	VALUES ('$name', '$email', '$password', '$membertype', '$rue', '$npa', '$ville')";

	$result = mysqli_query($db, $sql);

	if($result){
		header("Location: login.php");
		exit;
	}else{
		echo "Something gone wrong...";
	}
}

?>

	<p>
		<h1>Inscription</h1>
	</p>

<form action="" method="POST">
  <input type="radio" name="radio" value="client">Client<br>
  <input type="radio" name="radio" value="restaurateur">Restaurateur<br>

	<p>
		<label for="email">Adresse e-mail</label></br>
		<input type="email" name="email" id="email">
	</p>
	<p>
		<label for="Nom">Nom</label></br>
		<input type="text" name="name" id="email" />
	</p>
	<p>
		<label for="Nom">Rue</label></br>
		<input type="text" name="rue" id="email" />
	</p>
	<p>
		<label for="Nom">NPA/Code postal</label></br>
		<input type="text" name="npa" id="email" />
	</p>
	<p>
		<label for="Nom">Ville</label></br>
		<input type="text" name="ville" id="email" />
	</p>
	<p>
		<label for="passe">Mot de passe</label></br>
		<input type="password" name="password" id="passe" />
	</p>

	<p>
		<input type="submit" name="submit" value="envoyer" id="envoyer"></input>
	</p>
</form>

</body>
</html>
