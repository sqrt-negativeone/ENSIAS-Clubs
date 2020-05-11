<div class="modal fade" role="dialog" tabindex="-1" id="presidentSelection">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose new president</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 50%;">
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
                <form method="post" action="functions/new_president.php">
                <div>
                
                <ul class="list-group" >
                    <!--the data about the condidate will be listed here-->
                    <?php
                    //TODO: get about the condidats
                    $nb_membrs = count($_SESSION['all_students']);
                    for ($i = 0; $i < $nb_membrs; $i++) {
                        $username=strtoupper($_SESSION['all_students'][$i]['nom'])." ".ucfirst($_SESSION['all_students'][$i]['prenom']);
                        $photo="data:image/jpeg;base64,".base64_encode($_SESSION['all_students'][$i]['photo']);
                        //TODO: make only one member checked at any time
                    ?>
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <?php 
                                        if ($_SESSION['all_students'][$i]['photo']=='') {
                                            $photo='../../images/profile.png';
                                        }
                                         ?>
                                        <div class="col-auto"><img style="max-width: 50px; max-height: 50px;" class="border rounded-circle img-profile" src=<?php echo htmlspecialchars($photo)?>></div>
                                        <div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;"><?php echo $username ?></span></div>
                                        <?php 
                                            $id='responsableCheck-1'.$i;
                                            $cne=$_SESSION['all_students'][$i]['cne'];
                                        ?>
                                        <div class="col-auto align-self-center">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" value=<?php echo $cne; ?> type="radio" id=<?php echo $id ?> <?php if($_SESSION['presidentC']['cne']==$_SESSION['all_students'][$i]['cne']) echo "checked";?> name="new_president"><label class="custom-control-label" for=<?php echo $id ?>></label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="submit_pres" type="submit">Save</button>
                </div>
                </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
