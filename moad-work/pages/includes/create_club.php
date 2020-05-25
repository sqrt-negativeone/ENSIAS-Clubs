<div class="card-body">
    <form action="funcitons/create_club.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Name</label></div>
                <div class="col-5"><input class="form-control" type="text" name="name"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Cover</label></div>
                <div class="col-5"><input type="file" accept="image/*" name="cover"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Discreption</label>
                </div>
                <div class="col-5"><textarea class="form-control" name="discr"></textarea></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-auto mx-auto"><button class="btn btn-primary" type="submit">Create</button></div>
        </div>
    </form>
</div>