<?php
session_start();
include '../../../pfa_db_connection/connexion.php';

if (isset($_POST['quit_cell']) and isset($_POST['id_cellule'])) {
	//Statut de l'utilisateur
	$statut = $_POST['statut'];

	$_SESSION['context'] = "Quitter une cellule";
	if ($statut == 'PC') {
		$_SESSION['msg'] = "Un président ne peut pas quitter une cellule de son club.";

		header("Location:" . $_SERVER['HTTP_REFERER']);
	} else if ($statut == 'R') {

		$sysdate = date('Y-m-d H:i:s');
		$sql = "update responsable set date_r_fin = ? where cne = ? and id_cellule = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$sysdate, $_SESSION['cne'], $_POST['id_cellule']]);

		if ($stmt->rowCount() == 0) {
			$_SESSION['msg'] = "Nous étions ravis de vous avoir parmi nous. Au revoir!";
		} else {
			$_SESSION['msg'] = "Une erreur s'est produite. Réessayez plus tard!";
		}
		header("Location:../index.php");
	} else if ($statut == 'M') {
		$sysdate = date('Y-m-d H:i:s');
		$sql = "update inscription set date_i_fin = ? where cne = ? and id_cellule = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$sysdate, $_SESSION['cne'], $_POST['id_cellule']]);

		if ($stmt->rowCount() == 0) {
			$_SESSION['msg'] = "Nous étions ravis de vous avoir parmi nous. Au revoir!";
		} else {
			$_SESSION['msg'] = "Une erreur s'est produite. Réessayez plus tard!";
		}
		header("Location:../index.php");
	}
}
