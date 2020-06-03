<div class="row" data-aos="zoom-in-up">
    <div class="col">

        <?php 
        if ($cover != '') {
        	echo '<div class="col-xl-12" style="background-image: url(data:image/jpeg;base64,'.base64_encode($cover).');background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;height: 600px;">
        		</div>';
        }else{
        	echo '<div class="col-xl-12" style="height:200px; text-align:center; font-size:20px;">Image du club non disponible.</div>';
        }
	       
         ?>
    </div>
</div>