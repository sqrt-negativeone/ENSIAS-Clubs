<?php
    //GET CLUBS
    $sql_clubs = "select * from club";
    $stmt_clubs = $pdo -> query($sql_clubs);
    $clubs = $stmt_clubs -> fetchAll();
?>

<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white shadow clean-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="#"><img src="/PFA_ENSIAS/pfa_ensias_version/assets/img/Logo_light.png" width="80px"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Clubs</a>
                    <div class="dropdown-menu" role="menu">
                        <?php
                        foreach ($clubs as $club) {
                            $acro = $club['acro_club'];
                            $name = $club['nom_club'];
                            $id = $club['id_club'];
                            $href = "clubs.php?target=" . urlencode($acro) . '&i=' . urlencode($id);
                            echo '<a class="dropdown-item" role="presentation" href=' . $href . '>' . strtoupper($acro) . '</a>';
                        }
                        ?>
                <li class="nav-item" role="presentation"><a class="nav-link" href="login.php" style="font-size: 15px;"><b>Login</b></a>
                </li>
                <?php 
                if (isset($_SESSION['cne'])) {
                    //DISPLAY LOGOUT LINK
                ?>
                 <li class="nav-item" role="presentation"><a class="nav-link" href="functions/logout.php" style="font-size: 15px;"><b>Logout</b></a>
                </li>
                <?php
                }
                 ?>
            </ul>
        </div>
    </div>
</nav>