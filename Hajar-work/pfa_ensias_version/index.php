<?php require_once '../../../pfa_db_connection/connexion.php';
session_start();
if (!isset($_SESSION['cne'])) {
    if (isset($_COOKIE["remember_me"])) {
        //GET THE COOKIE VALUE
        list($user_cne, $hash) = explode(':', $_COOKIE["remember_me"]);
        //LOAD USER DATA
        $sql = "select * from etudiant where cne=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_cne]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            //CHECK IF VALIDE COOKIE
            if ($row["val_cookie"] == $_COOKIE["remember_me"]) {
                //SET USER DATA
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['photo'] = $row['photo'];
                $_SESSION['cne'] = $row['cne'];
                $_SESSION['code_apoge'] = $row['code_apoge'];
                include 'pages/functions/index-page.php';
                //CHANGE THE HASH VALUE
                $rand_val = md5(time() . $row["mpass"]);
                $val_cookie = $row["cne"] . ':' . $rand_val;
                $expire = 30 * 86400;
                setcookie("remember_me", $val_cookie, time() + $expire, "/");
                $sql = "update etudiant set val_cookie=? where (cne=? or code_apoge=?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$val_cookie, $row["cne"], $row["code_apoge"]]);
                $is_connected = true;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>

    <!--nav -->
    <?php
    include 'includes/clubs_events_index.php';
    include 'includes/nav.php' ?>

    <!--main-->
    <main class="page landing-page">
        <?php include 'includes/background-img.php' ?>

        <?php include 'includes/clubs.php' ?>

        <?php include 'includes/events.php' ?>
    </main>

    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="pages/register.php">Sign up</a></li>
                        <li><a href="pages/login.php">Login</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
        $(document).ready(() => {
            var ev = $(".carousel-img");
            ev.height(2 * ev.width() / 3);
            window.onresize = () => {
                ev.height(2 * ev.width() / 3);
            }
        })
    </script>
</body>

</html>