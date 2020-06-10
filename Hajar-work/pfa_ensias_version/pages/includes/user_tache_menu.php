<?php 
if (isset($_SESSION['my_tasks_to_do'])) {
    $tasks = $_SESSION['my_tasks_to_do'];
    $count = count($_SESSION['my_tasks_to_do']);
    for ($i=0; $i < $count; $i++) { 
        $username = strtoupper($tasks[$i]['nom'])." ".ucfirst($tasks[$i]['prenom']);
        $titre = $tasks[$i]['titre_tache'];
        $desc = $tasks[$i]['desc_tache'];
        $date = $tasks[$i]['date_fin_tache'];

 ?>
<div class="modal fade" role="dialog" tabindex="-1" id="modal1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto"><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></div>
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="margin-left: 5px;"><span style="font-size: 120%;margin-left: 5px;"><?php echo $username; ?></span></div>
                    </div>
                </div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <!--taches data-->
                            <!--TODO : get data with AJAX-->
                            <li class="list-group-item" data-aos="zoom-in-up">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div>
                                            <h5 class="mb-0"><strong><?php echo htmlspecialchars($titre); ?></strong></h5>
                                            <h6>status:&nbsp;<span style="color: rgb(20,140,25);">À FAIRE</span></h6>
                                            <p style="margin-bottom: 0;margin-top: 10px;"><?php echo $desc; ?><br></p><span class="text-xs"><?php echo $date; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>