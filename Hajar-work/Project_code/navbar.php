<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		li {
			margin-left: 20px;
            margin-right: 20px;
        }
        li a{
        	/*position: fixed;*/
			font-family: Comic sans MS;
			
			font-size: 20px;
			text-transform: uppercase;
			transition: all 500ms;
			
		}
		li a:hover {
			text-decoration: overline !important;
			font-style: italic;
			text-shadow: 2px 2px rgb(150,0,0);
		}

        .dropdown-item{
        	font-family: Comic sans MS;
			
			font-size: 20px;
			text-transform: uppercase;
        }
	    /*nav .main_list {
		    height: 65px;
		    float: right;
		}

		.main_list ul {
		    width: 100%;
		    height: 65px;
		    display: flex;
		  
		}*/
		.adei{
			
			color: white;
			font-family: Comic sans MS;			
			font-size: 20px;
			/*background-color: #ff6666 ;*/
		}

	</style>
</head>


<body>
<div class="container-fluid">
		<nav class="navbar navbar-expand-lg justify-content-center fixed-top">
		 <a class="navbar-brand"><img src="images/ensias_logo.png" width="75" height="75" alt="fsac" ></a>
			<div class="main_list">	
			<ul class="nav navbar-nav">
			  <li class="nav-item"><a class="nav-link" href="" style="color: black;">Accueil</a></li>
			  
			  <li class="nav-item"><a class="nav-link"  href="" style="color: black;">L'ENSIAS</a></li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown"  
					data-target="staff_target" href="#" style="color: black;">Nos clubs</a> <span class="caret"></span>
					<div class="dropdown-menu" aria-labelledby="staff_target">
						<a class="dropdown-item">CINDH</a> 
						<a class="dropdown-item">Olympiades ENSIAS</a> 
						<a class="dropdown-item">EITC</a>
						<a class="dropdown-item">INSEC</a>
						<a class="dropdown-item">Géni Entreprises</a>
					</div></li>
				 
            </ul>
            </div>	
<!-- form elements  ps: Microsoft Expression Encoder -->
		  
			<a class="btn btn-dark adei" role="button" href="Project_code/login_form.php">Créez votre compte ADEI</a>
 		
		</nav>
		 
</div> 


<script type="text/javascript">
  $(document).ready(function() {
        // Transition effect for navbar 
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 20) { 
              $('.navbar').addClass('bg-light');
          } else {
              $('.navbar').removeClass('bg-light');
          }
        });
});
</script>
</body>
</html>