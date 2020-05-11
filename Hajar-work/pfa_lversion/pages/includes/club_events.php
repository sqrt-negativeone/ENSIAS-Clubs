<?php
//get club events from db
if (count($events)==0) {
    echo '<div class="container">
    <h2 class="text-center text-capitalize">No Upcoming Events</h2>
</div>';
}
for ($i = 0; $i < count($events); $i++) {
    // $event_title = "EVENT TITLE";
    // $discr = "Lorem ipsum dolor sit amet, consectetur
    // adipiscing elit. Duis maximus nisl ac diam feugiat, non
    // vestibulum libero posuere. Vivamus pharetra leo non
    // nulla egestas, nec malesuada orci finibus.";
    // $author = "cellule_name";
    // $date = "dd-mm-yyyy";
    // $pic = "assets/img/dogs/image1.jpeg";
?>
    <div class="card mb-4" data-aos="zoom-in-up">
        <div class="card-body d-flex">
            <div class="col-xl-12">
                <div class="row">
                    <?php 
                    echo '<div class="col-xl-12" style="background-image: url(data:image/jpeg;base64,'.base64_encode($events[$i]['photo']).');background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;height: 500px;">
                    </div>';
                     ?>
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="text-center"><?php echo $events[$i]['titre'] ?></h2>
                        <h3 class="text-center">Date : <?php echo $events[$i]['date_deb'] ?></h3>
                    </div>
                </div>
                <?php if ($statut=="PA" or $statut=="PAC" or $statut=="PC") { ?>
                    <div class="row" style="margin-top: 20px;margin-bottom: 10px;">
                        <div class="col"><button class="btn btn-primary" type="button" style="margin-left: 50%;">modify</button></div>
                        <div class="col"><button class="btn btn-primary float-right" type="button" style="margin-right: 50%;">delete</button></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

