<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>

<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="Project_styling/css/sidebar.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body>

<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
    <img src="images/ensias_logo.png" width="115" height="115" alt="ensias" >
    </div>
    <ul class="list-unstyled components">
      
      <li class="active">
        <a href="pfa_ensias.php" ><i class="fa fa-home" ></i>  Accueil</a>
        
      </li>
      <li class="active">
        <a href="pfa_ensias.php" ><i class="fas fa-school" ></i>  ENSIAS</a>
        
      </li>
      <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="bdrop"><span class="fa fa-university"></span>
         Nos clubs<i class="fa fa-caret-down fa-fw"></i></a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          <li><a href="#" class="drop">Olymppiades Ensias</a></li>
          <li><a href="#" class="drop">CINDH</a></li>
          <li><a href="#" class="drop">INSEC</a></li>
          <li><a href="#" class="drop">EITC</a></li>
          <li><a href="#" class="drop">Géni Entreprises</a></li>
          <li><a href="#" class="drop">Enactus</a></li>
        </ul>
      </li>
      
     <!-- <li>
        
        <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="bdrop" ><span class="fa fa-graduation-cap"></span>  Filières <i class="fa fa-caret-down fa-fw"></i></a>
        <ul class="collapse list-unstyled" id="pageSubmenu3">
          <li><a href="licences" class="drop">Licences</a></li>
          <li><a href="master" class="drop">Masters</a></li>
          
        </ul>
      </li>
      <c:if test="${!empty sessionScope.email && !empty sessionScope.pass}">
                  <c:if test="${sessionScope.responsabilite eq 'enseignant' }">
      <li>
        <a href="emploiParProf" class="bdrop">
         <i class="fa fa-calendar-o"></i> Mon emploi</a>
         
      </li>
      <li>
        <a href="desiderata" class="bdrop">
         <i class="fa fa-comments"></i> Desiderata</a>
         
      </li>
                  </c:if>
                  <c:if test="${sessionScope.responsabilite eq 'membre du college' || sessionScope.responsabilite eq 'chef du departement' }">
       <li>
        <a href="emploi" class="bdrop">
         <i class=" fa fa-calendar"></i> Gestion des Emplois du temps </a>
         
      </li>
      <li>
        <a href="enseignants" class="bdrop">
         <i class="fas fa-chalkboard-teacher"></i> Gestion des Enseignants</a>
         
      </li>  
      <li>
        <a href="filieres" class="bdrop">
         <i class="fa fa-book"></i> Gestion des Filières</a>
         
      </li>   
            
                  </c:if>
             <c:if test="${sessionScope.responsabilite eq 'chef du departement' }">
      <li>
        <a href="budgets"  class="bdrop">
         <i class="fa fa-money"></i> Budget </a>
         
      </li>   
      <li>
        <a href="seances" class="bdrop">
         <i class="fas fa-school"></i> Importation des séances</a>
         
      </li>      
              </c:if>    
      </c:if>-->
    </ul>

    
  </nav>
  
  <!-- Page Content Holder -->
  <div id="content">

    <nav class="navbar navbar-default">
      <div class="container">

        <div class="navbar-header">
          <button type="button" id="sidebarCollapse" class="btn btn-dark navbar-btn">
                                <i class="fa fa-align-left"></i>
                                
                            </button>
        </div>

      </div>
    </nav>
</div>


	<script src="jquery/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function(){
$("#sidebarCollapse").on("click", function() {
    $("#sidebar").toggleClass("active");
    $(this).toggleClass("active");
   
  });
});
    </script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>