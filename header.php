<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="CSS.css" type="text/css" media="screen" />
 <title>Accueil</title>
</head>
<body>
 <div id="page">
   <div id="menu1">
     <a href="index.php"><img id="imageBanniere" src="Banner.jpg"></img><span id="banniere"></span></a>
   </div>
   <div id="menu2">
     <nav>
       <ul>
         <li><a href="index.php">Accueil</a></li>
         <li><a href="recherche.php">Recherche</a></li>
         <?php
         if (!isset($_SESSION['category'])) {
           echo '<li><a href="login.php">Connexion</a></li>';
         }
         ?>
         <?php
         if (!isset($_SESSION['category'])) {
           echo '<li><a href="register.php">Inscription</a></li>';
         }
         ?>
         <?php
         if (isset($_SESSION['category'])) {
           echo '<li><a href="logout.php">Déconnexion</a></li>';
         }
         ?>
         <?php
         if (isset($_SESSION['category'])) {
           echo '<li><a href="cart.php">Panier</a></li>';
         }
         ?>
         <?php
         if($_SESSION["category"] == "restaurateur") {
           echo '<li><a href="add.php">Ajouter un produit</a></li>';
         }
         ?>
         <?php
         if($_SESSION["category"] == "restaurateur") {
           echo '<li><a href="mes_ventes.php">Mes ventes</a></li>';
         }
         ?>
       </ul>
     </nav>
   </div>
