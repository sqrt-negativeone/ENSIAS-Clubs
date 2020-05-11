<?php 
    //get the data about club requests from db
    $nb_req=1;
?>

<div class="row" data-aos="zoom-in-up">
    <div class="col">
        <div class="shadow card">
            <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">MEMBERSHIP REQUESTS</a>
            <div class="collapse show" id="collapse-4" style="padding-top: 20px;padding-left: 10px;">
                <div class="row">
                    <!--requests-->
                    <?php for ($i =0;$i<$nb_req;$i++){ 
                            $username='username';
                            $avatar='assets/img/avatars/avatar3.jpeg';
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
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="btn btn-success btn-sm btn-circle ml-1" role="button">
                                                            <i class="fas fa-check text-white"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a class="btn btn-danger btn-sm btn-circle ml-1" role="button">
                                                            <i class="fas fa-trash text-white"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><img class="border rounded-circle img-profile"  src=<?php echo htmlspecialchars($avatar) ?>></a></div>
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