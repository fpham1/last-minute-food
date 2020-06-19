<?php
session_start();

?>

<?php
include 'db_connect.php';
include 'header.php';
?>

<?php
  session_start();
  // if upload button is pressed
  if (isset($_POST['upload'])) {
    // path to store uploaded images
    $target = "images/".basename($_FILES['image']['name']);

    //get submitted data from the form
    $image = $_FILES['image']['name'];
    $nom = $_POST['nom'];
    $text = $_POST['text'];
    $prix = $_POST['prix'];
    $email = $_SESSION['email'];

    $sql = "INSERT INTO images (image, nom, text, prix, email) VALUES ('$image', '$nom', '$text', '$prix', '$email')";
    mysqli_query($db, $sql); //store submitted data into the database table

    //move the uploaded image into the folder : images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "Produit ajouté !";
    }else{
      echo "Failed to upload image";
    }
  }


 ?>

		<h1>
			<p></p>
		</h1>

		<h2>
			<p>Ajout d'un produit</p>
		</h2>
    <div class="content">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="size" value="10000000">
      <div>
        <label for="">Image</label></br>
        <input type="file" name="image">
      </div>
      <br/>
      <br/>
      <div class="">
        <label for="">Nom du plat</label><br>
        <input type="text" name="nom">
      </div>
      <br/>
      <br/>
      <div>
        <label for="">Description</label></br>
        <textarea name="text" rows="4" cols="40" placeholder="Say something about this food..."></textarea>
      </div>
      <br/>
      <br/>
      <div class="">
        <label for="">Prix</label><br>
        <input type="text" name="prix">
      </div>
      <br/>
      <br/>
      <div class="">
        <input type="submit" class="acheterBouton" name="upload" value="Ajouter le produit">
      </div>
    </form>
  </div>
