<?php 
session_start();
include '../../../../../pfa_db_connection/connexion.php';

if (isset($_POST['validate'])) {
	$cne = $_POST['cne'];
	$id_cellule = $_POST['id_cellule'];
	$etat_insc = 'V';
	$sysdate = date('Y-m-d H:i:s');

	$validate_req = "update inscription set etat_insc = ? , date_i_deb = ? where cne = ? and id_cellule = ?";
	$s_validate_req = $pdo->prepare($validate_req);
	$s_validate_req->execute([$etat_insc, $sysdate, $cne, $id_cellule]);

	$_SESSION['context'] = "Demandes d'inscription";

	if ($s_validate_req->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de validation du compte. Veuillez réessayer ultérieurement.";
	}else{
		$_SESSION['msg'] = "Membre ajouté avec succès.";
	}

	header("Location:".$_SERVER['HTTP_REFERER']);
}elseif (isset($_POST['delete'])) {
	$cne = $_POST['cne'];
	$id_cellule = $_POST['id_cellule'];
	$etat_insc = 'NV';

	$delete_req = "delete from inscription where cne = ? and id_cellule = ? and etat_insc = ?";
	$s_delete_req = $pdo->prepare($delete_req);
	$s_delete_req->execute([$cne, $id_cellule, $etat_insc]);

	$_SESSION['context'] = "Demandes d'inscription";

	if ($s_delete_req->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de suppression du compte. Veuillez réessayer ultérieurement.";
	}else{
		$_SESSION['msg'] = "Demande supprimée avec succès.";
	}

	header("Location:".$_SERVER['HTTP_REFERER']);
}
 ?>