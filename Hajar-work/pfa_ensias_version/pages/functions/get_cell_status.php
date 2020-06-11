<?php 
    //TODO: get user status in the cellule from db
	require_once '../../../../pfa_db_connection/connexion.php'; 

	$_SESSION['id_club_for_event'] = $_GET['i'];
	if (isset($_SESSION['statut']) and $_SESSION['statut'] != 'PA') {
			$_SESSION['statut'] = '';
	}
	$_SESSION['my_cells'] = array();
	$_SESSION['other_cells'] = array();
	//CLUB PRESENTATION
    $sql_ncon="select * from club where id_club=? and acro_club=?";
    $ncon_club=$pdo->prepare($sql_ncon);
    $ncon_club->execute([htmlspecialchars($_GET['i']),htmlspecialchars($_GET['target'])]);
    $ncon_club->setFetchMode(PDO::FETCH_ASSOC);
    if ($row=$ncon_club->fetch()) {
    	$n_club=$row;
    }else{
    	//INEXISTANT CLUB -> ACCESS VIA URL
    	header('Location:404.php');
    }

    //GET THE CLUB EVENTS
    $nature='PU';
    $sql_event="select * from organisation join evenement using(id_event) where id_club=? and nature = ?";
    $event_club=$pdo->prepare($sql_event);
    $event_club->execute([$_GET['i'], $nature]);
    $event_club->setFetchMode(PDO::FETCH_ASSOC);
    $events_pub=$event_club->fetchAll();

    //GET STAFF INFO
    	//GET CLUB PRESIDENT
	        $club_pres="select * from president join club using(id_club) join etudiant using(cne) where id_club=? and date_p_fin is null";
	        $s_club_pres=$pdo->prepare($club_pres);
	        $s_club_pres->execute([$_GET['i']]);
	        $s_club_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['presidentC']=$s_club_pres->fetch();
	    //GET CLUB RESPONSABLES
	       $club_respos="select * from responsable join(cellule) using(id_cellule) join etudiant using(cne) where id_club=? and date_r_fin is null";
	        $s_club_respos=$pdo->prepare($club_respos);
	        $s_club_respos->execute([$_GET['i']]);
	        $s_club_respos->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['resposC']=$s_club_respos->fetchAll();
	        
  	//GET ALL CELLS
	 //    $sql_cells="select * from cellule where id_club=?";
	 //    $cells_club=$pdo->prepare($sql_cells);
	 //    $cells_club->execute([htmlspecialchars($_GET['i'])]);
	 //    $cells_club->setFetchMode(PDO::FETCH_ASSOC);    
		// $_SESSION['cells_club'] = $cells_club ->fetchAll();

	//TEST IF THE USER IS A MEMBER OF THE CLUB REGARDLESS OF THE STATUS
	if (isset($_SESSION['my_clubs'])) {
		$is_club_member=false;
		for ($i = 0; $i < count($_SESSION['my_clubs']); $i++) {
			if (htmlspecialchars($_GET['target']) == $_SESSION['my_clubs'][$i]['acro_club']) {
				$is_club_member=true;
				break;
			}
		} 
	}
	
    //ONLY LOGGED IN USERS
    if (isset($_SESSION['cne'])) {

    	//FIND OUT IF LOGGED IN USER IS CLUB PRESIDENT
    	if ($_SESSION['cne'] == $_SESSION['presidentC']['cne']) {
    		//CLUB PRESIDENT STATUS
    		$_SESSION['statut'] = 'PC';
    		//GET ALL CELLS
    		$cells_pres="select * from cellule where id_club=?";
	        $cells_pres=$pdo->prepare($cells_pres);
	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['my_cells'] = $cells_pres->fetchAll();

	        //GET PRIVATE EVENTS
	        $nature='PR';
		    $sql_event="select * from organisation join evenement using(id_event) where id_club=? and nature = ?";
		    $event_club=$pdo->prepare($sql_event);
		    $event_club->execute([$_GET['i'], $nature]);
		    $event_club->setFetchMode(PDO::FETCH_ASSOC);
		    $events_prv=$event_club->fetchAll();
    	}elseif ($is_club_member){
    		//JOINED CELLS
		    $etat_insc="V";
		    $sql_joined="select id_cellule, intitule, id_club, 'M' as statut
		    	from inscription join cellule using(id_cellule) where cne=? and etat_insc=? and date_i_fin is null and id_club=?
		        UNION
		        select id_cellule, intitule, id_club, 'R' as statut
		    	from responsable r join cellule using(id_cellule) where r.cne=? and date_r_fin is null and id_club=? 
		        ";
		    $stmt_joined=$pdo->prepare($sql_joined);
		    $stmt_joined->execute([$_SESSION['cne'], $etat_insc, $_GET['i'], $_SESSION['cne'], $_GET['i']]);
		    $stmt_joined->setFetchMode(PDO::FETCH_ASSOC);
		    $_SESSION['my_cells']=$stmt_joined->fetchAll();

	       //NOT YET JOINED CELLS
	        $sql_njoined_cell="select * from cellule cu where not exists(
	    	    select *
		    	from inscription i where cu.id_cellule=i.id_cellule and cne= ? and etat_insc= ? and date_i_fin is null
		        UNION
		        select *
		    	from responsable r where cu.id_cellule=r.id_cellule and r.cne=? and date_r_fin is null) and id_club=?";
	    	$stmt_joined_cell=$pdo->prepare($sql_njoined_cell);
	        $stmt_joined_cell->execute([$_SESSION['cne'], $etat_insc, $_SESSION['cne'], $_GET['i']]);
	        $stmt_joined_cell->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['other_cells']=$stmt_joined_cell->fetchAll();
   		
   			//GET PRIVATE EVENTS
	        $nature='PR';
		    $sql_event="select * from organisation join evenement using(id_event) where id_club=? and nature = ?";
		    $event_club=$pdo->prepare($sql_event);
		    $event_club->execute([$_GET['i'], $nature]);
		    $event_club->setFetchMode(PDO::FETCH_ASSOC);
		    $events_prv=$event_club->fetchAll();
    	}elseif ($_SESSION['statut'] == 'PA') {
    		//GET ALL CELLS
    		$cells_pres="select * from cellule where id_club=?";
	        $cells_pres=$pdo->prepare($cells_pres);
	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
	        $_SESSION['my_cells'] = $cells_pres->fetchAll();
	        $_SESSION['other_cells'] = $_SESSION['my_cells'];

	        //GET PRIVATE EVENTS
	        $nature='PR';
		    $sql_event="select * from organisation join evenement using(id_event) where id_club=? and nature = ?";
		    $event_club=$pdo->prepare($sql_event);
		    $event_club->execute([$_GET['i'], $nature]);
		    $event_club->setFetchMode(PDO::FETCH_ASSOC);
		    $events_prv=$event_club->fetchAll();
    	}

	}

?>















<?php 
// if ($_SESSION['jclubs']['president'][0]['id_club']==htmlspecialchars($_GET['i'])) {
//         	$_SESSION['statut']='PC';
//         	//DISPLAY ALL CELLS
//         	$cells_pres="select * from cellule where id_club=?";
// 	        $cells_pres=$pdo->prepare($cells_pres);
// 	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
// 	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
// 	        $my_cells=$cells_pres->fetchAll();
// 	    }elseif ($_SESSION['cne']==$_SESSION['p_adei']['cne']) {
// 	    	$_SESSION['statut']='PA';
// 	    	//DISPLAY ALL CELLS
//         	$cells_pres="select * from cellule where id_club=?";
// 	        $cells_pres=$pdo->prepare($cells_pres);
// 	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
// 	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
// 	        $my_cells=$cells_pres->fetchAll();
// 	        //GET CLUB PRESIDENT
// 	        $club_pres="select * from president join club using(id_club) join etudiant using(cne) where id_club=? and date_p_fin is null";
// 	        $s_club_pres=$pdo->prepare($club_pres);
// 	        $s_club_pres->execute([htmlspecialchars($_GET['i'])]);
// 	        $s_club_pres->setFetchMode(PDO::FETCH_ASSOC);
// 	        $_SESSION['presidentC']=$s_club_pres->fetch();
//    		}else{
//    			//extract the cell data
// 		    $sql_cjoined="select * from inscription i join cellule cel using(id_cellule) join club cl using(id_club) where i.cne=? and id_club=?";
// 		    $stmt_cjoined=$pdo->prepare($sql_cjoined);
// 		    $stmt_cjoined->execute([$_SESSION['cne'],htmlspecialchars($_GET['i'])]);
// 		    $stmt_cjoined->setFetchMode(PDO::FETCH_ASSOC);
// 		    $my_cells=$stmt_cjoined->fetchAll();
//    			//A MEMBER OR CELL RESPONSIBLE OR CO-RESPONSIBLE
//    			//DISPLAY SPECIFIC CELLS
//    			// $j=0;
// 	     //    for ($i=0; $i < count($_SESSION['jcells']); $i++) { 
// 	     //       if ($_SESSION['jcells'][$i]['id_club']==htmlspecialchars($_GET['i'])) {
// 	     //            $my_cells[$j]=$_SESSION['jcells'][$i];
// 	     //           // $statut=$club_info[0]['statut'];
// 	     //            //WE'LL NEED THE STATUS WHEN THE USER CHOOSES A CELL
// 	     //            $j++;
// 	     //        }   
// 	     //    }

// 	        //DISPLAY NOT YET JOINED CELLS
// 	        $sql_njoined_cell="select * from cellule cu where not exists(
// 	    	select * from inscription i join cellule c using(id_cellule) where cu.id_cellule=c.id_cellule) and id_club=?";
// 	    	$cells_pres=$pdo->prepare($sql_njoined_cell);
// 	        $cells_pres->execute([htmlspecialchars($_GET['i'])]);
// 	        $cells_pres->setFetchMode(PDO::FETCH_ASSOC);
// 	        $not_my_cells=$cells_pres->fetchAll();
// 	        $_SESSION['not_my_cells']=$not_my_cells;
//    		}
//    	//TEST IF THE USER LOGGED IN IS PA
//     // if ($_SESSION['cne']==$_SESSION['p_adei']['cne'] and $_GET['target']=='adei') {
//     // 	$_SESSION['statut']='PAC';

//     // }elseif ($_SESSION['cne']==$_SESSION['p_adei']['cne'] and $_GET['target']!='adei') {
//     //     $_SESSION['statut']='PA';
//     // }

//     $_SESSION['my_cells']=$my_cells;
//     $is_connected=true;
 ?>