<?php
session_start();
require_once '../../../pfa_db_connection/connexion.php';

if (isset($_POST['create_club'])) {
	$sql = "insert into club (nom_club, acro_club, texte_desc) values (?,?,?) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_POST['name'], $_POST['acro'], $_POST['descr']]);

	if ($stmt->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez essayer plus tard.";
	} else {
		$_SESSION['msg'] = "Club créé avec succès.";
	}

	$_SESSION['context'] = "Création de club";
	header("Location:" . $_SERVER['HTTP_REFERER']);
}
