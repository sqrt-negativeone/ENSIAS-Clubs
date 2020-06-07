<div class="row">
    <div class="col-xl-11 offset-xl-0">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary m-0 font-weight-bold">SOUMETTRE UNE SUGGESTION</h6>
            </div>
            <div class="card-body">
                <form method="post" action="functions/treat_suggest.php">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4" style="width: auto;"><label class="col-form-label">Nature&nbsp;</label></div>
                            <div class="col-8"><select class="form-control" name="nature" required="">
                                    <optgroup label="Nature de l'intervention">
                                        <option class="form-control" value="PL">Plainte</option>
                                        <option class="form-control" value="SUG">Suggestion</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Sujet</label></div>
                            <div class="col-8"><input class="form-control" type="text" name="sujet" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Destination</label></div>
                            <div class="col-8">
                                <select class="form-control" name="dest" required="">
                                    <optgroup label="Club destinataire">
                                        <?php
                                        for ($i = 0; $i < count($list_all_clubs); $i++) {
                                        ?>
                                            <option class="form-control" value="<?php echo $list_all_clubs[$i]['id_club'] ?>"><?php echo $list_all_clubs[$i]['acro_club']  ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Description</label></div>
                            <div class="col-8"><textarea class="form-control" name="descr" required=""></textarea></div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <input class="btn btn-primary" type="submit" name="submit_suggest" value="Envoyer"></input>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>