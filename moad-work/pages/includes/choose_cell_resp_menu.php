<div class="modal fade" role="dialog" tabindex="-1" id="responsableSelection">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose new responsable</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body" style="padding-bottom: 0;">
                        <!--TODO: implement the logic for search-->
                        <form>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-2"><label class="col-form-label">Search</label></div>
                                    <div class="col"><input class="form-control" type="search"></div>
                                    <div class="col-3" style="width: 15%;"><button class="btn btn-primary btn-sm" type="submit" onclick="search()">search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="list-group" id="search-out">
                    <!--the data about the condidate will be listed here-->
                    <?php
                    $nb_membrs = 2;
                    for ($i = 0; $i < $nb_membrs; $i++) {
                        $username="username";
                        $avatar="assets/img/avatars/avatar".($i+1).".jpeg";
                    ?>
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"><img class="border rounded-circle img-profile" src="<?php echo htmlspecialchars($avatar) ?>"></div>
                                        <div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;"><?php echo $username ?></span></div>
                                        <div class="col-auto align-self-center">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" data-target="<?php echo htmlspecialchars($_GET['target']) ?>" data-username="<?php echo htmlspecialchars($username) ?>" type="radio" id="responsableCheck-<?php echo $i?>" checked="" name="responsable">
                                                <label class="custom-control-label" for="responsableCheck-<?php echo $i?>"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" onclick="changeResp()">Save</button></div>
        </div>
    </div>
</div>