<div class="row" >
    <div class="col" data-aos="zoom-in-up" style="margin-top: 10px;">
        <div class="shadow card">
            <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1" role="button" style="margin-bottom: 10px;">CREATE NEW CELLULE</a>
            <div class="collapse show" id="collapse-1">
                <form id="cel_form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="club" value=<?php echo htmlspecialchars($_GET['i']) ?>>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;">
                                <label class="col-form-label" style="margin-left: 10%;">Name</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" required="" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto m-auto"><button class="btn btn-primary" type="submit" onclick="new_cellule()">Create</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>