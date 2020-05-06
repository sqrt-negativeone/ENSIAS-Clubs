<div class="col">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary m-0 font-weight-bold">Suggestions you sent</h6>
        </div>
        <div class="card-body" style="padding-right: 30px;">
            <!--the suggestion data-->
            <?php
            //TODO: get data about suggestion from db
            $nb_sug = 1;
            for ($i = 0; $i < $nb_sug; $i++) {
                $username = "username";
                $subject = "subject";
                $avatar = "assets/img/avatars/avatar4.jpeg";
                $suggestion = "Lorem ipsum dolor sit
                amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Eget duis at tellus at urna.
                Posuere ac ut consequat semper viverra nam libero. Ut tristique
                et egestas quis ipsum suspendisse ultrices gravida. Morbi blandit
                cursus risus at. Etiam sit amet nisl purus in. Amet dictum sit amet
                justo donec enim diam vulputate. Massa vitae tortor condimentum
                lacinia quis
                vel eros donec ac.";
                $date = "10:50 AM"
            ?>
                <div class="border rounded-0" data-aos="zoom-in-up" style="margin-bottom: 3rem;padding-bottom: 0.5rem;">
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-xl-2 offset-xl-1"><img class="rounded-circle" src=<?php echo htmlspecialchars($avatar) ?>></div>
                        <div class="col">
                            <h3><?php echo htmlspecialchars($username) ?></h3>
                            <h5>subject:&nbsp;<?php echo htmlspecialchars($subject) ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-11 offset-xl-1" style="margin-top: 1rem;">
                            <p style="margin-bottom: -5px;margin-right: 1rem;"><?php echo htmlspecialchars($suggestion) ?><br><br></p><span><?php echo htmlspecialchars($date) ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>