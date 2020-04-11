<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;top: 300px;" id="rightMenu">
  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  <a href="../index.php" class="w3-bar-item w3-button">Accueil</a>
  <a href="#" class="w3-bar-item w3-button">ENSIAS</a>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Nos clubs <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-white w3-card">
    <!--IMPORTER LA LISTE DES CLUBS-->
    <a href="../Project_code/cindh.php" class="w3-bar-item w3-button">CINDH</a>
    <a href="#" class="w3-bar-item w3-button">Link</a>
  </div>
</div>
<div class="back_color" style="position: absolute; right: 0; top: 300px !important;">
  <button class="w3-button  w3-xlarge w3-right" onclick="openRightMenu()" on>&#9776;</button>
  
</div>

<script type="text/javascript">
	function openRightMenu() {
  document.getElementById("rightMenu").style.display = "block";
}

function closeRightMenu() {
  document.getElementById("rightMenu").style.display = "none";
}

function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-grey";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-grey", "");
  }
}
</script>