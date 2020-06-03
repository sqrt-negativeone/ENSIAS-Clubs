<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <?php
        $events = array();
        $events = $events_pub;
        $j = count($events);
        if (isset($events_prv)) {
            for ($k=0; $k < count($events_prv); $k++) { 
                $events[$j] = $events_prv[$k];
                $j++;
            }
        }
        if (count($events) == 0) {
        ?>
        <span style="font-style: italic; font-size: 100%; text-align: center;">Pas d'évènements pour le moment.</span>
        <?php
        }else{
        for ($i = 0; $i < count($events); $i++) {
            $id_event=$events[$i]['id_event'];
            $event_title = $events[$i]['titre'];
            $descr=$events[$i]['descr_event'];
            $date_fin = $events[$i]['date_fin'];
            $date_deb = $events[$i]['date_deb'];
            $pic = "data:image/*;base64,".base64_encode($events[$i]['photo']);
        ?>
            <div class="blog-slider__item swiper-slide">
                <div></div>
                <div class="blog-slider__img">
                    <img src=<?php echo $pic ?> />
                </div>
                <div class="blog-slider__content">
                    <?php 
                        if ($date_deb != $date_fin) {
                     ?>     
                     <span class="blog-slider__code"><?php echo "Du : ".$date_deb ?></span>
                     <span class="blog-slider__code"><?php echo "Jusqu'à : ".$date_fin ?></span>
                    <?php 
                        }else{
                     ?>
                    
                    <span class="blog-slider__code"><?php echo $date_deb ?></span>
                    <?php        
                        }
                     ?>
                    <div class="blog-slider__title"><?php echo $event_title ?></div>
                    <div class="blog-slider__text">
                        <?php echo htmlspecialchars($descr) ?>
                    </div>
                   <!--  <a data-event-id=<?php echo $id_event?> href="javascript:void(0)" type="button" data-toggle="modal" data-target="#eventsModal">READ MORE</a> -->
                </div>
            </div>
        <?php }    } ?>
        <div class="blog-slider__pagination"></div>
    </div>
</div>
