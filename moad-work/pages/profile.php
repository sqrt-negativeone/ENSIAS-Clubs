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
                                    <div class="border rounded-circle" style="height: 160px;background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;width: 160px;margin: 1rem auto;">
                                    </div>
                                    <form action="functions/update_pic.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="file" accept="image/*" name="pic" style="width: 100%;">
                                            <button class="btn btn-primary btn-sm" type="submit">Change Photo</button>
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
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="functions/change_usr_settings.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>First Name</strong></label>
                                                            <input class="form-control" type="text" placeholder="John" name="first_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name"><strong>Last Name</strong></label>
                                                            <input class="form-control" type="text" placeholder="Doe" name="last_name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="email"><strong>Email Address</strong></label>
                                                            <input class="form-control" type="email" placeholder="user@example.com" name="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email"><strong>Old Password</strong></label>
                                                            <input class="form-control" type="password" name="old_pass">
                                                            <label for="email"><strong>New Password</strong></label>
                                                            <input class="form-control" type="password" name="new_pass">
                                                            <label for="email"><strong>Repeat Password</strong></label>
                                                            <input class="form-control" type="password" name="rep_pass">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
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
</body>

</html>