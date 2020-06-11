<div class="card-body">
    <form action="functions/create_club.php" method="POST">
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Nom</label></div>
                <div class="col-8"><input class="form-control" type="text" name="name"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Acronyme</label></div>
                <div class="col-8"><input class="form-control" type="text" name="acro"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-4"><label class="col-form-label">Description</label>
                </div>
                <div class="col-8"><textarea class="form-control" name="descr"></textarea></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-auto mx-auto"><button class="btn btn-primary" name="create_club" type="submit">Créer</button></div>
        </div>
    </form>
</div>