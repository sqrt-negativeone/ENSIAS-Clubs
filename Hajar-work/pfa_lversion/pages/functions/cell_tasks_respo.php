<?php 
if (!isset($_SESSION['cne'])) {
	header("Location:../login.html");
}else{
	//GET USER INFO REGARDING THE CELL
	for ($i=0; $i < count($_SESSION['my_cells']); $i++) { 
		if ($_SESSION['my_cells'][$i]['id_cellule']==htmlspecialchars($_GET['i']) and $_SESSION['my_cells'][$i]['intitule']==htmlspecialchars($_GET['target'])) {
			$cell=$_SESSION['my_cells'][$i];
			break;
		}
	}
	if ($i == count($_SESSION['my_cells'])) {
		///header("Location:../404.php");
	}else{
		require_once '../../../../pfa_db_connection/connexion.php'; 
		$s='R';
	    $sql_ncon="select * from inscription join etudiant using(cne) where statut=? and id_cellule=?";

	    $ncon_club=$pdo->prepare($sql_ncon);
	    $ncon_club->execute([$s,htmlspecialchars($_GET['i'])]);
	    $ncon_club->setFetchMode(PDO::FETCH_ASSOC);
	    $respo_cell=$ncon_club->fetchAll();
	}
}
 ?>
