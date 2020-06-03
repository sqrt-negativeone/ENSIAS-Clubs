<?php
 session_start();
 include "functions/get_filiere_register.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
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
        <?php 
            include "includes/display_alerts.php";
         ?>
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7 m-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="post" action="functions/register_info.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"
                                            type="text" id="exampleFirstName" placeholder="First Name" 
                                            name="first_name" required=""></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text"
                                            id="exampleFirstName" placeholder="Last Name" name="last_name" required=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <select class="form-control" name="annee" required="">
                                                <optgroup label="Année d'étude">
                                                    <option value="1">First year student</option>
                                                    <option value="2">Second year student</option>
                                                    <option value="3">Third year student</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="fil" required="">
                                                <optgroup label="Filière">
                                                <?php 
                                                    for ($i=0; $i < count($filiere); $i++) { 
                                                       echo '<option value="'.$filiere[$i]['id_filiere'].'">'.$filiere[$i]['acronyme'].'</option>';
                                                    }
                                                 ?>
                                                </optgroup>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text"
                                        id="exampleFirstName" placeholder="Code Apogée / CNE" name="code" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="email"
                                        id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address"
                                        name="email" required="">
                                </div>
                                <div class="form-group">
                                        <input class="form-control form-control-user"
                                            type="password" id="examplePasswordInput" placeholder="Password"
                                            name="password" onKeyUp="checkPasswordStrength();" required="">
                                        <div id="password-strength-status"></div>
                             
                                </div>
                                <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="register">Register</button>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account?
                                    Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/validate_password.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script type="text/javascript">
        $(window).on('load', function(){   
            var context = <?php echo json_encode($_SESSION['context']) ?>;
            var msg = <?php echo json_encode($_SESSION['msg']) ?>;
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