<?php 
    require_once '../../../../pfa_db_connection/connexion.php'; 

    $_SESSION['statut'] = '';
    //GET ADEI PRESIDENT DATA
    $acro_club='adei';
    $sql_p_adei="select cne from president join club using(id_club) where acro_club=? and date_p_fin is null";
    $stmt_p_adei=$pdo->prepare($sql_p_adei);
    $stmt_p_adei->execute([$acro_club]);
    $stmt_p_adei->setFetchMode(PDO::FETCH_ASSOC);
    $_SESSION['p_adei']=$stmt_p_adei->fetch();
    //SET STATUS FOR PRESIDENT OF ADEI
    if ($_SESSION['cne'] == $_SESSION['p_adei']['cne']) {
        $_SESSION['statut'] = 'PA';
    }

    //JOINED CLUBS
    $etat_insc="V";
    $sql_joined="select distinct cl.id_club, cl.date_creation, cl.texte_desc, cl.nom_club, cl.acro_club, cl.photo, cl.logo from inscription i join cellule cel using(id_cellule) join club cl using(id_club) where i.cne=? and i.etat_insc=? and date_i_fin is null
        UNION
        select distinct cl.id_club, cl.date_creation, cl.texte_desc, cl.nom_club, cl.acro_club, cl.photo, cl.logo from responsable r join cellule cel using(id_cellule) join club cl using(id_club) where r.cne=? and date_r_fin is null
        UNION
        select distinct cl.id_club, cl.date_creation, cl.texte_desc, cl.nom_club, cl.acro_club, cl.photo, cl.logo from president join club cl using (id_club) where cne=? and date_p_fin is null
        ";
    $stmt_joined=$pdo->prepare($sql_joined);
    $stmt_joined->execute([$_SESSION['cne'], $etat_insc, $_SESSION['cne'], $_SESSION['cne']]);
    $stmt_joined->setFetchMode(PDO::FETCH_ASSOC);
    $_SESSION['my_clubs']=$stmt_joined->fetchAll();

  
    //NOT JOINED CLUBS
    $sql_njoined="select * from club cl1 where not exists (select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from inscription i join cellule cel using(id_cellule) join club cl2 using(id_club) where i.cne=? and i.etat_insc=? and date_i_fin is null and cl1.id_club=cl2.id_club
        union
        select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from responsable r join cellule cel using(id_cellule) join club cl2 using(id_club) where r.cne=? and date_r_fin is null and cl1.id_club=cl2.id_club
        union
        select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from president join club cl2 using (id_club) where cne=? and date_p_fin is null and cl1.id_club=cl2.id_club)
        "; 
    $stmt_njoined=$pdo->prepare($sql_njoined);
    $stmt_njoined->execute([$_SESSION['cne'],$etat_insc, $_SESSION['cne'], $_SESSION['cne']]);
    $stmt_njoined->setFetchMode(PDO::FETCH_ASSOC);
    $_SESSION['other_clubs']=$stmt_njoined->fetchAll();
    
?>



<?php //session_start(); ?>
<?php 
   //  require_once '../../../../../pfa_db_connection/connexion.php'; 
   //  //GET ADEI PRESIDENT DATA
   //  $acro_club='adei';
   //  $sql_p_adei="select cne from president join club using(id_club) where acro_club=? and date_p_fin is null";
   //  $stmt_p_adei=$pdo->prepare($sql_p_adei);
   //  $stmt_p_adei->execute([$acro_club]);
   //  $stmt_p_adei->setFetchMode(PDO::FETCH_ASSOC);
   //  $_SESSION['p_adei']=$stmt_p_adei->fetch();

   //  // if ($_SESSION['cne']==$_SESSION['p_adei']['cne']) {
   //  //     $adei_club="select * from club";
   //  //     $s_club_adei=$pdo->prepare($adei_club);
   //  //     $s_club_adei->execute();
   //  //     $s_club_adei->setFetchMode(PDO::FETCH_ASSOC);
   //  //     $_SESSION['jclubs']['president']=$s_club_adei->fetchAll();
   //  //     $_SESSION['statut']='PA';
   //  // }else{

   //      //clubs joined as a member
   //      $etat_insc="V";
   //      $sql_joined="select distinct cl.id_club, cl.logo,cl.date_creation, cl.photo, cl.texte_desc, cl.nom_club, cl.acro_club from inscription i join cellule cel using(id_cellule) join club cl using(id_club) where i.cne=? and i.etat_insc=?";
   //      $stmt_joined=$pdo->prepare($sql_joined);
   //      $stmt_joined->execute([$_SESSION['cne'], $etat_insc]);
   //      $stmt_joined->setFetchMode(PDO::FETCH_ASSOC);
   //      $_SESSION['jclubs']['member']=$stmt_joined->fetchAll();

   //       //clubs joined as a responsable
   //      $sql_joined="select distinct cl.id_club, cl.logo,cl.date_creation, cl.photo, cl.texte_desc, cl.nom_club, cl.acro_club from responsable r join cellule cel using(id_cellule) join club cl using(id_club) where r.cne=?";
   //      $stmt_joined=$pdo->prepare($sql_joined);
   //      $stmt_joined->execute([$_SESSION['cne']]);
   //      $stmt_joined->setFetchMode(PDO::FETCH_ASSOC);
   //      $_SESSION['jclubs']['responsable']=$stmt_joined->fetchAll();       

   //      //If the student is the president of the club
   //      $sql_if_pres="select * from president join club using (id_club) where cne=? and date_p_fin is null";
   //      $stmt_if_pres=$pdo->prepare($sql_if_pres);
   //      $stmt_if_pres->execute([$_SESSION['cne']]);
   //      $stmt_if_pres->setFetchMode(PDO::FETCH_ASSOC);
   //      // if ($row=$stmt_if_pres->fetchAll
   //      //     ()) {
   //      $_SESSION['jclubs']['president']=$row;
   //      //}

   //      //clubs not joined
   //      $sql_njoined="select * from club cl1 where not exists (select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from inscription i join cellule cel using(id_cellule) join club cl2 using(id_club) where i.cne=? and i.etat_insc=? and cl1.id_club=cl2.id_club
   //          union
   //          select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from responsable r join cellule cel using(id_cellule) join club cl2 using(id_club) where r.cne=? and cl1.id_club=cl2.id_club
   //          union
   //          select cl2.logo, cl2.id_club, cl2.nom_club, cl2.acro_club from president join club cl2 using (id_club) where cne=? and date_p_fin is null and cl1.id_club=cl2.id_club)
   //          "; 
   //      $stmt_njoined=$pdo->prepare($sql_njoined);
   //      $stmt_njoined->execute([$_SESSION['cne'],$etat_insc, $_SESSION['cne'], $_SESSION['cne']]);
   //      $stmt_njoined->setFetchMode(PDO::FETCH_ASSOC);
   //      if ($_SESSION['cne']==$_SESSION['p_adei']['cne']) {
   //          $_SESSION['jclubs']['c_p_adei']=$stmt_njoined->fetchAll();
   //          $_SESSION['statut']='PA';
   //      }else{
   //          $_SESSION['njclubs']=$stmt_njoined->fetchAll();
   //      }
    
 

   // header("Location: ../index.php");

?>