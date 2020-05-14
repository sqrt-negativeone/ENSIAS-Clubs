<?php

session_start();
if (!isset($_SESSION['cne']) ) {
	header("Location:../login.html");
}
if (!isset($_SESSION['status']) || strcmp($_SESSION['status'],'RC')){
    header("Location:../404.html");
}
else {
    if (!isset($_POST['key'])) $key='';
    else $key=$_POST['key'];
    $id=$_POST['id'];
    $s=$_SESSION['status'];
    $sql="select nom,prenom,photo from etudiant join inscription using(cne) where id_cellule=? and status <> ? where nom like '%?%' or prenom like '%?%' ordered by nom, prenom ASC";
    $sql = $pdo->prepare($sql);
    $sql = $pdo->execute([$id,$s,$key,$key]);
    $resault=$sql->fetchAll();

    foreach ($resault as $user) {
        $username = $user["nom"].' '.$user["prenom"];
        $avatar = $user["photo"];
    ?>
        <div class="card shadow border-left-primary py-2" id="btn_mem_inf_<?php echo $i?>" onclick="show_prog('#btn_mem_inf_<?php echo $i?>')" data-username="<?php echo htmlspecialchars($username) ?>" data-aos="zoom-in-up" data-toggle="modal" data-target="#modal1" type="button" style="margin-bottom: 25px;width: 250px;margin-right: auto;margin-left: auto;">
            <div class="card-body" style="padding-top: 5px;padding-bottom: 5px;padding-right: 5px;padding-left: 5px;">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto">
                        <img class="border rounded-circle img-profile" src=<?php echo htmlspecialchars($avatar) ?>></div>
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="margin-left: 5px;">
                            <span style="font-size: 120%;margin-left: 5px;"><?php echo htmlspecialchars($username) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<?php } 
}
?>