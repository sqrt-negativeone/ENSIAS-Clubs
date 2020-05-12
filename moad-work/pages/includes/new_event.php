<div class="row" data-aos="zoom-in-up" style="margin-bottom: 20px;">
    <div class="col" style="margin-top: 10px;">
        <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-2" href="#collapse-2" role="button" style="margin-bottom: 10px;">CREATE EVENT</a>
            <div class="collapse show" id="collapse-2">
                <form id="event_form">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Title:</label></div>
                            <div class="col-auto"><input class="form-control" type="text" required="" name="title"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Picture&nbsp;</label></div>
                            <div class="col-auto col-sm-2"><input type="file" style="margin-top: 1%;" name="pic"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" required="" style="margin-left: 10%;">Cellule&nbsp;</label></div>
                            <div class="col-auto"><select class="form-control" name="cellule">
                                    <optgroup label="Cellules">
                                        <?php
                                        //TODO: GET THE CELLULE INFOS, value=cellule name
                                        $nb_options = 1;
                                        for ($i = 0; $i < $nb_options; $i++) {
                                            $cel_name="cellule";
                                            $cel_id=$i;
                                            echo '<option value="'.$cel_name.'">'.$cel_name.'</option>'
                                        ?>
                                        <?php } ?>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" required="" style="margin-left: 10%;">Date</label></div>
                            <div class="col-4"><input class="form-control" type="date" name="date"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3"><label class="col-form-label" style="margin-left: 10%;">Discreption&nbsp;</label></div>
                            <div class="col" style="padding-right: 10px;"><textarea name="description" class="form-control form-control-lg" spellcheck="true" required="" style="margin-right: 10px;"></textarea></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto m-auto"><button class="btn btn-primary" type="submit" onclick="new_event()">POST</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>