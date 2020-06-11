<?php 
     include "functions/get_notifications.php";
    //get the data about club requests from db
    $notifs=$notifs['membership'];

?>


<div class="row" data-aos="zoom-in-up">
    <div class="col">
        <div class="shadow card">
            <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">DEMANDES D'INSCRIPTION</a>
            <div class="collapse show" id="collapse-4" style="padding-top: 20px;padding-left: 10px;">
                <div class="row">
                    <?php 
                    if ( count($notifs) == 0) {
                     ?>
                    <div class="card-body">
                        Aucune demande d'inscription pour le moment.
                    </div>
                    <?php } ?>
                    <!--requests-->
                    <?php for ($i =0;$i<count($notifs);$i++){ 
                            $username=strtoupper($notifs[$i]['nom'])." ".ucfirst($notifs[$i]['prenom']);
                            $cellule="Cellule : ".$notifs[$i]['intitule'];
                             $avatar="data:image/*;base64,".base64_encode($notifs[$i]['photo']);
                                if ($notifs[$i]['photo'] == '') {
                                   $avatar = "../img/profile.png";
                                }
                    ?>
                        
                        <div class="col-md-6 col-xl-4 mb-4" data-aos="zoom-in-up">
                            <div class="card shadow border-left-primary py-2" style="width: 250px;margin-left: 10px;">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters" style="margin-top: -19px;margin-bottom: -18px;">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                                <div class="row">
                                                    <div class="col" style="margin-bottom: 5px;">
                                                        <span class="text-left" style="font-size: 150%;margin-left: 17%;"><?php echo htmlspecialchars($username) ?></span>
                                                        <span class="text-left" style="font-size: 150%;margin-left: 17%;"><?php echo htmlspecialchars($cellule) ?></span>
                                                    </div>
                                                </div>
                                                <form method="post" action="functions/check_requests.php">
                                                    <input type="hidden" value="<?php echo htmlspecialchars($notifs[$i]['cne']) ?>" name="cne">
                                                    <input type="hidden" value="<?php echo htmlspecialchars($notifs[$i]['id_cellule']) ?>" name="id_cellule">
                                                    <div class="row">
                                                        <div class="col">
                                                            <button class="btn btn-success btn-sm btn-circle ml-1" role="submit" name="validate">
                                                                <i class="fas fa-check text-white"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-danger btn-sm btn-circle ml-1" role="submit" name="delete">
                                                                <i class="fas fa-trash text-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><img class="border rounded-circle img-profile" style="max-height: 50px; max-width: 50px;" src=<?php echo htmlspecialchars($avatar) ?>></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>