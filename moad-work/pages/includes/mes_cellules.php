<?php
//TODO: get the data about my clubs from db
$nb_grp = 1;
for ($i = 0; $i < $nb_grp; $i++) {
    $cellule_name = "cellule_name";
    $cellule_pic = '"assets/img/dogs/image1.jpeg"';
?>

    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <img class="img-fluid figure-img" style="width: 100%;" src=<?php echo $cellule_pic ?>>
                        <figcaption class="figure-caption" style="font-size: 150%;">
                            <?php echo $cellule_name ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <?php $url = 'cellules.php?target=' . $cellule_name ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>