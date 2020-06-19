<?php
include 'db_connect.php';
include 'header.php';
session_start();
$id = $_SESSION['id'];

$sql = "SELECT * from images WHERE id = '$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['upload'])) {

}
?>

<h2><p>Modifier votre produit</p></h2>


<form action="" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="size" value="10000000">
   <div>
     <img class='imagePlat' src='images/<?php echo $row['image']; ?>'>
     <br/><input type="file" name="image">
   </div>

   <br/>
   <br/>

   <div class="">
     <label for=""><?php echo $row['nom']; ?></label>
     <br/><input type="text" name="nom">
   </div>

   <br/>
   <br/>

   <div>
     <label for=""><?php echo $row['text']; ?></label>
     <br/><textarea name="text" rows="4" cols="40" placeholder="Say something about this food..."></textarea>
   </div>

   <br/>
   <br/>

   <div class="">
     <label for=""><?php echo $row['prix']; ?></label>
     <br/><input type="text" name="prix">
   </div>

   <br/>
   <br/>

   <div class="">
     <input type="submit" class="acheterBouton" name="upload" value="Modifier le produit">
   </div>
 </form>
