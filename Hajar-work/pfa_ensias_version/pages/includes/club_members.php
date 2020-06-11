<?php
//get club events from db
$respos = $_SESSION['resposC'];
for ($i = 0; $i < count($respos); $i++) {
    $username = strtoupper($_SESSION['resposC'][$i]['nom']) . " " . ucfirst($_SESSION['resposC'][$i]['prenom']);
    $cell = $_SESSION['resposC'][$i]['intitule'];
    if ($_SESSION['resposC'][$i]['photo'] != '') {
        $pic = "data:image/*;base64," . base64_encode($_SESSION['resposC'][$i]['photo']);
    } else {
        $pic = "../img/profile.png";
    }

?>
    <div class="col-auto mb-4" data-aos="zoom-in-up">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters" style="margin-top: -16px;margin-bottom: -14px;">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                            <span style="font-size: 150%;"><?php echo htmlspecialchars($username)  ?></span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 100%;"><?php echo htmlspecialchars($cell)  ?></span></div>
                    </div>
                    <div class="col-auto"><img class="border rounded-circle img-profile" style="max-height: 50px; max-width: 50px;" src=<?php echo $pic ?>></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>