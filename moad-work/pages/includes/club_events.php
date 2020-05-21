<?php 
    session_start();
?>

<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <?php
        //get club events from db
        $sql="select * from evenement join organisation using(id_event) where id_club=? and date_fin>date_deb ordered by date_fin ASC";
        $sql = $pdo->prepare($sql);
        $sql = $pdo->execute([$_GET['i']]);
        $resault=$sql->fetchAll();

        foreach ($resault as $event) {
            $id_event=$event['id_event'];
            $event_title = $event['titre'];
            $discr = $event['descreption'];
            $date = $event['date_fin'];
            $pic = $event['photo'];
        ?>
            <div class="blog-slider__item swiper-slide">
                <div></div>
                <div class="blog-slider__img">
                    <img src=<?php echo $pic ?> />
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code"><?php echo $date ?></span>
                    <div class="blog-slider__title"><?php echo $title ?></div>
                    <div class="blog-slider__text">
                        <?php echo htmlspecialchars($discr) ?>
                    </div>
                    <a data-event-id=<?php echo $id_event?> href="javascript:void(0)" type="button" data-toggle="modal" data-target="#eventsModal">READ MORE</a>
                </div>
            </div>
        <?php } ?>
        <div class="blog-slider__pagination"></div>
    </div>
</div>