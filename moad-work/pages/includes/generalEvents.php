<?php 
 //TODO: get the data about events from db
 $nb_event=1;
 for ($i=0; $i<$nb_event;$i++){
     $event_title="EVENT TILTE";
     $author ="club_name";
     $date ="dd-mm-yy";
     $pic = "assets/img/dogs/image1.jpeg";
     $discr="Lorem ipsum dolor sit amet,
     consectetur adipiscing elit, sed do eiusmod tempor
     incididunt ut labore et dolore magna aliqua. Tempus urna et
     pharetra pharetra massa massa ultricies mi quis. Id velit
     ut tortor pretium viverra suspendisse potenti. Urna
     condimentum mattis pellentesque id nibh tortor. Ut tristique
     et egestas quis ipsum suspendisse ultrices. Malesuada
     bibendum arcu vitae elementum
     curabitur vitae nunc. Nisl tincidunt eget nullam non nisi
     est sit amet. Vulputate sapien nec sagittis aliquam
     malesuada bibendum arcu vitae. Neque egestas congue quisque
     egestas diam in arcu cursus.
     Massa tincidunt dui ut ornare lectus sit amet.Aliquam nulla
     facilisi cras fermentum odio. Natoque penatibus et magnis
     dis parturient montes. Orci eu lobortis elementum nibh
     tellus molestie nunc non.
     Non tellus orci ac auctor augue. Cras semper auctor neque
     vitae tempus quam pellentesque nec nam. Quam adipiscing
     vitae proin sagittis nisl rhoncus. Sed tempus urna et
     pharetra pharetra massa. Lectus
     arcu bibendum at varius vel pharetra vel turpis. Diam
     vulputate ut pharetra sit amet aliquam id. Eget gravida cum
     sociis natoque penatibus. At erat pellentesque adipiscing
     commodo elit.";
?>

<div class="card mb-4" data-aos="zoom-in-up">
    <div class="card-body d-flex">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12" style="background-image: url(<?php echo $pic?>);background-position: 50% 50%;background-size: cover;background-repeat: no-repeat;height: 600px;">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center"><?php echo $event_title?></h2>
                    <h3 class="text-center">from : <?php echo $author?></h3>
                    <h3 class="text-center">date: <?php echo $date?></h3>
                    <p class="text-left m-0"><br>
                    <?php echo $discr?>
                    <br><br></p>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php }?>