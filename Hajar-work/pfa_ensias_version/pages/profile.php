<?php 
session_start();

if (!isset($_SESSION['cne'])) {
   header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
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
        $select = "profile";
        include 'includes/nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'includes/user_nav.php'; ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <?php 
                                    //GET PICTURE OR REPLACE IT
                                    if ($_SESSION['photo'] != '') {
                                        $photo = "data:image/*;base64,".base64_encode($_SESSION['photo']);
                                    }else{
                                        $photo = "../img/profile.png";
                                    }
                                      ?>                                   
                                    <div class="border rounded-circle" style="height: 160px;background-image: url(<?php echo htmlspecialchars($photo); ?>);background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;width: 160px;margin: 1rem auto;">
                                    </div>
                                    <form action="functions/edit_profile.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="file" accept="image/*" name="pic" required="" style="width: 100%;">
                                            <button class="btn btn-primary btn-sm" type="submit" name="submit_pic">Changer Photo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Paramètres</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="functions/edit_profile.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <div class="form-group">
                                                            <label for="cne"><strong>CNE</strong></label>
                                                            <input id="cne" disabled="" class="form-control" value="<?php echo htmlspecialchars($_SESSION['cne']); ?>" >
                                                        </div>
                                                        <div class="form-group">    
                                                            <label for="code"><strong>Code apogé</strong></label>
                                                            <input id="code" disabled="" class="form-control" placeholder="<?php echo htmlspecialchars($_SESSION['code_apoge']); ?>">
                                                        </div> 
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>Prénom</strong></label>
                                                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($_SESSION['prenom']); ?>" name="first_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name"><strong>Nom</strong></label>
                                                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($_SESSION['nom']); ?>" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="email"><strong>Addresse Email</strong></label>
                                                            <input class="form-control" type="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-auto">
                                                        <div class="form-group">
                                                            <input class="btn btn-primary btn-sm" type="submit" name="submit_pro" value="Sauvegarder paramètres">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $(window).on('load',function() {
            var msg = <?php echo isset($_SESSION['msg'])?json_encode($_SESSION['msg']):''?>;
            var context = <?php echo isset($_SESSION['context'])?json_encode($_SESSION['context']):''?>;
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
 