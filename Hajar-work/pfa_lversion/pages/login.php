<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <?php include "includes/display_alerts.php"; ?>
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-9 col-xl-8">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="post" action="functions/login.php">
                                        <div class="form-group"><input class="form-control form-control-user"
                                                type="email" id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" required=""></div>
                                        <div class="form-group"><input class="form-control form-control-user"
                                                type="password" id="exampleInputPassword" placeholder="Password"
                                                name="password" required=""></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" name="remember" type="checkbox" id="remember">
                                                    <label class="form-check-label custom-control-label" for="remember">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" name="submit" type="submit">Login</button>
                                        <hr><!-- <a class="btn btn-primary btn-block text-white btn-google btn-user"
                                            role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a
                                            class="btn btn-primary btn-block text-white btn-facebook btn-user"
                                            role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with
                                            Facebook</a>
                                        <hr> -->
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot
                                            Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an
                                            Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
 