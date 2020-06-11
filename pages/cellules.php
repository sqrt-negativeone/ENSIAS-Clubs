<?php
session_start();
if (!isset($_SESSION['cne'])) {
    if (!isset($_COOKIE["remember_me"])) header("Location:login.php");
    else {
        include 'functions/sign_in_cookie.php';
    }
}
include 'functions/cell_tasks_respo.php';
if ($_SESSION['statut'] != '') {
    $cellule_status = $_SESSION['statut'];
} else {
    $cellule_status = $cell['statut'];
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include "includes/display_alerts.php";
        $select = "none";
        include 'includes/nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'includes/user_nav.php'; ?>

                <!--container-->
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Cellule : <?php echo htmlspecialchars($_GET['target']); ?></h3>
                    <!--this section will be visible for the club's president to change the cellule's responsable-->

                    <div class="col-auto align-self-center">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger btn-icon-split" role="button" data-toggle="modal" data-target="#quitCell">
                                    <span class="text-white-50 icon"><i class="fa fa-close"></i></span>
                                    <span class="text-white text">Quitter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
                    <?php
                    include 'includes/change_cell_resp.php';
                    ?>
                    <!--visible for cellule members-->
                    <div class="row">
                        <div class="col-xl-6">
                            <!--this row is for creating a new tache -->
                            <div class="row">
                                <div class="col">
                                    <?php
                                    if (strcmp($cellule_status, 'M') != 0) {
                                        include 'includes/create_tache.php';
                                    }
                                    ?>

                                </div>
                            </div>
                            <!--the taches whith passed deadline are listed here-->
                            <div class="row" data-aos="fade">
                                <div class="col">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary font-weight-bold m-0">HISTORIQUE DE MES TACHES</h6>
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
                            <?php
                            if (strcmp($cellule_status, 'M') != 0) {
                            ?>
                                <div class="card shadow mb-4" data-aos="zoom-in-up">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary font-weight-bold m-0">SOUMISSIONS DES TACHES</h6>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php include 'includes/respos_taches.php' ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <!--visible for cellule responsabe, club president, and adei president, it shows member passed taches-->
                            <?php
                            if (strcmp($cellule_status, 'R') == 0 || strcmp($cellule_status, 'PC') == 0 || strcmp($cellule_status, 'PA') == 0) {
                                include 'includes/see_taches.php';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (strcmp($cellule_status, 'PC') == 0 or strcmp($cellule_status, 'PA') == 0) {
                include 'includes/choose_cell_resp_menu.php';
                include 'includes/delete_cell_resp_menu.php';
            } ?>
            <!--this modal will popup when clicking on change the current responsable -->

            <?php
            if (strcmp($cellule_status, 'PC') == 0 or strcmp($cellule_status, 'R') == 0) {
                echo
                    '<div class="modal fade" role="dialog" tabindex="-1" id="pdp-container">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div><img width="100%"><i class="fa fa-close" data-dismiss="modal"></i></div>
                            </div>
                        </div>
                    </div>';
            } ?>
            <!-- pop-up modal submission image -->

            <?php
            if (strcmp($cellule_status, 'R') == 0 || strcmp($cellule_status, 'PC') == 0) {
                include 'includes/select_mbr_task.php';
            }
            
            include 'includes/make_sure_quit.php';
            ?>
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
    <script src="assets/js/choose_resp.js"></script>
    <script src="assets/js/check_validity.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            // body...
            var cfr = <?php echo json_encode($_SESSION['confirm']); ?>;
            if (cfr == 'yes') {
                $('#modal1').modal('show');
            }
            var msg = <?php echo json_encode($_SESSION['msg']); ?>;
            var context = <?php echo json_encode($_SESSION['context']); ?>;

            if (msg != '' && context != '') {
                $('#alertModal').modal('show');
            }


        });
    </script>
</body>
<?php
unset($_SESSION['msg']);
unset($_SESSION['context']);
?>

</html>
