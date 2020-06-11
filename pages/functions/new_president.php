<?php
session_start();
//SET NEW CLUB PRESIDENT
require_once '../../../pfa_db_connection/connexion.php';
if (isset($_POST['submit_pres']) and isset($_POST['new_president'])) {
	if ($_SESSION['presidentC']['cne'] != $_POST['new_president']) {
		//SET DATE_P_FIN FOR THE OLD PRESIDENT
		$sysdate = date('Y-m-d H:i:s');
		$s = "update president set date_p_fin = ? where cne = ? and id_club = ? and date_p_fin is null";
		$s_update = $pdo->prepare($s);
		$s_update->execute([$sysdate, $_POST['new_president'], $_SESSION['presidentC']['id_club']]);

		//INSERT THE NEW PRESIDENT
		$s = "insert into president (id_club, cne, date_p_deb) values (?, ?, ?)";
		$s_update = $pdo->prepare($s);
		$s_update->execute([$_SESSION['presidentC']['id_club'], $_POST['new_president'], $sysdate]);
	}
	header("Location: " . $_SERVER['HTTP_REFERER']);
} elseif (isset($_POST['search'])) {
	try {
		$se = "select * from etudiant where upper(nom) like '%" . strtoupper($_POST['search']) . "%' or lower(prenom) like '%" . strtolower($_POST['search']) . "%'";
		$s_search = $pdo->prepare($se);
		$s_search->execute();
		$s_search->setFetchMode(PDO::FETCH_ASSOC);
		$i = 0;
		while ($row = $s_search->fetch()) {
			$data[$i]['cne'] = $row['cne'];
			$data[$i]['code_apoge'] = $row['code_apoge'];
			$data[$i]['nom'] = $row['nom'];
			$data[$i]['prenom'] = $row['prenom'];
			$data[$i]['photo'] = base64_encode($row['photo']);
			$i++;
		}
		echo json_encode($data);
		exit();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}


?>






<!-- // $s_search->setFetchMode(PDO::FETCH_ASSOC);

	//$data=array();
    //echo $_POST['query'];
	//SEARCH FOR NAMES ENTERED IN THE SEARCH AREA
	// $se="select * from etudiant where nom like %?% or prenom like %?%";
	// $s_search=$pdo->prepare($se);
	// $s_search->execute([strtoupper($_POST['query']), ucfirst($_POST['query'])]);
	// $s_search->setFetchMode(PDO::FETCH_ASSOC);
	// $_SESSION['search_students']=$s_search->fetchAll();
	// echo $_SESSION['search_students'];
	// $n=$s_search->rowCount();
	// for ($i=0; $i < $n; $i++) {
	// 	$data[$i]=$s_search->fetch(PDO::FETCH_ASSOC); 
	// }
	//print_r($data);
	//$data=$s_search->fetch();----
	//print_r($data);
	//header('Content-Type: application/json'); -->