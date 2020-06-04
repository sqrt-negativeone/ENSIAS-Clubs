<?php

//TODO: get the tache informations from db
$taches = $_SESSION['my_tasks_to_do'];
if ( count($taches) == 0) {

?>
<div class="card">
    <div class="card-body">
        Félicitations !! Aucune tâche ne vous a été assignée.
    </div>
</div>
<?php
}
for ($i = 0; $i < count($taches); $i++) {
    $tache_title=$taches[$i]['titre_tache'];
    $desc = $taches[$i]['desc_tache'];
    $date_creation = $taches[$i]['date_deb_tache'];
    $deadline=$taches[$i]['date_fin_tache'];
    $task_delegator=strtoupper($taches[$i]['nom'])." ".ucfirst($taches[$i]['prenom']);
?>
<li class="list-group-item" data-aos="zoom-in-up">
<div class="card"><div class="card-body">
    <div class="row align-items-center no-gutters">
        <div class="col mr-2">
            <div class="row">
                <div class="col">
                    <h5 class="mb-0"><strong><?php echo $tache_title?></strong></h5>
                    <p style="margin-bottom: 0;margin-top: 10px;">
                        <?php echo $desc?><br>
                    </p>
                    <span class="text-xs">Date de création : <?php echo $date_creation?></span>
                    <span class="float-right text-xs" style="margin-right: 1rem; color: red;">Date limite: <?php echo $deadline?></span>
                    
                    <div>
                        <span style="margin-right: 1rem;">Cette tâche vous a été assignée par <?php echo $task_delegator?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div></div>  

<div class="card mt-1"><div class="card-body">  
   <form action="functions/submit_task.php" method="POST" enctype="multipart/form-data">
       <div class="form-group">
            <div class="form-row">
                <div class="col-3"><label class="col-form-label" style="margin-left: 10%;">Votre travail</label></div>
                <div class="col-8">
                    <input type="file" accept="image/*" name="tache" required="">
                    <input type="hidden" name="id_tache" value=<?php echo $taches[$i]['id_tache']; ?>>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="submit" class="btn btn-success" style="width: 100px;margin-left: 30%;" name="submit_task" value="Soumettre">
                   <!--  <span class="text-white-50 icon"><i class="fas fa-check"></i>
                    </span>
                    <span class="text-white text">Done</span> -->
                </input>
            </div>
            
        </div>
   </form>
</div></div>     
</li>
<?php } ?>

<!-- RED DELETE BUTTON
<div class="col"><a class="btn btn-danger float-right btn-icon-split" role="button" style="width: 100px;margin-right: 30%;"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Delete</span></a></div> -->