<div class="row">
    <div class="col-xl-11 offset-xl-0">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary m-0 font-weight-bold">MAKE SUGGESTION</h6>
            </div>
            <div class="card-body">
                <form action="functions/suggest.php" id="sug_form">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">title</label></div>
                            <div class="col-8"><input class="form-control" type="text" name="title" required></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">To&nbsp;</label></div>
                            <div class="col-8"><input class="form-control" type="search" name="to" required></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">subject</label></div>
                            <div class="col-8"><input class="form-control" type="text" name="subject" required></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">suggestion</label>
                            </div>
                            <div class="col-8"><textarea class="form-control" name="suggestion" required></textarea></div>
                        </div>
                    </div><button class="btn btn-primary" type="button" style="margin-left: 40%;" onclick="send()">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>