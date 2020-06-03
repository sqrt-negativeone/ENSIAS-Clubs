<?php
//TODO: get the data about my clubs from db
$my_clubs=$_SESSION['my_clubs'];
//P ADEI ADD NOT JOINED CLUBS ALSO
if ($_SESSION['statut'] == 'PA') {
    $my_clubs[count($my_clubs)] = $_SESSION['other_clubs'];
}
for ($i = 0; $i < count($my_clubs); $i++) {
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <?php 

                         if ($my_clubs[$i]['logo']=="") {
                            echo '<img src="../images/profile.png" class="img-fluid figure-img" style="width: 100%;" />';
                         }else {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($my_clubs[$i]['logo'] ).'" class="img-fluid figure-img" style="width: 100%;"/>';
                         }
                         
                        ?>
                        <!--club name-->
                        <figcaption class="figure-caption" style="font-size: 150%;">
                            <!-- club name -->
                                <?php 
                                    echo $my_clubs[$i]['acro_club'];
                                 ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <?php $url = 'clubs.php?target=' . urlencode($my_clubs[$i]['acro_club']).'&i='.$my_clubs[$i]['id_club'] ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>Accéder</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

