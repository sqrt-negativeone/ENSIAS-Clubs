<?php  
   //Se connecter à ma base de données pfa_ensias
   $user="root";
   $pw="root";
   try {
   	$pdo=new PDO("mysql:host=localhost;dbname=pfa_ensias", $user, $pw);
    $pdo->query("SET NAMES 'UTF8'");
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

   } catch (PDOException $e) {
   	echo $e->getMessage();
   }
?>
