<?php
session_start();
require_once '../../../../../pfa_db_connection/connexion.php';
//DESTROY COOKIE IF SET
if (isset($_COOKIE["remember_me"])) {
	unset($_COOKIE['remember_me']);
	setcookie("remember_me", "", time() - 3600);
	$sql = "update etudiant set val_cookie=NULL where (cne=? or code_apoge=?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$_SESSION['cne'], $_SESSION['code_apoge']]);
}
$_SESSION = array();
session_destroy();
header("Location:../login.php");
