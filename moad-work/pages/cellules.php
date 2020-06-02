<?php
//TODO: redirect to login if not logged in
//TODO: redircte to dashboard if not member
include 'functions/get_cell_status.php'

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cellules</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        $select = "none";
        include 'includes/nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'includes/user_nav.php'; ?>

                <!--container-->
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Cellule : <?php echo htmlspecialchars($_GET['target']) ?></h3>
                    <!--this section will be visible for the club's president to change the cellule's responsable-->
                    <?php if (strcmp($cellule_status, 'PC') == 0) {
                        include 'includes/change_cell_resp.php';
                    } ?>
                    <!--visible for cellule members-->
                    <div class="row">
                        <div class="col-xl-6">
                            <!--this row is for creating a new tache -->
                            <div class="row">
                                <div class="col">
                                    <?php
                                    if (strcmp($cellule_status, 'RC') !== 0) {
                                        include 'includes/give_tache.php';
                                    }
                                    ?>
                                    <?php include 'includes/create_tache.php' ?>
                                </div>
                            </div>
                            <!--the taches whith passed deadline are listed here-->
                            <div class="row" data-aos="fade">
                                <div class="col">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary font-weight-bold m-0">COMPLETED TACHES</h6>
                                            <!--TODO: implemetnt the filter -->
                                            <div class="dropdown no-arrow">
                                                <button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">
                                                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                                                </button>
                                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                                                    <p class="text-center dropdown-header">FILTER</p><button class="btn btn-light" type="button" style="width: 100%;">All</button><button class="btn btn-light" type="button" style="width: 100%;">Completed</button><button class="btn btn-light" type="button" style="width: 100%;">Missed</button><button class="btn btn-light" type="button" style="width: 100%;">Mes
                                                        taches</button><button class="btn btn-light" type="button" style="width: 100%;">Par responsable</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <?php include 'includes/passed_taches.php' ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow mb-4" data-aos="zoom-in-up">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">MES TACHES</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php include 'includes/mes_taches.php' ?>
                                </ul>
                            </div>
                            <div class="card shadow mb-4" data-aos="zoom-in-up">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">TACHES PAR&nbsp;RESPONSABLE</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php include 'includes/respos_taches.php' ?>
                                </ul>
                            </div>
                            <!--visible for cellule responsabe, club president, and adei president, it shows member passed taches-->
                            <?php
                            if (strcmp($cellule_status, 'RC') == 0 || strcmp($cellule_status, 'PC') == 0 || strcmp($cellule_status, 'PA') == 0) {
                                include 'includes/see_taches.php';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--this modal will be poped up when clicking on a user, it shows his passed taches -->
            <?php
            if (strcmp($cellule_status, 'RC') == 0 || strcmp($cellule_status, 'PC') == 0 || strcmp($cellule_status, 'PA') == 0) {
                include 'includes/user_tache_menu.php';
            }
            ?>
            <?php if (strcmp($cellule_status, 'PC') == 0) {
                include 'includes/choose_cell_resp_menu.php';
            } ?>
            <!--this modal will popup when clicking on change the current responsable -->
            
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ENSIASClub 2020</span></div>
                </div>
            </footer>
        </div>

        <a class="border rounded d-inline scroll-to-top" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/cel_utils.js"></script>
</body>

</html>