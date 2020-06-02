<?php
//get club events from db
$nb_members = 1;
for ($i = 0; $i < $nb_members; $i++) {
    $username = "username";
    $status = "status";
    $pic = "assets/img/avatars/avatar1.jpeg";
?>
    <div class="col-auto mb-4" data-aos="zoom-in-up">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters" style="margin-top: -16px;margin-bottom: -14px;">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                            <span style="font-size: 150%;">user_name</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span style="font-size: 100%;">status</span></div>
                    </div>
                    <div class="col-auto"><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>