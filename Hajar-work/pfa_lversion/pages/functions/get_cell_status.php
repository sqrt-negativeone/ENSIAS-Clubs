<?php 
    //TODO: get user status in the cellule from db
    //NOT LOGGED IN AND LOGGED IN USERS -> Club Presentation
	require_once '../../../../pfa_db_connection/connexion.php'; 
    $sql_ncon="select * from club where id_club=? and acro_club=?";

    $ncon_club=$pdo->prepare($sql_ncon);
    $ncon_club->execute([htmlspecialchars($_GET['i']),htmlspecialchars($_GET['target'])]);
    $ncon_club->setFetchMode(PDO::FETCH_ASSOC);
    if ($row=$ncon_club->fetch()) {
    	$n_club=$row;
    }else{
    	//redirect to 404 maybe
    	header('Location:404.php');
    }
    //GET THE CLUB EVENTS
    $sql_event="select * from organisation join evenement using(id_event) where id_club=?";
    $event_club=$pdo->prepare($sql_event);
    $event_club->execute([$_GET['i']]);
    $event_club->setFetchMode(PDO::FETCH_ASSOC);
    $events=$event_club->fetchAll();

    $is_connected=false;	
    //if statut=='PC' et club != adei -> cellules
    //if statut=='PC' et club == adei -> cellules + changer president
    //if statut=='PC' et club != adei -> cellules 
    //ONLY LOGGED IN USERS
    if (isset($_SESSION['cne'])) {
    	if ($_SESSION['jclubs'][count($_SESSION['jclubs'])-1]['id_club']==htmlspecialchars($_GET['i'])) {
        	$_SESSION['statut']='PC';
        	//DISPLAY ALL CELLS
        	$cells_pres="select * from cellule where id_club=?";
	        $cells_pres=$pdo->prepare($cells_pres);
	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $my_cells=$cells_pres->fetchAll();
	    }elseif ($_SESSION['cne']==$_SESSION['p_adei']['cne']) {
	    	$_SESSION['statut']='PA';
	    	//DISPLAY ALL CELLS
        	$cells_pres="select * from cellule where id_club=?";
	        $cells_pres=$pdo->prepare($cells_pres);
	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $my_cells=$cells_pres->fetchAll();
	        //GET CLUB PRESIDENT
	        $club_pres="select * from club join etudiant using(cne) where id_club=?";
	        $s_club_pres=$pdo->prepare($club_pres);
	        $s_club_pres->execute([htmlspecialchars($_GET['i'])]);
	        $s_club_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['presidentC']=$s_club_pres->fetch();
	        //GET ALL STUDENTS SO AS TO  CHANGE THE PRESIDENT
	       	$all_students="select * from etudiant";
	        $s_all_students=$pdo->prepare($all_students);
	        $s_all_students->execute();
	        $s_all_students->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['all_students']=$s_all_students->fetchAll();
   		}else{
   			//extract the cell data
		    $sql_cjoined="select * from inscription i join cellule cel using(id_cellule) join club cl using(id_club) where i.cne=? and id_club=?";
		    $stmt_cjoined=$pdo->prepare($sql_cjoined);
		    $stmt_cjoined->execute([$_SESSION['cne'],htmlspecialchars($_GET['i'])]);
		    $stmt_cjoined->setFetchMode(PDO::FETCH_ASSOC);
		    $my_cells=$stmt_cjoined->fetchAll();
   			//A MEMBER OR CELL RESPONSIBLE OR CO-RESPONSIBLE
   			//DISPLAY SPECIFIC CELLS
   			// $j=0;
	     //    for ($i=0; $i < count($_SESSION['jcells']); $i++) { 
	     //       if ($_SESSION['jcells'][$i]['id_club']==htmlspecialchars($_GET['i'])) {
	     //            $my_cells[$j]=$_SESSION['jcells'][$i];
	     //           // $statut=$club_info[0]['statut'];
	     //            //WE'LL NEED THE STATUS WHEN THE USER CHOOSES A CELL
	     //            $j++;
	     //        }   
	     //    }

	        //DISPLAY NOT YET JOINED CELLS
	        $sql_njoined_cell="select * from cellule cu where not exists(
	    	select * from inscription i join cellule c using(id_cellule) where cu.id_cellule=c.id_cellule) and id_club=?";
	    	$cells_pres=$pdo->prepare($sql_njoined_cell);
	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $not_my_cells=$cells_pres->fetchAll();
	        $_SESSION['not_my_cells']=$not_my_cells;
   		}
   	//TEST IF THE USER LOGGED IN IS PA
    // if ($_SESSION['cne']==$_SESSION['p_adei']['cne'] and $_GET['target']=='adei') {
    // 	$_SESSION['statut']='PAC';

    // }elseif ($_SESSION['cne']==$_SESSION['p_adei']['cne'] and $_GET['target']!='adei') {
    //     $_SESSION['statut']='PA';
    // }

    $_SESSION['my_cells']=$my_cells;
    $is_connected=true;	
}

?>