<?php
//TODO: get the data about other clubs from db
$nb_grp = 1;
for ($i = 0; $i < $nb_grp; $i++) {
    $cellule_name = "cellule_name";
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="font-size: 150%;"><?php echo $cellule_name ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                <a class="btn btn-primary btn-join" role="button" style="margin-left: 20%;" href="javascript:void(0)" data-type='cellule' data-dist='<?php echo htmlspecialchars($cellule_name) ?>'>join</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
