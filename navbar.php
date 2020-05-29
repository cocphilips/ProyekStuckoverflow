 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 20px;">
     <a class="navbar-brand" href="home.php">
       <img src="img/logo.png" width="30%" height="30%">
     </a>
     <ul class="navbar-nav ml-auto mr-5">
       <?php
        if (isset($_SESSION["login"])) {
          echo "<li class='nav-item mr-3'>
            <a class='nav-link'>Logged In As " . $_SESSION["dispname"] . "</a>
            </li>";
          echo "<li class='nav-item mr-3'><a class='nav-link' 
            style='cursor: pointer;' href='logout.php'>Logout </a></li>";
          echo "<li class='nav-item mr-3'><a class='nav-link' 
            style='cursor: pointer;' href='ask_page.php'>Ask A Question</a></li>";
        } else {
          echo "<li class='nav-item mr-3'>
            <a class='nav-link' onclick='loginPopup()' style='cursor: pointer;'>Login</a>
            </li>";
          echo "<li class='nav-item mr-3'>
            <a class='nav-link' onclick='signupPopup()' style='cursor: pointer;'>Signup</a>
            </li>";
        }
        ?>
       <li class="nav-item mr-3">
         <a class="nav-link" style="cursor: pointer;" href="aboutus.html">About Us </a>
       </li>
       <li class="nav-item">
         <a class="nav-link" style="cursor: pointer;" href="explore.php">Explore</a>
       </li>
     </ul>
   </div>
 </nav>