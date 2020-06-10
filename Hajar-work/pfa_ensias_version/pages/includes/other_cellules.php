<?php
//JOIN A CELL
// if (!isset($_SESSION['other_cells']) and $_SESSION['statut'] == 'PA') {
//     //ADEI PRESIDENT IS NOT A MEMBER OF THE CLUB -> POSSIBILITY TO JOIN ALL CELLS  
//     $not_my_cells=$_SESSION['my_cells'];
// }
$not_my_cells = $_SESSION['other_cells'];
for ($i = 0; $i < count($not_my_cells); $i++) {
$cellule_name = $not_my_cells[$i]['intitule'];
?>
    <div class="card" data-aos="zoom-in-up" style="width: 300px;margin-right: auto;margin-left: auto;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="font-size: 150%;"><?php echo $cellule_name ?></p>
                </div>
            </div>
            <form method="post" action="functions/join.php">
                <input type="hidden" name="id_cellule" value="<?php echo htmlspecialchars($not_my_cells[$i]['id_cellule']); ?>">
            <div class="row">
                <div class="col-auto mx-auto">
                    <button class="btn btn-primary btn-join" role="submit" name="join_cell">Rejoindre
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php } ?>