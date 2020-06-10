<?php
$my_cells=$_SESSION['my_cells'];
for ($i = 0; $i < count($my_cells); $i++) {
?>

<div class="card" data-aos="zoom-in-up" style="width: 300px;margin: 1rem auto">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="font-size: 150%;"><?php echo htmlspecialchars($my_cells[$i]['intitule']) ?></p>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <?php $url = 'cellules.php?target=' .urlencode($my_cells[$i]['intitule'])."&i=".$my_cells[$i]['id_cellule'] ?>
                    <a class="btn btn-primary" role="button" href=<?php echo htmlspecialchars($url) ?>>enter</a>
                </div> 
            </div>
        </div>
</div>

<?php } ?>