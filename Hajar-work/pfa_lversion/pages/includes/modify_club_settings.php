<?php 
$clb_name=$n_club['nom_club'];
$clb_descr=$n_club['texte_desc'];
$clb_acro=$n_club['acro_club'];
?>
<div class="row">
    <div class="col" data-aos="zoom-in-up" style="margin-top: 10px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary m-0 font-weight-bold">MODIFIER LES PARAMÈTRES DU CLUB</h6>
            </div>
            <div class="card-body">
                <form action="functions/chg_clb_settings.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Nom du club</label></div>
                            <div class="col-8"><input class="form-control" type="text" required="" value="<?php echo htmlspecialchars($clb_name) ?>" name="nom_club"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Acronyme du club</label></div>
                            <div class="col-8"><input class="form-control" type="text" required="" value="<?php echo htmlspecialchars($clb_acro) ?>" name="acro_club"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Photo du club</label></div>
                            <div class="col-8"><input type="file" accept="image/*" name="photo"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Logo du club</label></div>
                            <div class="col-8"><input type="file" accept="image/*" name="logo"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label" style="margin-left: 10%;">Description</label>
                            </div>
                            <div class="col-8"><textarea class="form-control" name="texte_desc"><?php echo htmlspecialchars($clb_descr) ?></textarea></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-auto align-self-center mx-auto"><button class="btn btn-primary" type="submit" name="submit_set_club">Sauvegarder</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>