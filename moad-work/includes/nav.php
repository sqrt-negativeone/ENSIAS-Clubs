<?php
/* $sql = $pdo->query("select * from clubs ordered by date_fin ASC");
$clubs = $sql->fetchAll();
$n = $clubs->rowCount(); */
$n=0;
?>

<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white shadow clean-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="#"><img src="assets/img/Logo_light.png" width="80px"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="/index.php">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Clubs</a>
                    <div class="dropdown-menu" role="menu">
                        <?php
                        foreach ($clubs as $club) {
                            $name = $club['nom_club'];
                            $id = $club['id_club'];
                            $href = "/pages/clubs.php?target=" . $name . '&i=' . $id;
                            echo '<a class="dropdown-item" role="presentation" href=' . $href . '>' . strtoupper($name) . '</a>';
                        }
                        ?>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/pages/login.html" style="font-size: 15px;"><b>Login</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>