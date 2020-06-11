<div class="row">
    <div class="col" data-aos="zoom-in-up">
        <div class="row">
            <div class="col">
                <?php
                if ($cover != '') {
                    echo '<div class="col-xl-12" id="cover" style="width:80%;margin-left:auto;margin-right:auto;background-image: url(data:image/jpeg;base64,' . base64_encode($cover) . '); background-size: cover;background-repeat: no-repeat;padding: 96px 0 0;background-position: center center;">
                        </div>';
                } else {
                    echo '<div class="border rounded-0 shadow-sm;" style="width:80%;margin-left:auto;margin-right:auto;"><p class="text-center" style="margin: 16px 0">Image du club non disponible.<br/><br/><i class="far fa-meh-blank" style="font-size: 100px;"></i></p></div>';
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

        </div>
    </div>
</div>