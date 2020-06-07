<?php 
require_once '../connect.php'; 

 ?>

<div class="col">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary m-0 font-weight-bold">Suggestions reçues</h6>
        </div>
        <div class="card-body" style="padding-right: 30px;">
            <?php
            //TODO: get data about suggestion from db
            $nb_sug = count($notifs['suggests']);
            for ($i = 0; $i < $nb_sug; $i++) {
                $username = strtoupper($notifs['suggests'][$i]['nom'])." ".ucfirst($notifs['suggests'][$i]['prenom']);
                $subject = $notifs['suggests'][$i]['sujet'];
                if ($notifs['suggests'][$i]['photo'] == '') {
                    $avatar = "../img/profile.png";
                }else{
                    $avatar = "data:image/*;base64,".base64_encode($notifs['suggests'][$i]['photo']);
                }
                
                $suggestion = $notifs['suggests'][$i]['descr'];
                $date = $notifs['suggests'][$i]['date_avis'];
            ?>
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col border rounded-0">
                        <div class="row justify-content-center" style="margin-top: 1rem;">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="float-right" style="font-size: 130%;"><?php echo htmlspecialchars($username) ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="float-right" style="font-size: 100%;">subject:&nbsp;<?php echo htmlspecialchars($subject) ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto ml-auto"><img class="rounded-circle" src=<?php echo htmlspecialchars($avatar) ?> /></div>
                        </div>
                        <div class="row">
                            <div class="col-xl-11 offset-xl-1" style="margin-top: 1rem;">
                                <p class="text-center"><?php echo htmlspecialchars($suggestion) ?><br><br></p><span class="float-right" style="margin-right: 1rem;"><?php echo htmlspecialchars($date) ?></span>
                            </div>
                        </div>
                        <div>
                            <form method="post" action="functions/treat_suggest.php">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-3 offset-xl-1"><label class="col-form-label">Remarques :</label></div>
                                        <div class="col-xl-6 offset-xl-0"><textarea class="form-control" name="rmq" required=""></textarea></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-3 offset-xl-1"></div>
                                        <div class="col-xl-6 offset-xl-0"><input type="hidden" name="id_avis" value="<?php echo htmlspecialchars($notifs['suggests'][$i]['id_avis']) ?>">
                                            <input type="submit" name="remarque_sug" class="btn btn-primary" style="margin-left: 30%;" value="Valider"></div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                
            <?php } ?>
        </div>
    </div>
</div>