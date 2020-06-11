<?php
require_once '../../../../pfa_db_connection/connexion.php';
$sql_events = "select * from organisation join evenement using(id_event) join 
    club using (id_club)";
$stmt_events = $pdo->prepare($sql_events);
$stmt_events->execute();
$stmt_events->setFetchMode(PDO::FETCH_ASSOC);
$events = $stmt_events->fetchAll();

for ($i = 0; count($events); $i++) {
?>

    <div class="card mb-4" data-aos="zoom-in-up">
        <div class="card-body d-flex">
            <div class="col-xl-12">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="text-center"><?php echo $events[$i]['titre'] ?></h2>
                        <h3 class="text-center">from Club <?php echo $events[$i]['nom_club'] ?></h3>
                        <h3 class="text-center">date: <?php echo $events[$i]['date_deb'] ?></h3>
                        <p class="text-left m-0"><br>

                            <br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>