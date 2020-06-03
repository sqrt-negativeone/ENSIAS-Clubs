<?php 
session_start();
include '../../../../../pfa_db_connection/connexion.php';

if (isset($_POST['create_event'])) {
	$titre = $_POST['titre'];
	$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$type = $_POST['type'];
	$date_deb = $_POST['date_deb'];
	$date_fin = $_POST['date_fin'];
	$desc = $_POST['descr_event'];

	try {
		$pdo->beginTransaction();
		$insert_event = "insert into evenement (date_deb, date_fin, titre, nature, photo, descr_event) values (?,?,?,?,?,?) ";
		$s_insert_event = $pdo->prepare($insert_event);
		$s_insert_event->execute([$date_deb, $date_fin, $titre, $type, $photo, $desc]);

		$id_event = $pdo->lastInsertId();

		$insert_org = "insert into organisation (id_club, id_event) values (?,?) ";
		$s_insert_org = $pdo->prepare($insert_org);
		$s_insert_org->execute([$_SESSION['id_club_for_event'], $id_event]);

		$pdo->commit();
		$_SESSION['context'] = "Ajout d'un évènement";
		$_SESSION['msg'] = "Évènement ajouté avec succès.";
		header("Location:".$_SERVER['HTTP_REFERER']);
	} catch (Exception $e) {
		$pdo->rollBack();
		$_SESSION['context'] = "Ajout d'un évènement";
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez réessayer ultérieurement.";
		header("Location:".$_SERVER['HTTP_REFERER']);
	}
	
}
 ?>