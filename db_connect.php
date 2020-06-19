<?php
$dbservername = "localhost";
$dbusername = "id1389602_tqn";
$dbpassword = "kukunonen";
$dbdatabase = "id1389602_lmf";

// Create connection
$db = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbdatabase);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

?>
