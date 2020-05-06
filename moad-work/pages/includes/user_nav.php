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
                $nb_notifs=1;
            ?>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                        <span class="badge badge-danger badge-counter"><?php echo $nb_notifs?></span>
                        <i class="fas fa-bell fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                        <h6 class="dropdown-header">notifications</h6>
                        <?php 
                            for ($i=0;$i<$nb_notifs;$i++){
                                $date="December 12, 2019";
                                $avatar="assets/img/avatars/avatar4.jpeg";
                                $disc="you got a new suggestion from username.";
                                echo '<a class="d-flex align-items-center dropdown-item" href="#">';
                                echo '<div class="mr-3"><img class="border rounded-circle" src="'.$avatar.'" style="width: 40px;"></div>';
                                echo '<div><span class="small text-gray-500">'.$date.'</span>';
                                echo '<p>'.$disc.'</p></div>';
                            }
                        ?>
                        <a class="text-center dropdown-item small text-gray-500" href="#">Show More</a>
                    </div>
                </div>
            </li>
            <?php 
                //get user name and user avatar 
                $username='Valerie Luna';
                $useravatar='"assets/img/avatars/avatar1.jpeg"';
            ?>
            <li class="nav-item dropdown no-arrow" role="presentation">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">

                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                            <?php echo $username; ?>
                        </span>
                        <img class="border rounded-circle img-profile" src=<?php echo $useravatar?>>
                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                        <a class="dropdown-item" role="presentation" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Profile
                        </a>
                        <a class="dropdown-item" role="presentation" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" role="presentation" href="javascript:void(0)">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            &nbsp;Logout
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>