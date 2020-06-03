<?php 
require_once '../../../../pfa_db_connection/connexion.php'; 

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
                <div class="border rounded-0" data-aos="zoom-in-up" style="margin-bottom: 3rem;padding-bottom: 0.5rem;">
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-xl-9">
                            <div class="row">
                                <div class="col">
                                    <h3 class="float-right"><?php echo htmlspecialchars($username) ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="float-right">Sujet:&nbsp;<?php echo htmlspecialchars($subject) ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-0"><img class="rounded-circle" style="max-width: 100%; max-height: 100%;" src=<?php echo htmlspecialchars($avatar) ?>></div>
                    </div>
                    <div class="row">
                        <div class="col-xl-11 offset-xl-1" style="margin-top: 1rem;">
                            <p style="margin-bottom: -5px;margin-right: 1rem;"><?php echo htmlspecialchars($suggestion) ?><br><br></p><span><?php echo htmlspecialchars($date) ?></span>
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
                
            <?php } ?>
        </div>
    </div>
</div>