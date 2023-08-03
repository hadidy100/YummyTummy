<?php

//start session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yummy Tummy</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="stylesheets/yummy.css" rel="stylesheet">
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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


    <main role="main">
      <div id="myyummy" class="yummy slide" data-ride="yummy">
        <ol class="yummy-indicators">
          <li data-target="#myyummy" data-slide-to="0" class="active"></li>
          <li data-target="#myyummy" data-slide-to="1"></li>
          <li data-target="#myyummy" data-slide-to="2"></li>
          <li data-target="#myyummy" data-slide-to="3"></li>
        </ol>
        <div class="yummy-inner">
          <div class="yummy-item active">
            <img class="first-slide" src="img/CarneAsada.jpg" alt="First slide">
            <div class="container">
              <div class="yummy-caption text-left">
                <div class="transbox">
                  <h1>Mexican</h1>
                  <p>Chili peppers, tortillas, and fresh vegetables are hallmarks of this colorful, vibrant cuisine.</p>
                  <p><a  class="btn btn-lg btn-primary" href="menu.php?type=3" role="button">View Mexican food</a></p>
                </div>
                </div>
            </div>
          </div>
          <div class="yummy-item">
            <img class="second-slide" src="img/Biryani.jpg" alt="Second slide">
            <div class="container">
              <div class="yummy-caption">
                <div class="transbox">
                <h1>Indian</h1>
                <p>Biryani, Chole Bhature, Chicken Masala, Tandooriv chicken.</p>
                <p><a class="btn btn-lg btn-primary" href="menu.php?type=1" role="button">View Indian Food</a></p>
              </div>
              </div>
            </div>
          </div>
          <div class="yummy-item">
            <img class="third-slide" src="img/Mansaf.jpg" alt="Third slide">
            <div class="container">
              <div class="yummy-caption">
                <div class="transbox">
                <h1>Jordanian</h1>
                <p>Like it or not, Mansaf is here on our page</p>
                <p><a class="btn btn-lg btn-primary" href="menu.php?type=2" role="button">Jordanian Food</a></p>
              </div>
              </div>
            </div>
          </div>
          <div class="yummy-item">
            <img class="fourth-slide" src="img/SpringRoll.jpg" alt="Third slide">
            <div class="container">
              <div class="yummy-caption text-right">
                <div class="transbox">
                <h1>Vietnamese</h1>
                <p>Pho, spring roll and other cuisine are here for you to argue!</p>
                <p><a class="btn btn-lg btn-primary" href="menu.php?type=4" role="button">Vietnamese Food</a></p>
              </div>
              </div>
            </div>
          </div>

        </div>
        <a class="yummy-control-prev" href="#myyummy" role="button" data-slide="prev">
          <span class="yummy-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="yummy-control-next" href="#myyummy" role="button" data-slide="next">
          <span class="yummy-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- Marketing messaging and featurettes
      ==================================================
       Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">



      </div><!-- /.container -->

      <hr class="featurette-divider">
      <!-- FOOTER -->
      <footer class="container">
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
    <script src="scripts/holder.min.js"></script>
  </body>
</html>
