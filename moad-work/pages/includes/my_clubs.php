<?php
//TODO: get the data about my clubs from db
$nb_grp = 2;
for ($i = 0; $i < $nb_grp; $i++) {
    $club_name = "club_name";
    $club_pic = '"assets/img/dogs/image1.jpeg"';

?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto; margin-bottom:1rem">
        <div class="card-body">
            <div class="row">
                <div class="col-auto mx-auto">
                    <figure class="figure">
                        <img class="img-fluid" style="width: 100%;" src=<?php echo $club_pic ?> />
                        <figcaption class="figure-caption text-center" style="font-size: 150%;"><?php echo $club_name ?></figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <?php $url = 'clubs.php?target=' . $club_name ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>