<?php 
/* $servername = "sql201.epizy.com";
$username = "epiz_25948047";
$password = "3rhHsfre0SoC";
$db_name = "epiz_25948047_ensiasclubs"; */

$servername = "localhost";
$username = "root";
$password = ""; 
$db_name = "pfa_ensias";


try {
  $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>