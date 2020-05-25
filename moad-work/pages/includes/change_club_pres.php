<?php 
    //TODO: get club president data from db
    $username="user_name";
    $avatar='../assets/img/avatars/avatar1.jpeg'; 
?>

<div class="row"  style="margin-bottom: 40px;margin-top: 10px;">
    <div class="col" data-aos="zoom-in-up">
        <div class="card">
            <div class="card-body">
                <h4>Current club president:</h4>
                <div class="row">
                    <div class="col">
                        <div class="card" id="current_president">
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
                        </div>
                    </div>
                    <div class="col m-auto"><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#presidentSelection" style="width: 82px;margin-right: auto;margin-left: auto;">Change</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>