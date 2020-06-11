<div class="row" style="margin-bottom: 20px;">
    <div class="col" style="margin-top: 10px;" data-aos="zoom-in-up">
        <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-2" href="#collapse-2" role="button" style="margin-bottom: 10px;">CRÉER UN ÉVÈNEMENT</a>
            <div class="collapse show" id="collapse-2">
                <form method="post" action="functions/create_event.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Titre:</label></div>
                            <div class="col-8"><input class="form-control" type="text" name="titre" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Photo&nbsp;</label></div>
                            <div class="col-8 col-sm-2"><input type="file" style="margin-top: 1%;" name="photo" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Type&nbsp;</label></div>
                            <div class="col-8"><select class="form-control" name="type" required="">
                                    <optgroup label="Type de l'évènement">
                                        <option value="PR" selected="">Privé</option>
                                        <option value="PU">Public</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Date début</label></div>
                            <div class="col-8"><input class="form-control" type="datetime-local" name="date_deb" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Date fin</label></div>
                            <div class="col-8"><input class="form-control" type="datetime-local" name="date_fin" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Description de l'évènement</label></div>
                            <div class="col-7">
                                <textarea class="form-control" name="descr_event" required="">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto m-auto"><button class="btn btn-primary" type="submit" name="create_event">Créer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>