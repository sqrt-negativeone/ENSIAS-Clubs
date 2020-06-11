<?php

$my_clubs = $_SESSION['my_clubs'];
//P ADEI ADD NOT JOINED CLUBS ALSO
if ($_SESSION['statut'] == 'PA' and isset($_SESSION['other_clubs'])) {
    $count = count($my_clubs);
    for ($k = 0; $k < count($_SESSION['other_clubs']); $k++) {
        $my_clubs[$count + $k] = $_SESSION['other_clubs'][$k];
    }
}

for ($i = 0; $i < count($my_clubs); $i++) {
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto; margin-bottom:1rem">
        <div class="card-body">
            <div class="row">
                <div class="col-auto mx-auto">
                    <figure class="figure">
                        <?php

                        if ($my_clubs[$i]['logo'] == "") {
                            echo '<img src="../img/profile.png" class="img-fluid figure-img" style="width: 100%;" />';
                        } else {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($my_clubs[$i]['logo']) . '" class="img-fluid figure-img" style="width: 100%;"/>';
                        }

                        ?>
                        <!--club name-->
                        <figcaption class="figure-caption text-center" style="font-size: 150%;">
                            <!-- club name -->
                            <?php
                            echo $my_clubs[$i]['acro_club'];
                            ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <?php $url = 'clubs.php?target=' . urlencode($my_clubs[$i]['acro_club']) . '&i=' . $my_clubs[$i]['id_club'] ?>
                    <a class="btn btn-primary" role="button" href=<?php echo htmlspecialchars($url) ?>>Accéder</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>