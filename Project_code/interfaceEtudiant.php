 <?php 
 session_start();
 //When a URL points to a directory, it looks for a file called //index.html or htm or php

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ADEI</title>
	<link rel="stylesheet" href="../Project_styling/css/calendar.css">
	
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <script src="../jquery/jquery-3.2.1.min.js"></script>
  <script src="../bootstrap/js/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <style type="text/css">
  	.pres_adei{
  		
  	}
  	.pres_text{
  		position: absolute;
  		bottom: 0;
  	}
    .cal_adei{
      text-transform: capitalize;
      font-family: Comic sans MS, sans serif;
      text-decoration: underline;
      font-style: italic;
    }
  </style>
 </head>
 <body>
    
    	<?php include "../Project_code/nav_interface.php"; ?>
    	<br><br><br><br><br><br><br><br>
 <div class="container">
 	<div class="row" style="height: 75vh;">
 		<div class="col-5 h-100 pres_adei">
      <h4 class="cal_adei">exprimez-vous !!</h4><br><br>
 			      <!-- plaintes/suggestions-->      
              <div class="container" >
              <form class="">

                <div class="form-group">
                  <label for="pl_sug">Type d'intervention</label>
                  <select name="type_int" class="form-control" required>
                    <option value="" selected="true" disabled="disabled">S&eacute;lectionnez un type</option>
                    <option value="pl">Plainte</option>
                    <option value="sg">Suggestion</option>
                  </select>
                </div>  
                <div class="form-group">
                  <label for="text">Votre intervention</label>
                  <textarea maxlength="200" class="form-control" name="text_int" id="text" aria-describedby="emailHelp" style="height: 4em;" required></textarea>
                  <small id="emailHelp" class="form-text text-muted">Ne d&eacute;passez pas 200 caract&egrave;res.</small>
                </div>

                
                <button type="submit" class="btn btn-dark">Envoyer</button>
              </form>
              </div>
 <!-- plaintes/suggestions--> 
 		</div>
 		<div class="col-2"></div>
 		<div class="col-5 h-75">
 			<!--news-->
 			<div class="cal_adei">
 				<h4>nouveaut&eacute;s</h4> <br><br>
	 			<div id="calendar" class="calendar"></div>
 			</div>
 			<!--news-->
  
 		</div>
 	</div>
 </div>   	


<script src="../Project_styling/js/calendar.js"></script>
 </body>
 </html>