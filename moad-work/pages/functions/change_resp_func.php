<?php
    $username=$_POST['username'];
    $cellule=$_POST['cellule'];
    /*
        update the data in the database :
            change status of the current president to club member
            change status of $username to club president
            add notification to $username and the previous president
    */
    $avatar='../assets/img/avatars/avatar2.jpeg';
?>
<div class="card-body" style="width: 300px;margin-right: auto;margin-left: auto;">
    <div class="row align-items-center no-gutters">
        <div class="col-auto">
            <img class="border rounded-circle img-profile" src=<?php echo htmlspecialchars($avatar)?>>
        </div>
        <div class="col mr-2" style="margin-left: 10px;">
            <span style="font-size: 120%;"><?php echo htmlspecialchars($username) ?></span>
        </div>
    </div>
</div>