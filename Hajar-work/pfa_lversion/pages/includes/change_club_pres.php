<?php 
    //TODO: get club president data from db
    $username=strtoupper($_SESSION['presidentC']['nom'])." ".ucfirst($_SESSION['presidentC']['prenom']);
    $avatar="data:image/*;base64,".base64_encode($_SESSION['presidentC']['photo']); 
?>

<div class="row"  style="margin-bottom: 40px;margin-top: 10px;">
    <div class="col" data-aos="zoom-in-up">
        <div class="card">
            <div class="card-body">
                <h4 style="font-size: 1.1rem; margin-bottom: .5rem;">PRÉSIDENT COURANT DU CLUB</h4>
                <div class="row justify-content-center">
                    <div class="col-auto" style="margin: 1rem 0;">
                        <div class="card">
                            <div class="card-body" style="width: 100%;margin-right: auto;margin-left: auto;">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <?php 
                                        if ($_SESSION['presidentC']['photo']=='') {
                                            $avatar='../img/profile.png';
                                        }
                                         ?>
                                        <img style="height: 50px; width: 50px;" class="border rounded-circle img-profile" src=<?php echo $avatar?>>
                                    </div>
                                    <div class="col mr-2" style="margin-left: 10px;">
                                        <span style="font-size: 120%;"><?php echo htmlspecialchars($username) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if ($statut === 'PA') {
                     ?>
                    <div class="col m-auto"><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#presidentSelection" >Change</button>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>