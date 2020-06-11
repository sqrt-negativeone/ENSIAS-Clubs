<div class="modal fade" role="dialog" tabindex="-1" id="responsableDeletion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supprimer un responsable</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="functions/new_resp.php">
                    <ul class="list-group">
                        <?php
                        // DISPLAY THE LIST OF RESPONSABLES TO DELETE FROM
                        $respo_cell = $_SESSION['respo_cell'];
                        for ($i = 0; $i < count($respo_cell); $i++) {
                            $username = strtoupper($respo_cell[$i]['nom']) . " " . ucfirst($respo_cell[$i]['prenom']);
                            $avatar = "data:image/jpeg;base64," . base64_encode($respo_cell[$i]['photo']);

                            if ($respo_cell[$i]['photo'] == '') {
                                $avatar = "../img/profile.png";
                            }

                            $id = "responsableCheck-1" . $i;
                        ?>

                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-auto">
                                                <!-- PHOTO -->
                                                <img class="border rounded-circle img-profile" style="width: 50px; height: 50px;" src=<?php echo htmlspecialchars($avatar) ?>>
                                            </div>
                                            <div class="col mr-2" style="margin-left: 10px;">
                                                <!-- USERNAME -->
                                                <span style="font-size: 120%;"><?php echo htmlspecialchars($username) ?>
                                                </span>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" value="<?php echo $respo_cell[$i]['cne']; ?>" id="<?php echo $id; ?>" name="del_resp[]">
                                                    <label class="custom-control-label" for=<?php echo $id; ?>></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="delete_resp">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>