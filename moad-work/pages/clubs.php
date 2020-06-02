<?php
//TODO :test if the club exist in the db, if not redirect to 404.html
//TODO :add a nav menu for none connected users
//get user infos to control what to display
include 'functions/set_user_club_infos.php';
//for debug
$GLOBALS['is_connected'] = false;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clubs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-1.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top" style="background-color: #F8F9FC;">
    <div id="wrapper">
        <?php
        if (!isset($GLOBALS['is_connected'])) {
            $GLOBALS['is_connected'] = false;
        }
        if ($GLOBALS['is_connected']) {
            $select = "none";
            include 'includes/nav.php';
        } else {
            include '../includes/nav.php';
        }
        ?>
        <?php
        if ($GLOBALS['is_connected']) echo '<div class="d-flex flex-column" id="content-wrapper">';
        else echo '<div class="d-flex flex-column" id="content-wrapper" style="margin-top: 100px;width: 900px;margin-right: auto;margin-left: auto;">'
        ?>
        <div id="content">
            <!--will be visible for logged in users-->
            <?php
            if ($GLOBALS['is_connected']) include 'includes/user_nav.php';
            ?>

            <div class="container-fluid">
                <!--will be visible for the none logged in users-->
                <?php
                if (!$GLOBALS['is_connected']) include 'includes/notconnected.php';
                ?>
                <!--the cover picture of the club-->
                <?php include 'includes/club_cover.php' ?>

                <?php
                if ($user_status === "PA") {
                    include 'includes/change_club_pres.php';
                    include 'includes/modify_club_settings.php';
                    include 'includes/new_cellule.php';
                    include 'includes/new_event.php';
                }
                ?>

                <!--this section will be added only to the club's president so he can accept membership requests-->
                <?php
                if ($user_status === "PC") {
                    include 'includes/club_requests.php';
                }
                ?>
                <?php
                // for the none logged users, a list of all the cellules of the club will be listed
                if (false) include 'includes/club_cellules.php';
                else {

                ?>
                    <!--here the user's cellules will listed-->
                    <div class="row" style="margin-bottom: 20px;margin-top: 20px;">
                        <div class="col" data-aos="zoom-in-up">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size: 150%;">MES CELLULES
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!--the cellules data will be here-->
                                        <?php include 'includes/mes_cellules.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--other celluls will be listed in this section-->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col" data-aos="zoom-in-up">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size: 150%;">OTHER
                                        CELLULES</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!--the cellules data will be filled here-->
                                        <?php include 'includes/other_cellules.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--here the upcoming events section-->
                <div class="row">
                    <div class="col" data-aos="zoom-in-up">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4 class="text-primary m-0 font-weight-bold">UPCOMING EVETS</h4>
                            </div>
                            <div class="card-body border rounded-0">
                                <div class="row" data-aos="zoom-in-up">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <!--this is where the event's data will be listed-->
                                                <?php include 'includes/club_events.php' 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--this section will list the club members-->
                <div class="row" >
                    <div class="col-xl-12" >
                        <div class="row">
                            <div class="col" data-aos="zoom-in-up">
                                <div>
                                    <h1>Members :</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php include 'includes/club_members.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php
        include 'includes/events_modal.php';
        if ($user_status === "PA") {
            include 'includes/choose_pres_menu.php';
            include 'includes/modifyevent.php';
        }
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
    <script src="assets/js/join.js"></script>
    <script src="assets/js/club_utils.js"></script>
    <script src="assets/js/Swiper-Slider-Card.js"></script>

</body>

</html>