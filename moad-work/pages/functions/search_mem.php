<?php
//TODO: search for members with username == $_POST['key'] from db, if the $_POST['key'] is not set then search for all
//      the output should be an HTML like this

$nb_mem = 2;
for ($i = 0; $i < $nb_mem; $i++) {
    $username = "username".$i;
    $avatar = "assets/img/avatars/avatar".($i+1).".jpeg";
?>
    <div class="card shadow border-left-primary py-2" id="btn_mem_inf_<?php echo $i?>" onclick="show_prog('#btn_mem_inf_<?php echo $i?>')" data-username="<?php echo htmlspecialchars($username) ?>" data-aos="zoom-in-up" data-toggle="modal" data-target="#modal1" type="button" style="margin-bottom: 25px;width: 250px;margin-right: auto;margin-left: auto;">
        <div class="card-body" style="padding-top: 5px;padding-bottom: 5px;padding-right: 5px;padding-left: 5px;">
            <div class="row align-items-center no-gutters">
                <div class="col-auto">
                    <img class="border rounded-circle img-profile" src=<?php echo htmlspecialchars($avatar) ?>></div>
                <div class="col mr-2">
                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="margin-left: 5px;">
                        <span style="font-size: 120%;margin-left: 5px;"><?php echo htmlspecialchars($username) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>