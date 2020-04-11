<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>carousel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery/jquery-3.2.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
     #bg_img {
     	position: relative !important;
     	background-image: url("images/code_laptop.jpg");
     	background-repeat: no-repeat;
     	background-size: cover;
      height: 100vh;
     }
	
    .text_accueil{   
      position: absolute !important;
      /*
      right:0 ;
      margin: auto !important;*/
     
      left: 4%;
      top: 25%;
      width: 50%;
      color: black;
      text-align: center;
      font-style: italic;
    }
    .clubs{
      color: white;
      font-family: Comic sans MS;     
      font-size: 20px;
      background-color: #ff6666;
    } 
     .pre_club{
      text-align: center;
      font-family: Comic sans MS;

     }
     .img_club{
      width: 45%;
      background-color: white;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      margin-bottom: 25px;
     }
    
     .text_club{
      margin-top: 5%;
      text-align: center;
     }
     #demo {
      width: 100vw;
      height: 50vh;
      /*background: url("images/bg1_ps.jpg") center;
      background-repeat: no-repeat;*/
      background-color: #d3d3d3;
      
     }
     .item {
      position: relative;
      width: 100vw;
      height: 30%;
      transition: 0s !important;
     }
     .tem_img{
      top: 5%;
      left: 10%;
      right: 0;
      
      margin: auto;
      width: 115px;
     }

    
     .tem_text{
      top: 20%;
      text-align: center;
      font-family: Comic sans MS;
      font-size: 20px;
      
      margin-left: 260px;
      margin-right: 260px;
     }
     .tem_text img{
      display: block;
      top: 1%;
      left: 2%;
     }
     .tem_name{
      text-align: right;
      font-style: italic;
      font-size: 16px;
     }
</style>
</head>
<body>
<div id="bg_img">
<!-- navbar-->
    <?php
      include 'Project_code/navbar.php';
    ?>
<!-- navbar-->
<br>
<!--<div class="container-fluid">-->
<!--TEXT CENTERED -->	
	<div class="text_accueil">
    <h3>Un ordinateur portable et une connexion fiable sont indispensables pour un(e) Ensiaste. Cependant, sans 
    parascolaire, la vie &eacute;studiantine serait p&acirc;le et d&eacute;pourvue de vigueur.</h2><br><br><br>
    <button class="btn clubs">Devenez membre de votre club pr&eacute;f&eacute;f&eacute; !</button>
  </div>
<!--TEXT CENTERED -->	


 
<!--</div>-->


</div>	

<!-- After background-image -->
<div class="container pre_club">
  <br>
	<h2>Les clubs de notre établissement</h1>
  <h4>L'ENSIAS vous offre un large éventail de clubs afin de satisfaire tous les go&ucirc;ts.</h3>
  <br><br><br>
  <?php 
      include "Project_code/connexion.php";
      $select_club="select * from club where photo is not null and texte_desc is not null and acro_club is not null";
      $stmt_club=$pdo->prepare($select_club);
      $stmt_club->execute();

      if ($stmt_club->rowCount()>0) {
        # code...
        $stmt_club->setFetchMode(PDO::FETCH_ASSOC);

        while ($row_club=$stmt_club->fetch()) {
          # code...

  ?>
    <div class="row">
      <div class="col-6 text_club">
        <?php 
          echo $row_club['texte_desc'];
         ?>
        <br>
        <a class="btn btn-dark" role="button" href="Project_code/cindh.php">Savoir plus sur <span><?php echo $row_club['acro_club']; ?></span></a>
      </div>

      <div class="img_club">
        <?php 
           echo '<img src="data:image/jpeg;base64,'.base64_encode($row_club['photo']).'"height="300" style="width: 100% !important;">';
         ?>
        <p style="text-align: center;"><?php echo $row_club['acro_club']; ?></p>
      </div>
    </div>

    <?php 
         if ($row_club=$stmt_club->fetch()) {
    ?>
    <div class="row">
      <div class="img_club">
        <?php 
           echo '<img src="data:image/jpeg;base64,'.base64_encode($row_club['photo']).'"height="300" style="width: 100% !important;">';
         ?>
        <p style="text-align: center;"><?php echo $row_club['acro_club']; ?></p>
      </div>

      <div class="col-6 text_club">
        <?php 
          echo $row_club['texte_desc'];
         ?>
        <br>
        <a class="btn btn-dark" role="button" href="Project_code/cindh.php">Savoir plus sur <span><?php echo $row_club['acro_club']; ?></span></a>
      </div>

    </div>

    <?php
         }
     ?>

  <?php        
        }
      }
   ?>
    
    
   
</div>
<!-- After background-image -->


  <!-- Student testimonials--> 
<h2 class="pre_club">T&eacute;moignages des &eacute;tudiants</h2>   <br>
<div id="demo" class="container-fluid carousel slide" data-ride="carousel">

  <div class="carousel-inner shadow-lg">
    
<?php 
//GET INFO FROM DATABASE

$select_info="select * from etudiant where photo IS NOT NULL and temoignage IS NOT NULL";
$stmt_select=$pdo->prepare($select_info);
$stmt_select->execute();
if ($stmt_select->rowCount()==1) {
  # code...
  $stmt_select->setFetchMode(PDO::FETCH_ASSOC);

  while ($row=$stmt_select->fetch()) {
    # code...
?>
        <div class="carousel-item active" class="item">
          <div class="tem_img">
            <?php 
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="115" width="115" style="border-radius: 50%;"/>';
             ?>
          </div>      
          <div class="tem_text">
            <img src="images/quotes.png" alt="quotes" width="115" height="115">
            <p>
              <?php 
                 echo $row['temoignage'];
               ?>
            <br><br>
           - <span class="tem_name">
              <?php 
                 echo strtoupper($row['nom'])." ".ucfirst($row['prenom']);
               ?>
             </span></p>
          </div>
        </div>
    

  <?php 
        }
     }
   ?>
    
  </div>
</div>
<!-- Student testimonials-->


</body>
</html>


<!--<div id="demo" class="carousel slide" data-ride="carousel">
  
 
  <div class="carousel-inner shadow-lg bg-dark rounded" >
    <div class="carousel-item active rounded" class="item">
      <img src="images/olympic.jpg" alt="" style="width: 100%; opacity: 1;">
      <div class="content">
        <h1>Ensias Olympic Games</h1>
        <p>texttexttttttttt</p>
        <a class="btn btn-primary" href="olympic.php" role="button">Savoir plus -></a>
      </div> 
    </div>

    <div class="carousel-item" class="item">
      <img src="images/eitc.jpg" alt=""style="width: 100%;opacity: 1;">
      <div class="content">
        <h1>Ensias IT Club</h1>
        <p>texttexttttttttt</p>
        <a class="btn btn-primary" href="olympic.php" role="button">Savoir plus -></a>
     </div>
    </div>
    
  </div>
</div>  


<div class="carousel-item" class="item">
      <div class="tem_img">
      <img src="images/olympic.jpg" alt="" style="border-radius: 50%; height: 115px; width: 115px;"> 
      </div> 
      <div class="tem_text">
        <img src="images/quotes.png" alt="quotes" width="115" height="115">
        <p>
        Je pense que le parascolaire est une partie non négligeable de la vie d'un étudiant en général.
      Personnellement, mon experience avec le club CINDH était à la fois bénéfique et éducative.<br>
     - <span style="font-style: italic; font-size: 16px;">MAFTAH EL KASSIMY Hajar</span></p>
      </div>
    </div>
    -->