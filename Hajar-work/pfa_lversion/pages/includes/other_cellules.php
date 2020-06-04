<?php
//JOIN A CELL
// if (!isset($_SESSION['other_cells']) and $_SESSION['statut'] == 'PA') {
//     //ADEI PRESIDENT IS NOT A MEMBER OF THE CLUB -> POSSIBILITY TO JOIN ALL CELLS  
//     $not_my_cells=$_SESSION['my_cells'];
// }
$not_my_cells = $_SESSION['other_cells'];
for ($i = 0; $i < count($not_my_cells); $i++) {

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
                    <a class="btn btn-primary btn-join" role="button" href="javascript:void(0)" data-type='cellule' data-dist='<?php echo htmlspecialchars($not_my_cells[$i]['intitule']) ?>'>join</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>