<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container-fluid">
		<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #D3D3D3;">
		 <a class="navbar-brand mr-auto mt-2 mt-lg-0"><img src="../images/adei.png" width="115" height="115" alt="fsac" ></a>
         <span class="mr-auto mt-2 mt-lg-0" style="font-family: Comic sans MS; font-size: 20px;"><h1>Association Des El&egrave;ves Ing&eacute;nieurs</h1></span>
		 <a class="navbar-brand my-2 my-lg-0" href="">
	  	   <?php 
	  	   
             if ($_SESSION['photo']=="") {
             	echo '<img src="../images/profile.png" height="75" width="75" style="border-radius: 50%;"/>';
             }else {
             	echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['photo'] ).'" height="75" width="75" style="border-radius: 50%;"/>';
             }
	  	     
	  	    ?>
	    </a>
			<div class="main_list my-2 my-lg-0">	
			<ul class="nav navbar-nav">
			  
			  
			  
			  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown"  
					data-target="staff_target" href="#" style="color: black;">
					<?php  echo strtoupper($_SESSION['nom']) ." ".ucfirst($_SESSION['prenom']);
                    ?>
                    </a> <span class="caret"></span>
					<div class="dropdown-menu" aria-labelledby="staff_target">
						<a class="dropdown-item">Profile</a> 
						<a class="dropdown-item">Clubs</a> 
						<a class="dropdown-item">Déconnexion</a>
					</div>
			  </li>


				 
            </ul>
            </div>	
 		  
	  	
			  
		</nav>
		 
</div> 

</body>
</html>