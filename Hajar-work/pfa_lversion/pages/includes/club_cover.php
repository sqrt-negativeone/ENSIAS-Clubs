<?php 
    //TODO: get club cover from db
   // $cover='"../assets/img/dogs/image2.jpeg"';
?>

<div class="row" data-aos="zoom-in-up">
    <div class="col">

        <?php 
	       echo '<div class="col-xl-12" style="background-image: url(data:image/jpeg;base64,'.base64_encode($cover).');background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;height: 600px;">
        </div>';
         ?>
    </div>
</div>