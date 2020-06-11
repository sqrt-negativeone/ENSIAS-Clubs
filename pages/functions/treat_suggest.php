<?php
session_start();
require_once '../../../pfa_db_connection/connexion.php';

if (isset($_POST['submit_suggest'])) {
	$nature = $_POST['nature'];
	$sujet = $_POST['sujet'];
	$dest = $_POST['dest'];
	$descr = $_POST['descr'];
	$sysdate = date("Y-m-d H:i:s");
	$etat = 'NV';

	$sql = "insert into avis_etudiant (date_avis, nature, sujet, descr, cne, id_club, etat) values (?,?,?,?,?,?,?) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$sysdate, $nature, $sujet, $descr, $_SESSION['cne'], $dest, $etat]);

	if ($stmt->rowCount() == 0) {
		$_SESSION['msg'] = 'Erreur de chargement des données. Veuillez réessayer ultérieurement';
	} else {
		$_SESSION['msg'] = 'Votre avis est inséré avec succès.';
	}

	$_SESSION['context'] = 'Suggéstions des étudiants';

	header("Location:" . $_SERVER['HTTP_REFERER']);
} elseif (isset($_POST['remarque_sug'])) {
	$remarque = $_POST['rmq'];
	$id_avis = $_POST['id_avis'];
	$etat = 'V';

	$sql = "update avis_etudiant set remarque = ?, etat = ? where id_avis = ? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$remarque, $etat, $id_avis]);

	if ($stmt->rowCount() == 0) {
		$_SESSION['msg'] = 'Erreur de chargement des données. Veuillez réessayer ultérieurement';
	} else {
		$_SESSION['msg'] = 'Votre remarque est insérée avec succès.';
	}

	$_SESSION['context'] = 'Répondre à des suggéstions';

	header("Location:" . $_SERVER['HTTP_REFERER']);
}
