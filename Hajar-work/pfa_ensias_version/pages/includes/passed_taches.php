<div class="card">
    <div class="card-body">
        <div class="card-header">
            <h5 style="color: rgb(140,20,20);">Tâches ratées</h5>
        </div>
<?php
$missed = $_SESSION['my_tasks_missed'];
for ($i = 0; $i < count($missed); $i++) {
    $tache_title=$missed[$i]['titre_tache'];
    $source=strtoupper($missed[$i]['nom'])." ".ucfirst($missed[$i]['prenom']);
    $desc=$missed[$i]['desc_tache'];
    $date=$missed[$i]['date_fin_tache'];
?>
    <li class="list-group-item" data-aos="zoom-in-up">
        <div class="row align-items-center no-gutters">
            <div class="col mr-2">
                <div>
                    <h5 class="mb-0"><strong><?php echo $tache_title?></strong></h5>
                    <p style="margin-top: -5px;margin-bottom: -5px;">Assignée par :
                        <?php echo htmlspecialchars($source)?></p>
                    <p style="margin-bottom: 0;margin-top: 10px;"><?php echo htmlspecialchars($desc) ?>
                        <br></p><span class="text-xs"><?php echo htmlspecialchars($date)?></span>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="card-header">
            <h5 style="color: rgb(20,140,25);">Tâches complétées</h5>
        </div>
<?php
$completed = $_SESSION['my_tasks_completed'];
for ($i = 0; $i < count($completed); $i++) {
    $tache_title=$completed[$i]['titre_tache'];
    $source=strtoupper($completed[$i]['nom'])." ".ucfirst($completed[$i]['prenom']);
    $desc=$completed[$i]['desc_tache'];
    $date=$completed[$i]['date_fin_tache'];
    $rmq=$completed[$i]['remarque'];
?>
    <li class="list-group-item" data-aos="zoom-in-up">
        <div class="row align-items-center no-gutters">
            <div class="col mr-2">
                <div>
                    <h5 class="mb-0"><strong><?php echo $tache_title?></strong></h5>
                    <p style="margin-top: -5px;margin-bottom: -5px;">Assignée par :
                        <?php echo htmlspecialchars($source)?></p>
                    <p style="margin-top: -5px;margin-bottom: -5px;">Description :
                        <?php echo htmlspecialchars($desc)?></p> 
                    <p style="margin-bottom: 0;margin-top: 10px;"><?php echo "Remarque : ".htmlspecialchars($rmq) ?>
                        <br></p><span class="text-xs"><?php echo htmlspecialchars($date)?></span>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
    </div>
</div>