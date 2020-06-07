<?php 
	require_once '../connect.php'; 
	$s_filiere="select * from filiere";
	$stmt_filiere=$pdo->query($s_filiere);
	$filiere=$stmt_filiere->fetchAll(PDO::FETCH_ASSOC);

 ?>