<?php
session_start();
include '../../../pfa_db_connection/connexion.php';

if (isset($_POST['create_event'])) {
	$titre = $_POST['titre'];
	$photo = file_get_contents($_FILES['photo']['tmp_name']);
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
		header("Location:" . $_SERVER['HTTP_REFERER']);
	} catch (Exception $e) {
		$pdo->rollBack();
		$_SESSION['context'] = "Ajout d'un évènement";
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez réessayer ultérieurement.";
		header("Location:" . $_SERVER['HTTP_REFERER']);
	}
} else if (isset($_POST['delete_event'])) {
	$id_event = $_POST['id_event'];

	try {
		$pdo->beginTransaction();

		$del_org = "delete from organisation where id_club = ? and id_event = ? ";
		$s_del_org = $pdo->prepare($del_org);
		$s_del_org->execute([$_SESSION['id_club_for_event'], $id_event]);
		if ($s_del_org->rowCount() == 0) throw new Exception("erreur");

		$del_event = "delete from evenement where id_event = ?";
		$s_del_event = $pdo->prepare($del_event);
		$s_del_event->execute([$id_event]);
		if ($s_del_event->rowCount() == 0) throw new Exception("erreur");

		$pdo->commit();
		$_SESSION['context'] = "Suppression d'un évènement";
		$_SESSION['msg'] = "Évènement supprimé avec succès.";
		header("Location:" . $_SERVER['HTTP_REFERER']);
	} catch (Exception $e) {
		$pdo->rollBack();
		$_SESSION['context'] = "Suppression d'un évènement";
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez réessayer ultérieurement.";
		header("Location:" . $_SERVER['HTTP_REFERER']);
	}
} else if (isset($_POST['modify_event'])) {
	$id_event = $_POST['id_event'];
	$type = $_POST['type'];
	$desc = $_POST['descr_event'];
	$exec_array = [$desc, $type];

	$sql = "update evenement set descr_event = ?, nature = ?";

	//TEST ON PICTURE
	if ($_FILES['photo']['tmp_name'] != '') {
		$photo = file_get_contents($_FILES['photo']['tmp_name']);
		$sql .= ", photo = ?";
		array_push($exec_array, $photo);
	}
	if ($_POST['date_deb'] != '') {
		$date_deb = $_POST['date_deb'];
		$sql .= ", date_deb = ?";
		array_push($exec_array, $date_deb);
	}
	if ($_POST['date_fin'] != '') {
		$sql .= ", date_fin = ?";
		$date_fin = $_POST['date_fin'];
		array_push($exec_array, $date_fin);
	}
	if (trim($_POST['titre']) != '') {
		$sql .= ", titre = ?";
		$titre = $_POST['titre'];
		array_push($exec_array, $titre);
	}
	//COMPLETE QUERY
	$sql .= " where id_event = ?";
	array_push($exec_array, $id_event);

	$stmt = $pdo->prepare($sql);
	$stmt->execute($exec_array);

	// print_r($exec_array);
	// echo $sql;
	$_SESSION['context'] = "Mise à jour d'un évènement";
	if ($stmt->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez réessayer ultérieurement.";
	} else {
		$_SESSION['msg'] = "Évènement mis à jour avec succès";
	}
	header("Location:" . $_SERVER['HTTP_REFERER']);
}
