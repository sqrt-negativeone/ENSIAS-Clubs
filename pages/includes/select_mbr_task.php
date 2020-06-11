<div class="modal fade" role="dialog" tabindex="-1" id="selectMember">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choisissez des membres</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="functions/create_task.php">
                    <input type="hidden" name="titre" id="t_set">
                    <input type="hidden" name="date" id="d_set">
                    <input type="hidden" name="desc" id="de_set">

                    <ul class="list-group">
                        <?php
                        // DISPLAY THE LIST OF RESPONSABLES TO DELETE FROM
                        $member_cell = $_SESSION['all_cell_members'];
                        for ($i = 0; $i < count($member_cell); $i++) {
                            $username = strtoupper($member_cell[$i]['nom']) . " " . ucfirst($member_cell[$i]['prenom']);
                            $avatar = "data:image/jpeg;base64," . base64_encode($member_cell[$i]['photo']);

                            if ($member_cell[$i]['photo'] == '') {
                                $avatar = "../img/profile.png";
                            }

                            $id = "memberCheck-1" . $i;
                        ?>

                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-auto">
                                                <!-- PHOTO -->
                                                <img class="border rounded-circle img-profile" style="max-width: 50px; max-height: 50px;" src=<?php echo htmlspecialchars($avatar) ?>>
                                            </div>
                                            <div class="col mr-2" style="margin-left: 10px;">
                                                <!-- USERNAME -->
                                                <span style="font-size: 120%;"><?php echo htmlspecialchars($username) ?>
                                                </span>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" value="<?php echo $member_cell[$i]['cne']; ?>" id="<?php echo $id; ?>" name="sel_member[]">
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
                        <button class="btn btn-light" type="button" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary" type="submit" name="submit_sel">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>