<div class="shadow card" data-aos="zoom-in-up">
    <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">MEMBERS</a>
    <div class="collapse show" id="collapse-4">
        <div class="card-body">
            <div class="col-xl-12" style="margin-right: auto;margin-left: auto;">
                <div class="row" style="margin-bottom: -10px;">
                    <div class="col">
                        <div class="card" style="margin-bottom: 30px;">
                            <div class="card-body" style="padding-bottom: 0;">
                                <!--TODO: implement the search feature-->
                                <form>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col"><input class="form-control" type="search" placeholder="Search">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <?php
                        $nb_mem = 1;
                        for ($i = 0; $i < $nb_mem; $i++) {
                            $username="username";
                            $avatar="assets/img/avatars/avatar1.jpeg";
                        ?>
                            <div class="card shadow border-left-primary py-2" data-aos="zoom-in-up" data-toggle="modal" data-target="#modal1" type="button" style="margin-bottom: 25px;width: 250px;margin-right: auto;margin-left: auto;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>