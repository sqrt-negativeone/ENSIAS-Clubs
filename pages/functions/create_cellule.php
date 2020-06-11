<?php 
	session_start();
	require_once '../../../pfa_db_connection/connexion.php'; 

	if (isset($_POST['create_cellule'])) {
		$sql = "insert into cellule (intitule, id_club) values (?,?) ";
		$stmt = $pdo -> prepare($sql);
		$stmt -> execute([$_POST['intitule'], $_SESSION['id_club_for_event']]);

		if ($stmt -> rowCount() == 0) {
			$_SESSION['msg'] = "Erreur de chargement des données. Veuillez essayer plus tard.";
		}else{
			$_SESSION['msg'] = "Cellule créée avec succès.";
		}

		$_SESSION['context'] = "Création de cellule";
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
 ?>
