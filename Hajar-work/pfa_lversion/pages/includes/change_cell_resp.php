<?php 
    //TODO: get current responsable data from db
    
?>
<div class="row">
    <div class="col">
        <div class="row" style="margin-bottom: 40px;margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Current responsable:</h4>
                        <?php 
                        for ($i=0; $i < count($respo_cell); $i++) { 
                            $username=strtoupper($respo_cell[$i]['nom'])." ".ucfirst($respo_cell[$i]['prenom']);
                            $avatar="data:image/jpeg;base64,".base64_encode($respo_cell[$i]['photo']);
                         ?>
                        <div class="row">
                            <div class="col-4 offset-xl-1">
                                <div class="card">
                                    <div class="card-body" style="width: 300px;margin-right: auto;margin-left: auto;">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-auto">
                                                <?php 
                                                if ($respo_cell[$i]['photo']=="") {
                                                            echo '<img style="max-height: 50px; max-width: 50px;" src="../../images/profile.png" class="border rounded-circle img-profile" />';
                                                             }else {
                                                                echo '<img style="max-height: 50px; max-width: 50px;" src="data:image/jpeg;base64,'.base64_encode($avatar).'" class="border rounded-circle img-profile">';
                                                             }   
                                                 ?>
                                                
                                            </div>
                                            <div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;"><?php echo htmlspecialchars($username)?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto align-self-center"><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#responsableSelection">Change</button></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>