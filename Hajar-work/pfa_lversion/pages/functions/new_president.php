<?php 
session_start();
//SET NEW CLUB PRESIDENT
require_once '../../../../../pfa_db_connection/connexion.php'; 
if (isset($_POST['submit_pres']) and isset($_POST['new_president'])) {

	//BE SURE TO CHECK IF THE NEW PRESIDENT HAS NO ENTRY AS A PRESIDENT
	$s="update club set cne=? where id_club=?";
	$s_update=$pdo->prepare($s);
	$s_update->execute([$_POST['new_president'], $_SESSION['presidentC']['id_club']]);
	header("Location: ".$_SERVER['HTTP_REFERER']);
}elseif (isset($_POST['search'])){
	try {
		$se="select * from etudiant where upper(nom) like '%".strtoupper($_POST['search'])."%' or lower(prenom) like '%".strtolower($_POST['search'])."%'";
        $s_search=$pdo->prepare($se);
        $s_search->execute();
        $s_search->setFetchMode(PDO::FETCH_ASSOC);
		$i=0;
        while ($row=$s_search->fetch()) {
            $data[$i]['cne']=$row['cne'];
            $data[$i]['code_apoge']=$row['code_apoge'];
            $data[$i]['mpass']=$row['mpass'];
            $data[$i]['nom']=$row['nom'];
            $data[$i]['prenom']=$row['prenom'];
            $data[$i]['email']=$row['email'];
            $data[$i]['photo']=base64_encode($row['photo']);
            $i++;
        }
        echo json_encode($data);
		exit();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	
}


 ?>
