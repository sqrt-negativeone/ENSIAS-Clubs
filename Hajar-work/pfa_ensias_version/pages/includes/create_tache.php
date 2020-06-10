  
<div class="card shadow mb-4" data-aos="zoom-in-up">
    <div class="card-header py-3">
        <h6 class="text-primary m-0 font-weight-bold">CRÉR UNE TACHE</h6>
    </div>
    <div class="card-body">
        <form class="text-left" method="post" action="functions/create_task.php">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xl-3 offset-xl-1"><label class="col-form-label">Titre :</label></div>
                    <div class="col-xl-6 offset-xl-0"><input class="form-control" type="text" name="titre" id="titre" required=""></div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xl-3 offset-xl-1"><label class="col-form-label">Date limite :</label></div>
                    <div class="col-xl-6 offset-xl-0"><input class="form-control" type="datetime-local" name="date" id="date" required=""></div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xl-3 offset-xl-1"><label class="col-form-label">Description :</label></div>
                    <div class="col-xl-6 offset-xl-0"><textarea class="form-control" name="desc" id="desc" required=""></textarea></div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row justify-content-center">
                    <div class="col-auto">
                        <button class="btn btn-dark" style="margin: 0.5rem 0; width:150px;" type="submit" name="submit_dif">Diffusion à tous les membres</button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-dark" style="margin: 0.5rem 0; width:150px;" type="button" id="id_selectMember" onclick="return false;">Séléctionner des membres</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>