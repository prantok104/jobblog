

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
			<?php if(!isset($_SESSION['user_name']) && !isset($_SESSION['password'])){?>
             <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<?php } ?>
			<?php if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){?>
             <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
			<?php } ?>
			<?php if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){?>			
             <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
			<?php } ?>
          </ul>
        </div>
      </div>
    </nav>