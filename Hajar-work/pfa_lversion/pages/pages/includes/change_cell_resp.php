<?php 
    //TODO: get current responsable data from db    
?>
<div class="row">
    <div class="col">
        <div class="row" data-aos="zoom-in-up" style="margin-bottom: 40px;margin-top: 10px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Responsable(s) de la cellule : </h4>
                        <div class="row">

                        <?php 
                        $respo_cell=$_SESSION['respo_cell'];
                        for ($i=0; $i < count($respo_cell); $i++) { 
                            $username=strtoupper($respo_cell[$i]['nom'])." ".ucfirst($respo_cell[$i]['prenom']);
                            $avatar="data:image/jpeg;base64,".base64_encode($respo_cell[$i]['photo']);
                         ?>
                            <div class="col-12 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-3">
                                                <?php 
                                                if ($respo_cell[$i]['photo']=="") {
                                                            echo '<img style="max-height: 50px; max-width: 50px;" src="../../images/profile.png" class="border rounded-circle img-profile" />';
                                                             }else {
                                                                echo '<img style="max-height: 50px; max-width: 50px;" src="data:image/jpeg;base64,'.base64_encode($avatar).'" class="border rounded-circle img-profile">';
                                                             }   
                                                 ?>
                                                
                                            </div>
                                            <div class="col" style="margin-left: 10px;"><span style="font-size: 120%;"><?php echo htmlspecialchars($username)?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php } ?>
                         
                        </div>

                        <?php
                        if (strcmp($_SESSION['statut'], 'PC') == 0 or strcmp($_SESSION['statut'], 'PA') == 0) {
                        ?> 
                        <div class="row"> 
                            <!-- ADD A RESPO FOR THE CELL -->
                            <div class="col-auto mx-auto"><button class="btn btn-danger  btn-block" type="button" data-toggle="modal" data-target="#responsableSelection">Ajouter</button></div>
                            <!-- REMOVE A RESPO FROM THE CELL -->
                            <?php 
                                if (count($respo_cell) != 0) {
                                    //PAS DE RESPPONSABLES -> PAS DE BOUTON SUPPRIMER
                             ?>
                            <div class="col-auto mx-auto"><button class="btn btn-danger  btn-block" type="button" data-toggle="modal" data-target="#responsableDeletion">Supprimer</button></div>

                            <?php  } ?>
                        </div>  
                        <?php  } ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- line 21
 <div class="card-body" style="width: 300px;margin-right: auto;margin-left: auto;"> -->