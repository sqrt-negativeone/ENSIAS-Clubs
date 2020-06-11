<?php 
	include "../../../pfa_db_connection/connexion.php";

	// //GET CLUBS
	// $sql_clubs = "select * from club";
	// $stmt_clubs = $pdo -> query($sql_clubs);
	// $clubs = $stmt_clubs -> fetchAll();

	//GET EVENTS
	$nature = 'PU';
	$sql_events = "select * from evenement where nature = ? and date_deb>now() or (now()>date_deb and now()<date_fin) order by date_fin ASC";
	$stmt_events = $pdo -> prepare($sql_events);
	$stmt_events ->execute([$nature]);
	$events = $stmt_events -> fetchAll();
