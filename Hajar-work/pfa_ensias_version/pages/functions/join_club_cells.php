<?php
   	session_start();
	require_once '../../../../../pfa_db_connection/connexion.php';

	//DISPLAY THE CELLS OF THE CLUB FOR THE USER TO CHOOSE FROM
	if (isset($_POST['id_club'])) {
		$get_cells="select * from cellule where id_club=?";
	    $s_get_cells=$pdo->prepare($get_cells);
	    $s_get_cells->execute([$_POST['id_club']]);
	    $s_get_cells->setFetchMode(PDO::FETCH_ASSOC);

	    $_SESSION['cells_join_club'] = $s_get_cells->fetchAll();
        echo json_encode($_SESSION['cells_join_club']);
	}elseif (isset($_POST['submit_join']) and isset($_POST['join_club_cells'])) {
    	//INSERT INTO INSCRIPTION
    	$sysdate=date('Y-m-d H:i:s');
    	$etat_insc='NV';
    	$become_member="insert into inscription (id_cellule, cne, date_i_deb, etat_insc) values (?, ?, ?,?)";
    	$s_insert=$pdo->prepare($become_member);
    	for ($i=0; $i < count($_POST['join_club_cells']); $i++) { 
    		$s_insert->execute([$_POST['join_club_cells'][$i], $_SESSION['cne'], $sysdate, $etat_insc]);
    	}
    	//CREATE ALERT BOX TO DISPLAY MSG
    	$_SESSION['context']="Inscription dans un club";
    	$_SESSION['msg']='Votre demande a été enregistrée avec succés.';
    	header("Location:".$_SERVER['HTTP_REFERER']);
    }
		
 ?>