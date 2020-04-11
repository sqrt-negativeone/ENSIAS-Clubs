<?php 
include "connexion.php";

$select_info="select * from etudiant where photo IS NOT NULL and temoignage IS NOT NULL count 5";
$stmt_select=$pdo->query($select_info);

if ($stmt_select->rowCount()==5) {
	# code...
	$stmt_select->setFetchMode(PDO::FETCH_ASSOC);

	while ($row=$stmt_select->fetch()) {
		# code...

		
	}
}
 ?>