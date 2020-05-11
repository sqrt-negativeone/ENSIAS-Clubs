<?php 
session_start();
//SET NEW CLUB PRESIDENT
require_once '../../../../../pfa_db_connection/connexion.php'; 
if (isset($_POST['submit_pres']) and isset($_POST['new_president'])) {
	//BE SURE TO CHECK IF THE NEW PRESIDENT HAS NO ENTRY AS A PRESIDENT
	$s="update club set cne=? where id_club=?";
	$s_update=$pdo->prepare($s);
	$s_update->execute([$_POST['new_president'], $_SESSION['presidentC']['id_club']]);
	//header("Location: ".$_SERVER['HTTP_REFERER']);
}	
 ?>