<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Project_styling/css/w3.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../jquery/jquery-3.2.1.min.js"></script>
	<script src="../bootstrap/js/popper.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			display: block;
			height: 100vh;
			/*background-image: url("images/dark_bg.jpg");*/
			background-size: cover;
			background-repeat: no-repeat;
		}
		#rightMenu{
			height: 25vh;
		}
		.title{
			color: #b5651d;
			font-family: Comic sans MS;
			font-style: italic;
			margin-top: 2%;
			text-align: center;
		}
		.logo{
			margin-left: 20px;
		}
		.nav-link{
			color: #b5651d;
			font-size: 20px;
			text-align: center;
		}
		.nav-link:hover{
            color: #b5651d;
			font-size: 20px;
			text-align: center;
		}
		.pil_photo{
			margin-top: 20px;
			border-radius: 50%;
		}
		.pil_fct{
			text-align: center;
			color: white;
		    font-size: 18px;
		    right: 10px;
		}
		.pil_det{
			color: #b5651d;
			font-size: 18px;
			font-weight: bold;
			display: block;
			width: 40%;
			float: left;
		}
		.pil_base{
			color: black;
			font-size: 18px;
		}
	</style>
</head>
<body>
	
	<div class="container-fluid header">
		<div class="row">
			<div class="col-3 logo">
				<img src="../images/cindh-logo.png" width="195" height="195">
			</div>
			<div class="col-8 title">
				<h1>Club d'Initiative Nationale de D&eacute;veloppement <br>Humain </h1>
			</div>
		   
		   
		</div>
		
	</div>

	<div class="container content">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item col-4">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pilotage</a>
		  </li>
		  <li class="nav-item col-4">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Activit&eacute;s</a>
		  </li>
		  <li class="nav-item col-4">
		    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ev&egrave;nement Phare</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
		<!-- Le pilotage -->	
		  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             <div class="row">
             	<!-- Loop on the number of managers in the club -->
	             <div class="col-4">
			  	 	<img src="../images/conan.png" class="pil_photo" width="115" height="115">
			  	 	  <a class="btn btn-light" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample">
                       Pr&eacute;sident du club</a>
			  	 	<div class="collapse" id="collapse1">
			  	 		<span class="pil_det">Nom : </span> <span class="pil_base">ghhhhhhhhjk</span><br>
			  	 		<span class="pil_det">Pr&eacute;nom : </span> <span class="pil_base">ghhhhhhhhjk</span><br>
			  	 		<span class="pil_det">Ann&eacute;e d'&eacute;tude : </span> <span class="pil_base">ghhhhhhhhjk</span><br>
			  	 		<span class="pil_det">Fili&grave;re : </span> <span class="pil_base">ghhhhhhhhjk</span><br>
			  	 	</div>
			  	 </div>
			  	 
             </div>
		  	 
		  </div>
		 <!-- Le pilotage -->

		 <!-- Activités -->
		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		  </div>
         <!-- Activités -->

         <!-- Phare -->
		  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		  	<p style="color: white; text-align: center; font-size: 20px;">Convoi socio-m&eacute;dical</p>	
		  	<video  height="50%" controls style="position: absolute; right: 0; left: 0; top: 35%; margin:auto; width=50%;">
			  <source src="../images/olymp_after_movie.mp4" type="video/mp4">		  
			</video>

		  </div>
		 <!-- Phare -->
		</div>
	</div>
	<?php
       include 'tag_sidebar.php';
	?>
</body>
</html>