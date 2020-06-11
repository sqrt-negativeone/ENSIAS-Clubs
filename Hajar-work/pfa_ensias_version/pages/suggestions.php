<?php
session_start();
require_once '../../../../pfa_db_connection/connexion.php';

if (!isset($_SESSION['cne'])) {
    if (!isset($_COOKIE["remember_me"])) header("Location:login.php");
    else {
        include 'functions/sign_in_cookie.php';
    }
}
$statut = $_SESSION['statut'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Suggestions</title>
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
        include "includes/display_alerts.php";
        $select = "suggestions";
        include 'includes/nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php
                include 'includes/user_nav.php'; ?>

                <div class="container-fluid">
                    <h1 class="text-dark mb-1">Exprimez vos idées et propositions!</h1>
                    <!--here where you write suggestion and send it to someone-->
                    <?php include 'includes/suggest.php' ?>
                    <div class="row">
                        <!--suggestion sent-->
                        <?php include 'includes/suggestions_sent.php' ?>
                        <!--suggestion received-->
                        <?php
                        // if ($statut == 'PC' or $statut == 'PA') {
                        include 'includes/suggestions_recieved.php';
                        // }
                        ?>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ENSIASClub 2020</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            var msg = <?php echo isset($_SESSION['msg']) ? json_encode($_SESSION['msg']) : '' ?>;
            var context = <?php echo isset($_SESSION['context']) ? json_encode($_SESSION['context']) : '' ?>;
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