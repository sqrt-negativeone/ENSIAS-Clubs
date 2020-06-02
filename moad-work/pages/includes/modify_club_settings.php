<?php 
$clb_name="CLUB NAME";
$clb_discr="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
?>
<div class="row">
    <div class="col" data-aos="zoom-in-up">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary m-0 font-weight-bold">Modify Club informations</h6>
            </div>
            <div class="card-body">
                <form action="functions/chg_clb_settings.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Name</label></div>
                            <div class="col-8"><input class="form-control" type="text" value="<?php htmlspecialchars($clb_name) ?>" name="name"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Cover</label></div>
                            <div class="col-8"><input type="file" accept="image/*"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4"><label class="col-form-label">Discreption</label>
                            </div>
                            <div class="col-8"><textarea class="form-control"><?php htmlspecialchars($clb_discr) ?></textarea></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-auto align-self-center mx-auto"><button class="btn btn-primary" type="submit">Save</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>