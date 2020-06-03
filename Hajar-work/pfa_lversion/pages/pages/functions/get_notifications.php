<?php 
include '../../../../pfa_db_connection/connexion.php';
//CHECK IF THE PERSON LOGGED IN IS A MEMBER OF A CLUB
	//FEEDBACK OF SUBMISSION BY PRESIDENT OR RESPONSABLE
	//ASSIGNMENT OF A TASK
	//NEW EVENTS PRIVATE AND PUBLIC

//CHECK IF THE PERSON LOGGED IN IS A RESPONSABLE
	//ABOVE +
	//SUBMISSION OF A MEMBER
	//MEMBERSHIP REQUESTS

//CHECK IF THE PERSON LOGGED IN IS A PRESIDENT
	//ABOVE +
	//ASSIGNMENTS CAN BE MADE BY PADEI


//GET ASSIGNMENTS FOR ALL

// $get_assign="select * from tache_assignee join tache using(id_tache) where cne = ? "

//GET MEMBERSHIP REQUESTS FOR RESPO AND PRESIDENT
//FIND OUT IF PRESIDENT
$etat = 'NV'; 
$is_president = "select * from president join club using (id_club) where cne = ? and date_p_fin is null";
$s_is_president = $pdo -> prepare($is_president);
$s_is_president -> execute([$_SESSION['cne']]);
$s_is_president -> setFetchMode(PDO::FETCH_ASSOC);
if ($row_p = $s_is_president->fetch()) {
	$membership_req = "select cne , nom, prenom, intitule, id_cellule, acro_club, nom_club, date_i_deb,e.photo  from etudiant e join inscription using(cne) join cellule using(id_cellule) join club using (id_club) where etat_insc = ? and id_club = ?";
	$s_membership_req = $pdo->prepare($membership_req);
	$s_membership_req->execute([$etat, $row_p['id_club']]);
	$s_membership_req->setFetchMode(PDO::FETCH_ASSOC);
	$notifs['membership'] = $s_membership_req->fetchAll();
}

//FIND OUT IF RESPONSABLE
$is_respo = "select * from responsable join cellule using (id_cellule) join club using (id_club) where cne = ? and date_r_fin is null";
$s_is_respo = $pdo -> prepare($is_respo);
$s_is_respo -> execute([$_SESSION['cne']]);
$s_is_respo -> setFetchMode(PDO::FETCH_ASSOC);
if ($row_r = $s_is_respo->fetchAll()) {
	$membership_req = "select cne , nom, prenom, intitule, id_cellule, acro_club, nom_club , date_i_deb,e.photo from etudiant e join inscription using(cne) join cellule using(id_cellule) join club using (id_club) where etat_insc = ? and id_club = ?";
	$s_membership_req = $pdo->prepare($membership_req);
	$s_membership_req->execute([$etat, $row_p['id_club']]);
	$s_membership_req->setFetchMode(PDO::FETCH_ASSOC);
	$notifs['membership'] = $s_membership_req->fetchAll();
}

//GET SUGGESTIONS RECEIVED
$etat_sug = 'NV';
$sql = "select * from president p join avis_etudiant ae using (id_club) join etudiant e on(e.cne = ae.cne) where p.cne = ? and date_p_fin is null and etat = ? and remarque is null";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$_SESSION['cne'], $etat]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$notifs['suggests'] = $stmt -> fetchAll();

//GET SUGGESTIONS SENT
// $sql_ = "select * from avis_etudiant join club using (id_club)  where cne = ? ";
// $stmt_ = $pdo -> prepare($sql_);
// $stmt_ -> execute([$_SESSION['cne']]);
// $stmt_->setFetchMode(PDO::FETCH_ASSOC);
// $notifs['mes_suggests'] = $stmt_ -> fetchAll();


?>