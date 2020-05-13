<?php 
session_start(); 
if (isset($_SESSION['statut'])) {
    $statut=$_SESSION['statut'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!--The sidebar nav-->
        <?php 
            $select="dashboard";
            include 'includes/nav.php';
        ?>

        <div class="d-flex flex-column" id="content-wrapper">

            <div id="content">
                <!--signed in user nav menu-->
                <?php include 'includes/user_nav.php'; ?>

                <div class="container-fluid">
                    <div>
                        <h3 class="text-dark mb-1" style="font-size: 250%;">Dashboard</h3>
                    </div>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col">
                            <div class="card" data-aos="zoom-in-up">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size: 150%;">MY CLUBS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php include 'includes/my_clubs.php';?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                     if (isset($statut) and $statut!=='PA') {                       
                     ?>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col">
                            <div class="card" data-aos="zoom-in-up">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size: 150%;">OTHER CLUBS
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                     <?php include 'includes/other_clubs.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
<!--                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 font-weight-bold" style="font-size: 150%;">EVENTS</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!--Here the upcoming events will be inserted as follow-->
                                    <?php //include 'includes/generalEvents.php';?>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
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
    <script src="assets/js/join.js"></script>
</body>

</html>
