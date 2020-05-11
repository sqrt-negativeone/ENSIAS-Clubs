<?php
//TODO: get the data about my clubs from db
for ($i = 0; $i < count($_SESSION['jclubs']); $i++) {
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <?php 

                         if ($_SESSION['jclubs'][$i]['logo']=="") {
                            echo '<img src="../images/profile.png" class="img-fluid figure-img" style="width: 100%;" />';
                         }else {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['jclubs'][$i]['logo'] ).'" class="img-fluid figure-img" style="width: 100%;"/>';
                         }
                         
                        ?>
                        <!--club name-->
                        <figcaption class="figure-caption" style="font-size: 150%;">
                            <!-- club name -->
                                <?php 
                                    echo $_SESSION['jclubs'][$i]['acro_club'];
                                 ?>
                                                            </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <?php $url = 'clubs.php?target=' . $_SESSION['jclubs'][$i]['acro_club']."&i=".$_SESSION['jclubs'][$i]['id_club'] ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

