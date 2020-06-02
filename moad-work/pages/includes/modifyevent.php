<div class="modal fade" role="dialog" tabindex="-1" id="modifyEvent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modify Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <form id="mod_event_form" method="POST" enctype="multipart/form-data" action="functions/update_ev.php">
                    <input type="hidden" value="" name="id_event">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Title:</label></div>
                            <div class="col-auto"><input class="form-control" type="text" required="" name="title"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Picture&nbsp;</label></div>
                            <div class="col-auto col-sm-2">
                                <input type="file" style="margin-top: 1%;" name="pic">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;">
                                <label class="col-form-label" style="margin-left: 10%;">Video</label>
                            </div>
                            <div class="col-auto col-sm-2"><input type="file" style="margin-top: 1%;" name="vid"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" required="" style="margin-left: 10%;">Date</label></div>
                            <div class="col-auto"><input class="form-control" type="date" name="date"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3"><label class="col-form-label" style="margin-left: 10%;">Discreption&nbsp;</label></div>
                            <div class="col" style="padding-right: 10px;"><textarea name="description" class="form-control form-control-lg" spellcheck="true" required="" style="margin-right: 10px;"></textarea></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="up-btn" type="button" >Save</button>
            </div>
        </div>
    </div>
</div>