<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <?php
        $events = array();
        $events = $events_pub;
        $j = count($events);
        if (isset($events_prv)) {
            for ($k = 0; $k < count($events_prv); $k++) {
                $events[$j] = $events_prv[$k];
                $j++;
            }
        }
        if (count($events) == 0) {
        ?>
            <div style="width: 100%;">
                <p class="text-center" style="font-size: 18px;">
                    &nbsp;<br><i class="far fa-grin-beam-sweat" style="font-size: 100px;"></i><br><br>
                    Pas d'&eacute;v&eacute;nements pour le moment.<br><br><br>
                </p>
            </div>
            <?php
        } else {
            for ($i = 0; $i < count($events); $i++) {
                $id_event = $events[$i]['id_event'];
                $event_title = $events[$i]['titre'];
                $descr = $events[$i]['descr_event'];
                $date_fin = $events[$i]['date_fin'];
                $date_deb = $events[$i]['date_deb'];
                $pic = "data:image/*;base64," . base64_encode($events[$i]['photo']);
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
                            <span class="blog-slider__code"><?php echo "Du : " . $date_deb ?></span>
                            <span class="blog-slider__code"><?php echo "Jusqu'à : " . $date_fin ?></span>
                        <?php
                        } else {
                        ?>

                            <span class="blog-slider__code"><?php echo $date_deb ?></span>
                        <?php
                        }
                        ?>
                        <div class="blog-slider__title"><?php echo $event_title ?></div>
                        <div class="blog-slider__text">
                            <?php echo htmlspecialchars($descr) ?>
                        </div>
                        <?php
                        if ($statut == 'PA' or $statut == 'PC') {
                        ?>
                            <form method="post" action="functions/create_event.php">
                                <input type="hidden" name="id_event" value="<?php echo $id_event; ?>">
                                <div class="form-group">
                                    <div class="form-row justify-content-center">
                                        <div class="col-auto">
                                            <button class="btn btn-dark" style="margin: 0.5rem 0; width:150px;" type="submit" name="delete_event">Supprimer</button>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-dark" style="margin: 0.5rem 0; width:150px;" type="button" data-toggle="modal" data-target="#modifyEvent">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
        <?php }
        } ?>
        <div class="blog-slider__pagination"></div>
    </div>
</div>