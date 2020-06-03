<?php 
session_start();

include '../../../../../pfa_db_connection/connexion.php';

if (isset($_POST['submit_pic'])) {
	$photo = file_get_contents($_FILES['pic']['tmp_name']);
	$cne = $_SESSION['cne'];
	$update_photo = "update etudiant set photo = ? where cne = ?";
	$s_update_photo = $pdo -> prepare($update_photo);
	$s_update_photo -> execute([$photo, $_SESSION['cne']]);
	 

	if ($s_update_photo->rowCount() == 0) {
		$_SESSION['msg'] = 'Pas de mise à jour.';
	}else{
		$_SESSION['msg'] = 'Photo mise à jour avec succès.';

		$select_photo = "select photo from etudiant where cne = ?";
		$s_select_photo = $pdo->prepare($select_photo);
		$s_select_photo -> execute([$_SESSION['cne']]);
		$s_select_photo->setFetchMode(PDO::FETCH_ASSOC);
		$row = $s_select_photo->fetch();

		$_SESSION['photo'] = $row['photo'];
	}

	$_SESSION['context'] = 'Mise à jour de la photo de profile';

	header("Location:".$_SERVER['HTTP_REFERER']);

}elseif (isset($_POST['submit_pro'])) {
	$nom = strtoupper($_POST['last_name']);
	$prenom = ucfirst($_POST['first_name']);
	$email = $_POST['email'];


	$update_profile = "update etudiant set nom = ?, prenom = ?, email = ? where cne = ?";
	$s_update_profile = $pdo -> prepare($update_profile);
	$s_update_profile -> execute([$nom, $prenom, $email, $_SESSION['cne']]);

	if ($s_update_profile->rowCount() == 0) {
		$_SESSION['msg'] = 'Pas de mise à jour.';
	}else{
		$_SESSION['msg'] = 'Paramètres mis à jour avec succès.';

		$select_photo = "select nom, prenom, email from etudiant where cne = ?";
		$s_select_photo = $pdo->prepare($select_photo);
		$s_select_photo -> execute([$_SESSION['cne']]);
		$s_select_photo->setFetchMode(PDO::FETCH_ASSOC);
		$row = $s_select_photo->fetch();

		$_SESSION['nom'] = $row['nom'];
		$_SESSION['prenom'] = $row['prenom'];
		$_SESSION['email'] = $row['email'];

	}

	$_SESSION['context'] = 'Mise à jour des informations utilisateur.';

	header("Location:".$_SERVER['HTTP_REFERER']);
}

 ?>
