<div class="shadow card" data-aos="zoom-in-up">
    <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">MEMBERS</a>
    <div class="collapse show" id="collapse-4">
        <div class="card-body">
            <div class="col-xl-12" style="margin-right: auto;margin-left: auto;">
                <div class="row" style="margin-bottom: -10px;">
                    <div class="col">
                        <div class="card" style="margin-bottom: 30px;">

                        </div>
                    </div>
                </div>
                <hr>
                <?php 
                if (isset($_SESSION['all_cell_members'])) {
                           $all = $_SESSION['all_cell_members'];
                           $count = count($all);
                 ?>
                <div class="row">
                    <div class="col">
                        <?php
                        for ($i = 0; $i < $count; $i++) {
                            $username=strtoupper($all[$i]['nom'])." ".ucfirst($all[$i]['prenom']);
                            if ($all[$i]['photo'] != '') {
                                $avatar="data:image/*;base64,".base64_encode($all[$i]['photo']);
                            }else{
                                $avatar = "../img/profile.png";
                            }
                            
                        ?>
                            
                                <div class="card shadow border-left-primary py-2" data-aos="zoom-in-up" type="button" style="margin-bottom: 25px;width: 100%;margin-right: auto;margin-left: auto;">
                                    <div class="card-body" style="padding-top: 5px;padding-bottom: 5px;padding-right: 5px;padding-left: 5px;">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-auto">
                                                <img style="height: 50px; width: 50px;" class="border rounded-circle img-profile" src=<?php echo htmlspecialchars($avatar) ?>></div>
                                            <div class="col-auto mr-2">
                                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="margin-left: 5px;">
                                                    <span style="font-size: 120%;margin-left: 5px;"><?php echo htmlspecialchars($username) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
