<?php
//TODO: get the data about my clubs from db
$nb_grp = 1;
for ($i = 0; $i < $nb_grp; $i++) {
    $cellule_name = "cellule_name";
?>

    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin: 1rem auto">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="font-size: 150%;"><?php echo $cellule_name ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <?php $url = 'cellules.php?target=' . $cellule_name ?>
                    <a class="btn btn-primary" role="button" style="margin-left: 20%;" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>