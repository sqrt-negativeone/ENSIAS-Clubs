<?php 
include '../../../../pfa_db_connection/connexion.php';

//GET AL CLUBS TO EMBED LIINKS TO THEIR PAGES
    $sql_all="select * from club";
    $all_clubs=$pdo->query($sql_all);
    $all_clubs->setFetchMode(PDO::FETCH_ASSOC);
    $list_all_clubs= $all_clubs ->fetchAll();
 ?>
<nav id="nav_bar" class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-repeat: no-repeat;">
    <div class="container-fluid d-flex flex-column p-0">
        <button id="close_nav" class="btn btn-primary float-right" type="button">X</button>
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <img src="assets/img/Logo.svg" alt="" width="85px">
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <?php
            if (isset($_SESSION['cne'])) {
             if(strcmp($select,"dashboard")==0){
                    echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="suggestions.php"><i class="material-icons">rate_review</i><span>Suggestions</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>';
                }
                elseif (strcmp($select,"suggestions")==0){
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="suggestions.php"><i class="material-icons">rate_review</i><span>Suggestions</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>';
                }
                elseif (strcmp($select,"profile")==0){
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="suggestions.php"><i class="material-icons">rate_review</i><span>Suggestions</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>';
                }
                else {
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="suggestions.php"><i class="material-icons">rate_review</i><span>Suggestions</span></a></li>';
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>';
                }
            }
                //LOOP THROUGH CLUBS
                for ($i=0; $i < count($list_all_clubs) ; $i++) { 
                    $url = 'clubs.php?target=' . urlencode($list_all_clubs[$i]['acro_club']).'&i='.$list_all_clubs[$i]['id_club'];
            ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo $url ?>">
                    <?php 
                     if ($list_all_clubs[$i]['logo']=="") {
                            echo '<img src="../img/profile.png" class="border rounded-circle img-profile" />';
                         }else {
                            echo '<img class="border rounded-circle img-profile" src="data:image/jpeg;base64,'.base64_encode($list_all_clubs[$i]['logo']).'">';
                         } 
                     ?>
                <span><?php echo htmlspecialchars($list_all_clubs[$i]['acro_club']); ?></span></a>
            </li>
            <?php } ?>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>