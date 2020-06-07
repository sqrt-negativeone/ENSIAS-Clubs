<?php 
session_start();
require_once '../../connect.php';
	//CHANGE CLUB SETTINGS
	if (isset($_POST['submit_set_club'])) {
		//TRIM 
		$msg='';
		$update_array = array();
		$update_club_settings="update club set ";
		if ( trim($_POST['nom_club']) != '' and trim($_POST['nom_club']) != $_SESSION['presidentC']['nom_club']){
			$update_club_settings .= "nom_club = ?";
			$update_array[] = trim($_POST['nom_club']);
			$msg='le nom';
		}
		if ( trim($_POST['acro_club']) != '' and trim($_POST['acro_club']) != $_SESSION['presidentC']['acro_club']){
			if (count($update_array) != 0) $update_club_settings .= " ,";

			$update_club_settings .= " acro_club = ?";
			$update_array[] = trim($_POST['acro_club']);
			$msg.=' l\'acronyme';
		}
		if (isset($_POST['texte_desc']) and trim($_POST['texte_desc']) != ''){
			if (count($update_array) != 0) $update_club_settings .= " ,"; 

			$update_club_settings .= " texte_desc = ?";
			$update_array[] = trim($_POST['texte_desc']);
			$msg.=' le texte descriptif';
		}
		if ($_FILES['photo']['size'] != 0 && $_FILES['photo']['error'] == 0){
			if (count($update_array) != 0) $update_club_settings .= " ,";

			$update_club_settings .= " photo = ?";
			$photo = file_get_contents($_FILES['photo']['tmp_name']);
			$update_array[] = $photo;
			$msg.=' la photo';
		}
		if ($_FILES['logo']['size'] != 0 && $_FILES['logo']['error'] == 0){
			if (count($update_array) != 0) $update_club_settings .= " ,";

			$update_club_settings .= " logo = ?";
			$logo = file_get_contents($_FILES['logo']['tmp_name']);
			$update_array[] = $logo;
			$msg.=' le logo';
		}

		$_SESSION['context'] = 'Modification des paramètres du club'; 
		if (count($update_array) == 0) {
			$_SESSION['msg'] = 'Aucune information n\'a été mise à jour.';
			header("Location:".$_SERVER['HTTP_REFERER']);
		}else{
			$update_club_settings .= " where id_club = ?";
			$update_array[] = $_SESSION['presidentC']['id_club'];
			$stmt_update_club_settings=$pdo->prepare($update_club_settings);
			$stmt_update_club_settings->execute($update_array);
			if ($stmt_update_club_settings->rowCount()>0) {
				$_SESSION['msg'] = 'Vous avez mis à jour '.$msg.'.';	
					if(strpos($update_club_settings, 'acro_club') !== false){
						$target=trim($_POST['acro_club']);            
						$url_array=parse_url($_SERVER['HTTP_REFERER']);
						$url_array['query']="target=".urlencode($target)."&i=".$_SESSION['presidentC']['id_club'];
						$url=$url_array['scheme'].'://'.$url_array['host'].$url_array['path'].'?'.$url_array['query'];
						header("Location:".$url);
						
					}else{
						header("Location:".$_SERVER['HTTP_REFERER']);
					}			
			}else{
			 	$_SESSION['msg'] = 'Aucune information n\'a été mise à jour.';
				header("Location:".$_SERVER['HTTP_REFERER']);			 	
			}
			
		}


		
	}
 ?>