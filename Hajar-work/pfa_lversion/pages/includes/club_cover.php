<div class="row">
    <div class="col" data-aos="zoom-in-up">
        <div class="row">
            <div class="col">
                <?php
                if ($cover != '') {
                    echo ' style="width:80%;margin-left:auto;margin-right:auto;background-image: url(data:image/jpeg;base64,' . base64_encode($cover) . ');;background-size: cover;background-repeat: no-repeat;padding: 96px 0 0;background-position: center center;">
                        </div>';
                } else {
                    echo '<div class="col-xl-12" style="height:200px; text-align:center; font-size:20px;">Image du club non disponible.</div>';
                }
                ?>
            </div>
        </div>
        <div id="cont" class="row" style="margin-top:1rem">
            <div class="col">
                <h1 class="text-dark mb-1" data-aos="zoom-in-up" style="font-size: 1.8rem;">
                    <?php echo $n_club['nom_club']; ?> 
                </h1>
            </div>
            <?php
            if ($is_connected) {
            ?>
                <div class="col-auto align-self-center">
                    <?php
                    if ($is_club_member) {
                    ?>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger btn-icon-split" role="button">
                                    <span class="text-white-50 icon"><i class="fa fa-close"></i></span>
                                    <span class="text-white text">Quitter</span>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-success btn-icon-split" role="button">
                                    <span class="text-white-50 icon"><i class="fas fa-plus"></i></span>
                                    <span class="text-white text">Rejoindre</span>
                                </a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>