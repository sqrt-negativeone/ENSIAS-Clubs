<?php session_start(); ?>
<?php 
    require_once '../../../../../pfa_db_connection/connexion.php'; 
    //GET ADEI PRESIDENT DATA
    $acro_club='adei';
    $sql_p_adei="select cne from club where acro_club=?";
    $stmt_p_adei=$pdo->prepare($sql_p_adei);
    $stmt_p_adei->execute([$acro_club]);
    $stmt_p_adei->setFetchMode(PDO::FETCH_ASSOC);
    $_SESSION['p_adei']=$stmt_p_adei->fetch();

    if ($_SESSION['cne']==$_SESSION['p_adei']['cne']) {
        $adei_club="select * from club";
        $s_club_adei=$pdo->prepare($adei_club);
        $s_club_adei->execute();
        $s_club_adei->setFetchMode(PDO::FETCH_ASSOC);
        $_SESSION['jclubs']=$s_club_adei->fetchAll();
        $_SESSION['statut']='PA';
    }else{
        //clubs joined
        $sql_joined="select distinct cl.id_club, cl.logo,cl.date_creation, cl.photo, cl.texte_desc, cl.cne, cl.nom_club, cl.acro_club from inscription i join cellule cel using(id_cellule) join club cl using(id_club) where i.cne=?";
        $stmt_joined=$pdo->prepare($sql_joined);
        $stmt_joined->execute([$_SESSION['cne']]);
        $stmt_joined->setFetchMode(PDO::FETCH_ASSOC);
        $_SESSION['jclubs']=$stmt_joined->fetchAll();

        //If the student is the president of the club
        $sql_if_pres="select * from club where cne=?";
        $stmt_if_pres=$pdo->prepare($sql_if_pres);
        $stmt_if_pres->execute([$_SESSION['cne']]);
        $stmt_if_pres->setFetchMode(PDO::FETCH_ASSOC);
        if ($row=$stmt_if_pres->fetch()) {
            $_SESSION['jclubs'][count($_SESSION['jclubs'])]=$row;
        }

        //clubs njoined
        $sql_njoined="select * from club cl1 where not exists (select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from inscription i join cellule cel using(id_cellule) join club cl2 using(id_club) where i.cne=? and cl1.id_club=cl2.id_club) and cl1.cne !=?"; 
        $stmt_njoined=$pdo->prepare($sql_njoined);
        $stmt_njoined->execute([$_SESSION['cne'], $_SESSION['cne']]);
        $stmt_njoined->setFetchMode(PDO::FETCH_ASSOC);
        $_SESSION['njclubs']=$stmt_njoined->fetchAll();

    }
   
   header("Location: ../index.php");

?>