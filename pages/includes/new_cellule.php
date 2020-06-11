<div class="row" >
    <div class="col" style="margin-top: 10px;" data-aos="zoom-in-up">
        <div class="shadow card">
            <a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1" role="button" style="margin-bottom: 10px;">CRÉER UNE NOUVELLE CELLULE</a>
            <div class="collapse show" id="collapse-1">
                <form method="post" action="functions/create_cellule.php">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3" style="width: auto;"><label class="col-form-label" style="margin-left: 10%;">Nom de la cellule </label></div>
                            <div class="col-8"><input class="form-control" type="text" name="intitule" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto m-auto"><button class="btn btn-primary" name="create_cellule" type="submit">Créer</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
