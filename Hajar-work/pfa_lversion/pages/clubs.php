<?php 
session_start(); 
?>
    <?php 
        include_once "functions/get_cell_status.php";
        $statut=$_SESSION['statut'];
     ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clubs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!--will be visible for logged in users-->
        <?php 
            //TO-DO:MAINTAIN A NAVBAR FOR NOT LOGGED IN USERS AND RESTRICT THEIR NAVIGATION
            if ($is_connected){
                $select="none";
                include 'includes/nav.php';
            }
        ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!--will be visible for logged in users-->
                <?php 
                    if ($is_connected) include 'includes/user_nav.php'; 
                ?>
                
                <div class="container-fluid">
                    <!--will be visible for the none logged in users-->
                    <?php 
                        if (!$is_connected) include 'includes/notconnected.php';
                    ?>
                    <!--the cover picture of the club-->
                    <?php 
                    $cover=$n_club['photo'];
                    include 'includes/club_cover.php';
                    ?>
                    <br>
                    <h1 class="text-dark mb-1" data-aos="zoom-in-up" style="font-family: Comic Sans MS, sans Serif;">Welcome to  
                    <?php echo $n_club['nom_club']; ?> </h1>

                    <!--this section will be added only to adei president so he can add or replace the current president of the selected club -->
                    <?php 
                        if ($statut==="PA"){
                            include 'includes/change_club_pres.php';
                            include 'includes/new_cellule.php';
                            include 'includes/new_event.php';
                        }
                    ?>
                    
                    <!--this section will be added only to the club's president so he can accept membership requests-->
                    <?php 
                        if ($statut==="PC"){
                            include 'includes/club_requests.php';
                            include 'includes/new_cellule.php';
                            include 'includes/new_event.php';
                        } 
                    ?>
                    
                    <!--here the user's cellules will listed-->
                    <div class="row" data-aos="zoom-in-up" style="margin-bottom: 20px;margin-top: 20px;">
                        <div class="col">
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
                    <?php 
                    if ($statut!=='PC' and $statut!=='PA') {
                        echo '<div class="row" data-aos="zoom-in-up" style="margin-bottom: 20px;">
                        <div class="col">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0" style="font-size: 150%;">OTHER
                                        CELLULES</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!--the cellules data will be filled here-->'.include 'includes/other_cellules.php'.'                            </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                     ?>

                    <!--here the upcoming events section-->
                    <div class="row" data-aos="zoom-in-up">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h4 class="text-primary m-0 font-weight-bold">UPCOMING EVENTS</h4>
                                </div>
                                <div class="card-body border rounded-0">
                                    <div class="row" data-aos="zoom-in-up">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <!--this is where the event's data will be listed-->
                                                    <?php include 'includes/club_events.php' ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--this section will list the club members-->
                    <div class="row" data-aos="zoom-in-up">
                        <div class="col-xl-12">
                            <div>
                                <h1>Members :</h1>
                            </div>
                        </div>
                        <div class="col-4 mb-4" data-aos="zoom-in-up">
                            <div class="card shadow border-left-primary py-2">
                                <?php include 'includes/club_members.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--this modal will popup when the adei president click on change club president button -->
            <?php 
                if ($statut==="PA") include 'includes/choose_pres_menu.php'
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
    <script src="assets/js/choose_pres.js"></script>
    
</body>

</html>
 
