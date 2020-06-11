<?php

for ($i = 0; $i < count($_SESSION['other_clubs']); $i++) {
   
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto; margin-bottom:1rem">
        <div class="card-body">
            <div class="row">
                <div class="col-auto mx-auto">
                    <figure class="figure">
                        <?php 

                             if ($_SESSION['other_clubs'][$i]['logo']=="") {
                                echo '<img src="../images/profile.png" class="img-fluid figure-img" style="width: 100%;" />';
                             }else {
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['other_clubs'][$i]['logo'] ).'" class="img-fluid figure-img" style="width: 100%;"/>';
                             }
                             
                            ?>
                            <!-- logo -->
                            <figcaption class="figure-caption" style="font-size: 150%;">
                                <!-- club name --> 
                                 <?php echo $_SESSION['other_clubs'][$i]['acro_club']; ?>
                                <!-- club name --> 
                            </figcaption>
                    </figure>
                </div>
            </div>
          
            <div class="row">
                <div class="col-auto mx-auto">
                    <button class="btn btn-primary btn-join" type="button" value='<?php echo htmlspecialchars($_SESSION['other_clubs'][$i]['id_club'])?>'>
                    Rejoindre
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
