<?php

//start session
session_start();

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Yummy Tummy / About us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
  <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<a href="index.php"> <img class="rounded-circle" href="index.php" src="img/YummyTummy.jpg" alt="logo" width="40" height="40"> </a>
      <a class="navbar-brand" href="index.php">Yummy Tummy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recipes.php">Recipe</a>
          </li>
          <?php
            if(isset($_SESSION['login']))
            {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="imageUpload.php">Upload Image</a>';
              echo '</li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="logout.php">Logout</a>';
              echo '</li>';
            }
            else {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="login.php">Upload Image</a>';
              echo '</li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="login.php">Login</a>';
              echo '</li>';
            }
           ?>
        </ul>
      </div>
    </nav>
  </header>
  <main class="main-content">
    <ul class="thumbnail-list">
      <li></li><hr class="featurette-divider">

    </ul>

    <script src="scripts/main.js" charset="utf-8"></script>
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Anas Eladidy. <span class="text-muted">Team Lead</span></h2>
    		<p class="lead"> aelhadidy@csu.fullerton.edu </p>
    		<p class="lead">	Major: MS Computer Science </p>
    		<p class="lead">	Expected Graduation: </p>
    		<p class="lead">	Specialty: Oracle Database, Data Warehousing, Data mining  </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src = "img/AnasEmoji.gif" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">David Toledo Viveros. <span class="text-muted">aka the Database dude</span></h2>
    		<p class="lead"> DViveros@csu.fullerton </p>
    		<p class="lead">	Major: BS Computer Science </p>
    		<p class="lead">	Expected Graduation: Fall 2019 </p>
    		<p class="lead">	Specialty: C++ programmer, Software Engeering, System adminstrator</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src = "img/DavidEmoji.gif" alt="Generic placeholder image">
      </div>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Shubhankar Killol. <span class="text-muted">Or just Shub</span></h2>
    		<p class="lead">sKillol@csu.fullerton.edu </p>
    		<p class="lead">Major: MS Computer Engineering</p>
    		<p class="lead">Expected Graduation: </p>
    		<p class="lead">Specialty: .Net programmer, Cloud architech </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src = "img/ShubhankarEmoji.gif"  alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Ivan Vu. <span class="text-muted">aka that one asian dude with the big glasses</span></h2>
        <p class="lead">vivu493@csu.fullerton.edu </p>
        <p class="lead">Major: BS Computer Science</p>
        <p class="lead">Expected Graduation: Fall 2018 </p>
        <p class="lead">Specialty:Front/Back-end deverloper, Project Mangagement, Full-stack developer </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src = "img/IvanEmoji.gif" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

     <!--END THE FEATURETTES-->


    <!-- FOOTER -->
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; 2018-2020 Yummy Tummy, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
  </main>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="scripts/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="scripts/jquery-slim.min.js"><\/script>')
  </script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
</body>

</html>
