<?php
    if(isset($_SESSION['loggedin']))
    {
        $loggedin = true;
    }

    else
    {
      $loggedin = false;
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Tushar's</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Registration <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bootstrap_form_login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Welcome.php">Main Page</a>
        
      </li>

      <?php
      if($loggedin){?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php
    }
    ?>
    </ul>
  </div>
</nav>