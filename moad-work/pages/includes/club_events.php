<?php
//get club events from db
$nb_evnts = 1;
for ($i = 0; $i < $nb_evnts; $i++) {
    $event_title = "EVENT TITLE";
    $discr = "Lorem ipsum dolor sit amet, consectetur
    adipiscing elit. Duis maximus nisl ac diam feugiat, non
    vestibulum libero posuere. Vivamus pharetra leo non
    nulla egestas, nec malesuada orci finibus.";
    $author = "cellule_name";
    $date = "dd-mm-yyyy";
    $pic = "assets/img/dogs/image1.jpeg";
?>
    <div class="card mb-4" data-aos="zoom-in-up">
        <div class="card-body d-flex">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12" style="background-image: url(<?php echo $pic ?>);background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;height: 500px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="text-center"><?php echo $event_title ?></h2>
                        <h3 class="text-center">from : <?php echo $author ?></h3>
                        <h3 class="text-center">date: <?php echo $date ?></h3>
                        <p class="text-left m-0"><br>
                            <?php echo $discr ?>
                            <br><br></p>
                    </div>
                </div>
                <?php if (strcmp($user_status, "PA")==0) { ?>
                    <div class="row" style="margin-top: 20px;margin-bottom: 10px;">
                        <div class="col"><button class="btn btn-primary" type="button" style="margin-left: 50%;">modify</button></div>
                        <div class="col"><button class="btn btn-primary float-right" type="button" style="margin-right: 50%;">delete</button></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>