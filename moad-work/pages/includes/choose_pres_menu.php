<div class="modal fade" role="dialog" tabindex="-1" id="presidentSelection">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose new president</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body" style="padding-bottom: 0;">
                        <!--TODO: code the logic for the seach, the output will be affected to the list below-->
                        <form >
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-2"><label class="col-form-label">Search</label></div>
                                    <div class="col"><input class="form-control" type="search"></div>
                                    <div class="col-3" style="width: 15%;"><button class="btn btn-primary btn-sm" type="submit">search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="list-group">
                    <!--the data about the condidate will be listed here-->
                    <?php
                    //TODO: get about the condidats
                    $nb_membrs = 1;
                    for ($i = 0; $i < $nb_membrs; $i++) {
                        $username="username";
                        //TODO: make only one member checked at any time
                    ?>
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></div>
                                        <div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;"><?php echo $username ?></span></div>
                                        <div class="col-auto align-self-center">
                                            <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="responsableCheck-1" checked="" name="responsable"><label class="custom-control-label" for="responsableCheck-1"></label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
        </div>
    </div>
</div>