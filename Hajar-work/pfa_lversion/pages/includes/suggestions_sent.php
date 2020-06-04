<?php 
include '../../../../pfa_db_connection/connexion.php';

$sql_ = "select * from avis_etudiant join club using (id_club)  where cne = ? ";
$stmt_ = $pdo -> prepare($sql_);
$stmt_ -> execute([$_SESSION['cne']]);
$stmt_->setFetchMode(PDO::FETCH_ASSOC);
$notifs['mes_suggests'] = $stmt_ -> fetchAll();

 ?>

<div class="col">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary m-0 font-weight-bold">Suggestions envoyées</h6>
        </div>
        <div class="card-body" style="padding-right: 30px;">
            <!--the suggestion data-->
            <?php
            //TODO: get data about suggestion from db
            $nb_sug = count($notifs['mes_suggests']);
            for ($i = 0; $i < $nb_sug; $i++) {
                $acro = strtoupper($notifs['mes_suggests'][$i]['acro_club']);
                $subject = $notifs['mes_suggests'][$i]['sujet'];
                 if ($notifs['mes_suggests'][$i]['logo'] == '') {
                    $avatar = "../img/profile.png";
                }else{
                    $avatar = "data:image/*;base64,".base64_encode($notifs['mes_suggests'][$i]['logo']);
                }
                $suggestion = $notifs['mes_suggests'][$i]['descr'];
                $date = $notifs['mes_suggests'][$i]['date_avis'];
                if ($notifs['mes_suggests'][$i]['nature'] == 'PL') {
                    $nature = "Plainte";
                }else{
                    $nature = "Suggestion";
                }

            ?>
                <div class="border rounded-0" data-aos="zoom-in-up" style="margin-bottom: 3rem;padding-bottom: 0.5rem;">
                    <div class="row justify-content-center" style="margin-top: 1rem;">
                        <div class="col-auto m-auto"><img class="rounded-circle" style="max-width: 100%; max-height: 100%;" src=<?php echo htmlspecialchars($avatar) ?>></div>
                        <div class="col-auto m-auto">
                            <h3><?php echo htmlspecialchars($acro) ?></h3>
                            <h5>Sujet:&nbsp;<?php echo htmlspecialchars($subject) ?></h5>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto m-auto" style="margin-top: 1rem;">
                            <p class="text-center" style="margin-bottom: -5px;margin-right: 1rem;"><?php echo htmlspecialchars($suggestion) ?><br><br></p>
                            <span style="font-style: italic;">Nature : 
                                <?php echo htmlspecialchars($nature) ?>
                            </span><br>

                            État : 
                            <?php 
                                if ($notifs['mes_suggests'][$i]['etat'] == 'V') {
                            ?>
                            <span style="font-style: italic; color: green">Validée</span>
                            <?php 
                                }else{
                            ?>
                                    <span style="font-style: italic; color: red">En attente</span>
                            <?php
                                }
                            ?>
                            <br>
                            Date d'envoi : 
                           <span style="font-style: italic;"><?php echo htmlspecialchars($date) ?></span><br>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>