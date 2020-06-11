<div class="modal fade" role="dialog" tabindex="-1" id="modifyEvent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier un évènement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 50%;">
                <form method="post" action="functions/create_event.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_event" value="<?php echo $id_event; ?>">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Titre</label></div>
                            <div class="col-8"><input class="form-control" type="text" name="titre" value="<?php echo $event_title; ?>"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Photo </label></div>
                            <div class="col-8" style="margin-top: 1%;"><input type="file" name="photo"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Type&nbsp;</label></div>
                            <div class="col-8"><select class="form-control" name="type">
                                    <optgroup label="Type de l'évènement">
                                        <option value="PR" 
                                        <?php 
                                        if ($nature == 'PR') {
                                           echo "selected";
                                        }
                                         ?>
                                       >Privé</option>
                                        <option value="PU"
                                        <?php 
                                        if ($nature == 'PU') {
                                           echo "selected";
                                        }
                                         ?>
                                        >Public</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Date début</label></div>
                            <div class="col-8"><input class="form-control" type="datetime-local" name="date_deb" value="<?php echo
                            $date_deb ?>"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Date fin</label></div>
                            <div class="col-8"><input class="form-control" type="datetime-local" name="date_fin" value="<?php echo $date_fin ?>"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Description de l'évènement</label></div>
                            <div class="col-7">
                                <textarea class="form-control" name="descr_event">
                                    <?php echo $descr; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-dark" type="button" data-dismiss="modal">Fermer</button>
                    <button class="btn btn-primary" name="modify_event" type="submit">Valider</button>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
