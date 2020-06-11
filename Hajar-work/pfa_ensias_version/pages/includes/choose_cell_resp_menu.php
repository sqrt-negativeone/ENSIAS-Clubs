<div class="modal fade" role="dialog" tabindex="-1" id="responsableSelection">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter des responsables</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-body" style="padding-bottom: 0;">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-2"><label class="col-form-label">Search</label></div>
                                <div class="col">
                                    <input class="form-control" type="text" name="search_resp" id="search_resp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" action="functions/new_resp.php">
                    <ul class="list-group" id="result">

                    </ul>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="submit_resp">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>