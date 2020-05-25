
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white shadow clean-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="#"><img src="assets/img/Logo_light.png" width="80px"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Clubs</a>
                    <div class="dropdown-menu" role="menu">
                        <?php 
                            //TODO: GET THE CLUBS DATA FROM DB AND LIST THEM HERE, AND SELECT THE CURRENT CLUB AS ACTIVE
                        ?>
                        <a class="dropdown-item active" role="presentation"  href="#">First CLUB</a>
                        <a class="dropdown-item" role="presentation" href="#">Second CLUB</a>
                        <a class="dropdown-item" role="presentation" href="#">Third CLUB</a></div>
                </li>
            </ul>
        </div>
    </div>
</nav>