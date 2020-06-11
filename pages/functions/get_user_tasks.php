<?php
session_start();
require_once '../../../pfa_db_connection/connexion.php';

if (isset($_POST['cne'])) {
	$get_tasks = "select ta.id_tache, ta.justificatif, ta.etat, ta.remarque, t.desc_tache, t.date_deb_tache, t.date_fin_tache, t.titre_tache, e.cne, e.nom, e.prenom from tache_assignee ta join tache t using (id_tache) join etudiant e on(t.cne = e.cne) where ta.cne = ? and id_cellule = ? ";
	$stmt_get_tasks = $pdo->prepare($get_tasks);
	$stmt_get_tasks->execute([$_POST['cne'], $_SESSION['id_cellule_for_change_resp']]);
	$stmt_get_tasks->setFetchMode(PDO::FETCH_ASSOC);
	$mes_taches = $stmt_get_tasks->fetchAll();

	$_SESSION['my_tasks_to_do'] = array();
	$_SESSION['my_tasks_missed'] = array();
	$_SESSION['my_tasks_completed'] = array();
	//DISTIL TASKS
	$sysdate = date('Y-m-d H:i:s');
	// print_r($t);
	$k = 0;
	$l = 0;
	$m = 0;
	for ($i = 0; $i < count($mes_taches); $i++) {
		if (($sysdate < $mes_taches[$i]['date_fin_tache'] and $sysdate > $mes_taches[$i]['date_deb_tache']) and $mes_taches[$i]['etat'] == 'NV' and $mes_taches[$i]['justificatif'] == '') {
			$_SESSION['my_tasks_to_do'][$k] = $mes_taches[$i];
			$k++;
		} elseif ($sysdate > $mes_taches[$i]['date_fin_tache'] and $mes_taches[$i]['etat'] == 'NV' and $mes_taches[$i]['justificatif'] == '') {
			$_SESSION['my_tasks_missed'][$l] = $mes_taches[$i];
			$l++;
		} elseif ($mes_taches[$i]['etat'] == 'V') {
			$_SESSION['my_tasks_completed'][$m] = $mes_taches[$i];
			$m++;
		}
	}


	$_SESSION['confirm'] = 'yes';
	echo 'yeees';
	//header("Location:".$_SERVER['HTTP_REFERER']);
}
