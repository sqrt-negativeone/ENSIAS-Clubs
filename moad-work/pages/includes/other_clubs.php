<?php
//TODO: get the data about other clubs from db
$nb_grp = 1;
for ($i = 0; $i < $nb_grp; $i++) {
    $club_name = "club_name";
    $club_pic = '"assets/img/dogs/image2.jpeg"';

?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <img class="img-fluid figure-img" style="width: 100%;" src=<?php echo $club_pic ?>>
                        <figcaption class="figure-caption" style="font-size: 150%;">
                            <?php echo $club_name ?>
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