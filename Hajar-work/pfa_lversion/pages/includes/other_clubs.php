<?php
//TODO: get the data about other clubs from db
$nb_grp = 1;
for ($i = 0; $i < count($_SESSION['njclubs']); $i++) {
   
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <?php 

                             if ($_SESSION['njclubs'][$i]['logo']=="") {
                                echo '<img src="../images/profile.png" class="img-fluid figure-img" style="width: 100%;" />';
                             }else {
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['njclubs'][$i]['logo'] ).'" class="img-fluid figure-img" style="width: 100%;"/>';
                             }
                             
                            ?>
                            <!-- logo -->
                            <figcaption class="figure-caption" style="font-size: 150%;">
                                <!-- club name --> 
                                 <?php echo $_SESSION['njclubs'][$i]['acro_club']; ?>
                                <!-- club name --> 
                            </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <a class="btn btn-primary btn-join" role="button" style="margin-left: 20%;" href="javascript:void(0)" data-type='club' data-dist='<?php echo htmlspecialchars($club_name) ?>'>join</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>