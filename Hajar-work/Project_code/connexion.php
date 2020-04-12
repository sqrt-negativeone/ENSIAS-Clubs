<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php  
   //Se connecter à ma base de données pfa_ensias
   $user="root";
   $pw="root";
   try {
   	$pdo=new PDO("mysql:host=localhost;dbname=pfa_ensias", $user, $pw);
      $pdo->query("SET NAMES 'UTF8'");
   } catch (PDOException $e) {
   	echo $e->getMessage();
   	exit();
   }
?>
</body>
</html>