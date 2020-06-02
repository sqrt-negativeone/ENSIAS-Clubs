<div class="row"  style="margin-bottom: 20px;">
    <div class="col" data-aos="zoom-in-up" style="margin-top: 10px;">
        <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-2" href="#collapse-2" role="button" style="margin-bottom: 10px;">CREATE EVENT</a>
            <div class="collapse show" id="collapse-2">
                <form id="event_form" method="POST" enctype="multipart/form-data" action="functions/create_event.php">
                    <input type="hidden" name="club_id" value=<?php echo $_GET['i'] ?>>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Title:</label></div>
                            <div class="col-8"><input class="form-control" type="text" required="" name="title"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Picture&nbsp;</label></div>
                            <div class="col-8"><input type="file" style="margin-top: 1%;" name="pic" accept="image/png, image/jpeg"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;">
                                <label class="col-form-label" style="margin-left: 10%;">Video</label>
                            </div>
                            <div class="col-8"><input type="file" style="margin-top: 1%;" name="vid" accept="video/mp4"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" required="" style="margin-left: 10%;">Date</label></div>
                            <div class="col-8"><input class="form-control" type="date" name="date"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Description&nbsp;</label></div>
                            <div class="col-7"><textarea name="description" class="form-control form-control-lg" spellcheck="true" required="" style="margin-right: 10px;"></textarea></div>
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