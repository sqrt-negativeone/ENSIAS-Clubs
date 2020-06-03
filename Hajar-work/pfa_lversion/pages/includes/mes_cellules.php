<?php
//TODO: get the data about my clubs from db
// $nb_grp = 1;
$my_cells=$_SESSION['my_cells'];
for ($i = 0; $i < count($my_cells); $i++) {
    // $cellule_name = "cellule_name";
    // $cellule_pic = '"assets/img/dogs/image1.jpeg"';
?>

<div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <figure class="figure">
                        <!-- <img class="img-fluid figure-img" style="width: 100%;" src=<?php echo $cellule_pic ?>> -->
                        <figcaption class="figure-caption" style="font-size: 150%;">
                            <?php echo $my_cells[$i]['intitule'] ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-2">
                    <?php $url = 'cellules.php?target=' .urlencode($my_cells[$i]['intitule'])."&i=".$my_cells[$i]['id_cellule'] ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div> 
            </div>
        </div>
</div>

<?php } ?>