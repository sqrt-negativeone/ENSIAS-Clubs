<?php
	//GET EVENTS
	$nature = 'PU';
	$sql_events = "select * from evenement where nature = ? and date_deb>now() or (now()>date_deb and now()<date_fin) order by date_fin ASC";
	$stmt_events = $pdo -> prepare($sql_events);
	$stmt_events ->execute([$nature]);
	$events = $stmt_events -> fetchAll();
    $n = count($events);
?>

<section class="clean-block slider dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">ÉVÈNEMENTS</h2>
            <p style="font-size: 20px;">D&eacute;couvrez nos prochains &eacute;v&eacute;nements :</p>
        </div>
        <?php
        if ($n > 0) {
        ?>
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                   <?php
                    $event_title = $events[0]['titre'];
                    $discr = $events[0]['descr_event'];
                    $date = $events[0]['date_fin'];

                    if ($events[0]['photo'] != '') {
                        $pic = "data:image/*;base64,".base64_encode($events[0]['photo']);
                    }else{
                        $pic = "img/profile.png";
                    }
                    ?>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100 carousel-img" src=<?php echo htmlspecialchars($pic) ?> alt="Event Image">
                        <div class="text-center">
                            <h2 class="text-center"><?php echo htmlspecialchars($event_title) ?></h2>
                            <h6><?php echo htmlspecialchars($date) ?></h6>
                            <p><br><?php echo htmlspecialchars($discr) ?><br><br></p>
                        </div>
                    </div>
                    <?php
                    for($i=1; $i<$n; $i++) {
                        $event_title = $events[$i]['titre'];
                        $discr = $events[$i]['descr_event'];
                        $date = $events[$i]['date_fin'];

                        if ($events[$i]['photo'] != '') {
                            $pic = "data:image/*;base64,".base64_encode($events[$i]['photo']);
                        }else{
                            $pic = "img/profile.png";
                        }
                       
                    ?>
                        <div class="carousel-item">
                            <img class="d-block w-100 carousel-img" src=<?php echo htmlspecialchars($pic) ?> alt="Event Image">
                            <div class="text-center">
                                <h2 class="text-center"><?php echo htmlspecialchars($event_title) ?></h2>
                                <h6><?php echo htmlspecialchars($date) ?></h6>
                                <p><br><?php echo htmlspecialchars($discr) ?><br><br></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div>
                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <?php
                    for ($i = 0; $i < $n; $i++) {
                        echo '<li data-target="#carousel-1" data-slide-to="' . $i . '"></li>';
                    }
                    ?>
                </ol>
            </div>
        <?php } else {
        ?>
            <div>
                <p class="text-center" style="font-size: 18px;">
                    &nbsp;<br><i class="far fa-grin-beam-sweat" style="font-size: 100px;"></i><br><br>
                    Il semble qu'il n'y ait pas encore d'&eacute;v&eacute;nements<br><br><br>
                </p>
            </div>
        <?php } ?>
    </div>
</section>