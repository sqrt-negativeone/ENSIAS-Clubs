<?php 
if (!isset($_SESSION['cne'])) {
	header("Location:../login.php");
}else{
	//GET USER INFO REGARDING THE CELL
	for ($i=0; $i < count($_SESSION['my_cells']); $i++) { 
		if ($_SESSION['my_cells'][$i]['id_cellule']==$_GET['i'] and $_SESSION['my_cells'][$i]['intitule']==$_GET['target']) {
			$cell=$_SESSION['my_cells'][$i];
			break;
		}
	}
	if (!isset($cell)) {
		//MSG NOT A MEMBER OF THIS CELL
		header("Location:../404.php");
	}else{
		require_once '../connect.php'; 
	    $sql_ncon="select * from responsable join etudiant using(cne) where id_cellule=? and date_r_fin is null";

	    $ncon_club=$pdo->prepare($sql_ncon);
	    $ncon_club->execute([$_GET['i']]);
	    $ncon_club->setFetchMode(PDO::FETCH_ASSOC);
	    $_SESSION['respo_cell']=$ncon_club->fetchAll();


	    //GET ALL MEMBERS OF THE CELL
	    $etat_insc='V';
	    $select_all_members="select * from inscription join etudiant using(cne)
	    		where id_cellule = ? and etat_insc=? and date_i_fin is null";
	    $stmt_all_members=$pdo->prepare($select_all_members);
	    $stmt_all_members->execute([$_GET['i'], $etat_insc]);
	    $stmt_all_members->setFetchMode(PDO::FETCH_ASSOC);
	    $_SESSION['all_cell_members']=$stmt_all_members->fetchAll();		
	    //SAVE ID_CELLULE TO CHANGE RESPONSABLE CELLULE
	    $_SESSION['id_cellule_for_change_resp']=$_GET['i'];

	    //GET ASSIGNED TASKS
	    // $sysdate = date('Y-m-d H:i:s');//and ? between t.date_deb_tache and t.date_fin_tache 
	    $get_tasks="select ta.id_tache, ta.justificatif, ta.etat, ta.remarque, t.desc_tache, t.date_deb_tache, t.date_fin_tache, t.titre_tache, e.cne, e.nom, e.prenom from tache_assignee ta join tache t using (id_tache) join etudiant e on(t.cne = e.cne) where ta.cne = ? and id_cellule = ? ";
	    $stmt_get_tasks=$pdo->prepare($get_tasks);
	    $stmt_get_tasks->execute([$_SESSION['cne'], $_GET['i']]);
	    $stmt_get_tasks->setFetchMode(PDO::FETCH_ASSOC);
	    $mes_taches = $stmt_get_tasks->fetchAll();

	    $_SESSION['my_tasks_to_do']=array();
	    $_SESSION['my_tasks_missed']=array();
	    $_SESSION['my_tasks_completed']=array();
	    //DISTIL TASKS
	    $sysdate = date('Y-m-d H:i:s');
	    // print_r($t);
	    $k=0;$l=0;$m=0;
	    for ($i=0; $i < count($mes_taches); $i++) { 
	    	if ( ($sysdate < $mes_taches[$i]['date_fin_tache'] and $sysdate > $mes_taches[$i]['date_deb_tache']) and $mes_taches[$i]['etat'] == 'NV' and $mes_taches[$i]['justificatif'] == '') {
	    		$_SESSION['my_tasks_to_do'][$k] = $mes_taches[$i];
	    		$k++;
	    	}elseif ($sysdate > $mes_taches[$i]['date_fin_tache'] and $mes_taches[$i]['etat'] == 'NV'and $mes_taches[$i]['justificatif'] == ''){
	    		$_SESSION['my_tasks_missed'][$l] = $mes_taches[$i];
	    		$l++;
	    	}elseif ($mes_taches[$i]['etat'] == 'V') {
	    		$_SESSION['my_tasks_completed'][$m] = $mes_taches[$i];
	    		$m++;
	    	}
	    }

	    //GET SUBMISSIONS FOR TASK I CREATED
	    if ((isset($cell['statut']) and $cell['statut'] == 'R') or $_SESSION['statut'] == 'PC') {
	    	$etat='NV';
	    	$get_tasks="select ta.id_tache, ta.cne, ta.date_submit, ta.justificatif, ta.etat, ta.remarque, t.desc_tache, t.date_deb_tache, t.date_fin_tache, t.titre_tache, e.cne, e.nom, e.prenom, e.photo from tache t join tache_assignee ta using (id_tache) join etudiant e on(ta.cne = e.cne) where t.cne = ? and ta.etat = ? and id_cellule = ? and ta.justificatif is not null order by date_deb_tache desc limit 1";
		    $stmt_get_tasks=$pdo->prepare($get_tasks);
		    $stmt_get_tasks->execute([$_SESSION['cne'], $etat, $_GET['i']]);
		    $stmt_get_tasks->setFetchMode(PDO::FETCH_ASSOC);
		    $_SESSION['submissions_task'] = $stmt_get_tasks->fetchAll();
	    }

	    
	}
}
 ?>

