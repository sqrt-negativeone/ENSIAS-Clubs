<?php 
session_start();
require_once '../../../../../pfa_db_connection/connexion.php'; 

if (isset($_POST['submit_task']) and isset($_POST['id_tache'])) {

	$justif = file_get_contents($_FILES['tache']['tmp_name']);
	$date = date('Y-m-d H:i:s');
	//UPDATE JUSTIF IN TACHE_ASSIGNEE TABE
	$add_justif = "update tache_assignee set justificatif = ?, date_submit = ? where id_tache = ? and cne = ?";
	$stmt_add_justif=$pdo->prepare($add_justif);
	$stmt_add_justif->execute([$justif, $date, $_POST['id_tache'], $_SESSION['cne']]);

	$_SESSION['context'] = "Remise de tâche";

	if ($stmt_add_justif->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de chargement du document. Veuillez essayer ultérieurement.";
	}else{
		$_SESSION['msg'] = "Document remis avec succés.";
	}

	header("Location:".$_SERVER['HTTP_REFERER']);

 } ?>