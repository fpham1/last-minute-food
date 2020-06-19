<?php
include 'header.php';
?>

<form method="post" action="">

    <h1>Connexion</h1>

    <div class="form-group">
      <label class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="email" placeholder="Votre e-mail">
      </div>
    </div><br/><br/><br/>

    <div class="form-group">
      <label class="col-lg-2 control-label">Mot de passe</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">
      </div>
    </div>

<br/><br/><center><button type="submit" name="submit" class="btn btn-primary" onclick="window.location='connected.php';">Connexion</button></center>
</form><!-- onclick redirige vers connected.php -->
</div> <!-- /div de id="page" -->
</body>
</html>

<?php

include 'db_connect.php';

$email = '';
$type = '';

session_start();
$_SESSION['type']=$email;
$_SESSION['mail']=$type;

if (isset($_POST['submit'])){

	$myemail = $_POST['email'];
	$mypassword = $_POST['password'];
	$type="";

	$sql = "SELECT id, category, email, rue, npa, ville FROM users WHERE email = '$myemail' and password = '$mypassword'";
	$result = mysqli_query($db, $sql);

	if($result->num_rows > 0) {

		$row = mysqli_fetch_array($result);

		session_start();
		$_SESSION['email'] = $row['email'];
		$_SESSION['category'] = $row['category'];
    $_SESSION['rue'] = $row['rue'];
    $_SESSION['npa'] = $row['npa'];
    $_SESSION['ville'] = $row['ville'];

		header("Location: index.php");
		exit;

	}else {
		  echo "Votre adresse e-mail ou mot de passe est incorrect.";
	}
}
?>
