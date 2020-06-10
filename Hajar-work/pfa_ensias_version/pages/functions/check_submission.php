<?php
session_start();
require_once '../../../../../pfa_db_connection/connexion.php'; 
if (isset($_POST['check_task'])) {
	$etat = 'V';
	$check_submit = "update tache_assignee set etat = ?, remarque = ? where id_tache = ? and cne = ?";
	$stmt_check_submit = $pdo->prepare($check_submit);
	$stmt_check_submit->execute([$etat, $_POST['rmq'], $_POST['id_tache'], $_POST['cne']]);

	$_SESSION['context'] = "Feedback sur soumission de tâche";

	if ($stmt_check_submit->rowCount() == 0) {
		$_SESSION['msg'] = "Erreur de chargement des données. Veuillez essayer ultérieurement.";
	}else{
		$_SESSION['msg'] = "Feedback sauvegardé avec succés.";
	}

	header("Location:".$_SERVER['HTTP_REFERER']);
} 
 ?>