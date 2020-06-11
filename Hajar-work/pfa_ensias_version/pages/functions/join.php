<?php
session_start();
include '../../../../../pfa_db_connection/connexion.php';

if (isset($_POST['join_cell'])) {
	$id_cellule = $_POST['id_cellule'];
	$date_i_deb = date('Y-m-d H:i:s');
	$etat_insc = 'NV';

	$sql = "insert into inscription (id_cellule, cne, date_i_deb, etat_insc) values (?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id_cellule, $_SESSION['cne'], $date_i_deb, $etat_insc]);

	$_SESSION['context'] = "Demande d'inscription dans une cellule";
	if ($stmt->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez réessayer ultérieurement.";
	} else {
		$_SESSION['msg'] = "Demande enregistrée avec succès.";
	}
	header("Location:" . $_SERVER['HTTP_REFERER']);
}
