<div class="modal fade" role="dialog" tabindex="-1" id="joinClub">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choisir la (les) cellules à rejoindre  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 50%;">
                
                <form method="post" action="functions/join_club_cells.php">
                    <ul class="list-group">
                        <?php 
                        $cells_join_club=$_SESSION['cells_join_club'];
                        for ($i=0; $i < count($cells_join_club); $i++) { 
                            $id="responsableCheck-1".$i;
                        ?>
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                      
                                        <div class="col mr-2" style="margin-left: 10px;">
                                            <!-- INTITULE CELLULE -->
                                            <span style="font-size: 120%;">
                                                <?php echo htmlspecialchars($cells_join_club[$i]['intitule']); ?>
                                            </span>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" value="<?php echo $cells_join_club[$i]['id_cellule']; ?>" id="<?php echo $id; ?>" name="join_club_cells[]">
                                                <label class="custom-control-label" for="<?php echo $id; ?>"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <?php } ?>
                    </ul>
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary" name="submit_join" type="submit">Valider</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>







<!-- <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body" style="padding-bottom: 0;">
                        <!--TODO: code the logic for the seach, the output will be affected to the list below-->
                        
                      <!--   <div class="form-group">
                            <div class="form-row">
                                <div class="col-2"><label class="col-form-label">Search</label></div>
                                <div class="col">
                                    <input class="form-control" type="text" name="search_pres" id="search_pres">
                                </div> -->
                                <!-- <div class="col-3" style="width: 15%;"><button class="btn btn-primary btn-sm" type="submit">search</button>
                                </div> -->
                       <!--      </div>
                        </div>
                        
                    </div>
                </div>  -->