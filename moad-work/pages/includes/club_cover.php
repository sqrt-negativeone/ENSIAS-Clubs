<?php
//TODO: get club cover from db
$cover = '"../assets/img/dogs/image2.jpeg"';
?>

<div class="row">
    <div class="col" data-aos="zoom-in-up">
        <div class="row">
            <div class="col">
                <div style="background-image: url(<?php echo htmlspecialchars($cover) ?>);background-size: cover;background-repeat: no-repeat;height: 600px;padding: 96px 0 0;background-position: 50% 50%;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="text-dark mb-1" data-aos="zoom-in-up">Welcome to CLUB NAME</h1>
            </div>
            <?php
            if ($GLOBALS['is_connected']) {
            ?>
                <div class="col-auto">
                    <?php
                    //TODO: CHOOSE WHAT TO DISPLAY BASED ON WHAT IF THE USER IS IN THE CLUB OR NOT
                    $is_member = true;
                    if ($is_member) {
                    ?>
                        <a class="btn btn-danger btn-icon-split" role="button">
                            <span class="text-white-50 icon"><i class="fa fa-close"></i></span>
                            <span class="text-white text">leave</span>
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-success btn-icon-split" role="button">
                            <span class="text-white-50 icon"><i class="fas fa-plus"></i></span>
                            <span class="text-white text">join</span>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>