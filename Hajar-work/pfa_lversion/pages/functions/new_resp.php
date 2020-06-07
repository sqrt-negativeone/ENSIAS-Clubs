<?php 
session_start();

require_once '../../connect.php'; 

if (isset($_POST['submit_resp']) and isset($_POST['new_resp'])) {
    //date_i_fin IS NO LONGER NULL -> SYSDATE
    $sysdate = date('Y-m-d H:i:s');
    $s="update inscription set date_i_fin = ? where cne=? and id_cellule=? and date_i_fin is null";
    $s_update=$pdo->prepare($s);
    for ($i=0; $i < count($_POST['new_resp']); $i++) { 
        $s_update->execute([$sysdate, $_POST['new_resp'][$i], $_SESSION['id_cellule_for_change_resp']]);
    }
	
    //INSERT RESPONSABLE IN RESPONSABLE TABLE
    $s="insert into responsable (id_cellule, cne, date_r_deb) values(?, ?, ?)";
    $s_insert=$pdo->prepare($s);
    for ($i=0; $i < count($_POST['new_resp']); $i++) { 
        $s_insert->execute([$_SESSION['id_cellule_for_change_resp'], $_POST['new_resp'][$i],$sysdate]);
    }
	header("Location: ".$_SERVER['HTTP_REFERER']);

}elseif (isset($_POST['delete_resp']) and isset($_POST['del_resp'])){
    //date_r_fin -> sysdate
    $sysdate = date('Y-m-d H:i:s');
    $s="update responsable set date_r_fin = ? where cne = ? and id_cellule = ? and date_r_fin is null";
    $s_update=$pdo->prepare($s);
    for ($i=0; $i < count($_POST['del_resp']); $i++) { 
        $s_update->execute([$sysdate, $_POST['del_resp'][$i], $_SESSION['id_cellule_for_change_resp']]);
    }
    
    header("Location: ".$_SERVER['HTTP_REFERER']);

}elseif (isset($_POST['search'])){
	try {
        $etat_insc = 'V';
		$se="select * from inscription join etudiant using(cne) where id_cellule=? and etat_insc = ? and date_i_fin is null and (upper(nom) like '%".strtoupper($_POST['search'])."%' or lower(prenom) like '%".strtolower($_POST['search'])."%')";
        $s_search=$pdo->prepare($se);
        $s_search->execute([$_SESSION['id_cellule_for_change_resp'], $etat_insc]);
        $s_search->setFetchMode(PDO::FETCH_ASSOC);
		$i=0;
        while ($row=$s_search->fetch()) {
            $data[$i]['cne']=$row['cne'];
            $data[$i]['code_apoge']=$row['code_apoge'];
            $data[$i]['nom']=$row['nom'];
            $data[$i]['prenom']=$row['prenom'];
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
