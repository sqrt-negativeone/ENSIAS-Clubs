<?php
//TODO: get the tache informations from db
//if $_POST['username'] is set then search for tachs of that username, else search for the current user taches
$nb_taches = 1;
for ($i = 0; $i < $nb_taches; $i++) {
    $tache_title="TITLE";
    $tache_status='missed';
    $source="Me";
    $disc="Lorem
    ipsum dolor sit amet, consectetur adipiscing elit,
    sed do eiusmod tempor incididunt ut labore et dolore
    magna aliqua.";
    $date="10:30 AM";
    if (strcmp($tache_status,'completed')==0) $color="color: rgb(20,140,25);";
    else $color="color: rgb(140,20,20);"
?>
    <li class="list-group-item" data-aos="zoom-in-up">
        <div class="row align-items-center no-gutters">
            <div class="col mr-2">
                <div>
                    <h5 class="mb-0"><strong><?php echo $tache_title?></strong></h5>
                    <?php 
                        echo '<h6>status:&nbsp;<span style="'.htmlspecialchars($color).'">';
                        echo htmlspecialchars($tache_status)
                    ?>
                    </span>
                    </h6>
                    <p style="margin-top: -5px;margin-bottom: -5px;">from:
                        <?php echo htmlspecialchars($source)?></p>
                    <p style="margin-bottom: 0;margin-top: 10px;"><?php echo htmlspecialchars($disc) ?>
                        <br></p><span class="text-xs"><?php echo htmlspecialchars($date)?></span>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
