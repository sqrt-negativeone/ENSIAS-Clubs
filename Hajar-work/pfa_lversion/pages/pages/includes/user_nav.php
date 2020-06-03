<?php include "functions/get_notifications.php"; ?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>

        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                    <i class="fas fa-search"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </li>

            <?php 
                //TODO: connect to server and get the data about notifications
                $members=$notifs['membership'];
                $sug=$notifs['suggests'];
                // $mes_sugs=$notifs['mes_suggests'];
                $count = count($members)+count($sug);
            ?>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                        <span class="badge badge-danger badge-counter"><?php echo $count?></span>
                        <i class="fas fa-bell fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                        <h6 class="dropdown-header">NOTIFICATIONS</h6>
                        <?php 
                            for ($i=0;$i<count($members);$i++){
                                $date=$members[$i]['date_i_deb'];
                                $avatar="data:image/*;base64,".base64_encode($members[$i]['photo']);
                                if ($members[$i]['photo'] == '') {
                                   $avatar = "../img/profile.png";
                                }
                                $desc="Nouvelle demande d'inscription à la cellule ".$members[$i]['intitule']." de ".$members[$i]['acro_club']." par ".strtoupper($members[$i]['nom'])." ".ucfirst($members[$i]['prenom']);
                                echo '<a class="d-flex align-items-center dropdown-item" href="#">';
                                echo '<div class="mr-3"><img class="border rounded-circle" src="'.$avatar.'" style="width: 40px;"></div>';
                                echo '<div><span class="small text-gray-500">'.$date.'</span>';
                                echo '<p>'.$desc.'</p></div>';
                            }
                        ?>

                        <?php 
                            for ($i=0;$i<count($sug);$i++){
                                $date=$sug[$i]['date_avis'];
                                
                                if ($sug[$i]['photo'] == '') {
                                   $avatar = "../img/profile.png";
                                }else{
                                    $avatar="data:image/*;base64,".base64_encode($sug[$i]['photo']);
                                }
                                if ($sug[$i]['etat'] == 'PL') {
                                    $desc="Une plainte ajoutée par ";
                                }else{
                                    $desc="Une suggestion ajoutée par ";
                                }
                                $desc.= strtoupper($sug[$i]['nom'])." ".ucfirst($sug[$i]['prenom']);

                                echo '<a class="d-flex align-items-center dropdown-item" href="#">';
                                echo '<div class="mr-3"><img class="border rounded-circle" src="'.$avatar.'" style="width: 40px;"></div>';
                                echo '<div><span class="small text-gray-500">'.$date.'</span>';
                                echo '<p>'.$desc.'</p></div>';
                            }
                        ?>

                        
                        <a class="text-center dropdown-item small text-gray-500" href="#">Show More</a>
                    </div>
                </div>
            </li>
        
            
            <?php 
                //GET USER INFO
            ?>
            <li class="nav-item dropdown no-arrow" role="presentation">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"
                                        href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                           <?php echo strtoupper($_SESSION['nom'])." ".ucfirst($_SESSION['prenom']); ?>
                                        </span>
                                        <?php
                                                            if ($_SESSION['photo']=="") {
                                                                echo '<img src="../img/profile.png" class="border rounded-circle img-profile" />';
                                                             }else {
                                                                echo '<img class="border rounded-circle img-profile" src="data:image/jpeg;base64,'.base64_encode($_SESSION['photo']).'">';
                                                             }  
                                          
                                        ?>
                                        
                                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                        <a class="dropdown-item" role="presentation" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Profile
                        </a>
                        <a class="dropdown-item" role="presentation" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" role="presentation" href="functions/logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Logout
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>