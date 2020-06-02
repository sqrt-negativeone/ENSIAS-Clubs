<?php
//TODO: get club cover from db
$cover = '"../assets/img/dogs/image2.jpeg"';
?>

<div class="row">
    <div class="col" data-aos="zoom-in-up">
        <div class="row">
            <div class="col">
                <div id="cover" style="width:80%;margin-left:auto;margin-right:auto;background-image: url(<?php echo htmlspecialchars($cover) ?>);background-size: cover;background-repeat: no-repeat;padding: 96px 0 0;background-position: center center;">
                </div>
            </div>
        </div>
        <div id="cont" class="row" style="margin-top:1rem">
            <div class="col">
                <h1 class="text-dark mb-1" data-aos="zoom-in-up" style="font-size: 1.8rem;">Welcome to CLUB NAME</h1>
            </div>
            <?php
            if ($GLOBALS['is_connected']) {
            ?>
                <div class="col-auto align-self-center">
                    <?php
                    $is_member = true;
                    if ($is_member) {
                    ?>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger btn-icon-split" role="button">
                                    <span class="text-white-50 icon"><i class="fa fa-close"></i></span>
                                    <span class="text-white text">leave</span>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-success btn-icon-split" role="button">
                                    <span class="text-white-50 icon"><i class="fas fa-plus"></i></span>
                                    <span class="text-white text">join</span>
                                </a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
