<?php

//start session
session_start();

$type = $_GET['type'];

?>

<!doctype html>
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
      <div class="container marketing">

        <!-- Three columns of text below the yummy -->
        <div class="row">
          <?php
          //create database connection
          $db = new mysqli('localhost','root','','YUMMYTUMMY');

          //check if connection is successful
          if(mysqli_connect_errno()){
            echo 'Error connecting to server, try again later.';
            exit;
          }
          else
          {
            $img;
            $lbl;
            $desc;
            $imgid;

            //run query to retrieve images based on the type category, mexican, jordanian, indian, vietnamese
            //query the database to retrieve image and display back to user

            $stmt = $db->prepare("SELECT I.IMAGE, I.IMAGELABEL, R.DESCRIPTION, I.IMAGEID FROM IMAGES I, MEALINGREDIENT R WHERE I.IMAGEID = R.IMAGEID AND I.COUNTRYID = ?");

            //$stmt = $db->prepare("SELECT IMAGE,IMAGELABEL,DESCRIPTION,IMAGEID FROM IMAGES WHERE COUNTRYID = ?");
            $stmt->bind_param("i",$type);
            $stmt->execute();
            $stmt->bind_result($img,$lbl,$desc,$imgid);

            //create loop to display all images
            $row = $stmt->fetch();

            $img = base64_encode($img);

            if($row > 0)
            {
              while($row)
              {
                echo '<div class="col-lg-4">';
                echo '<a href="blog.php?label='.$imgid.'"><img class="rounded-circle" src="data:image/jpeg;base64,'.$img.'" alt="Generic placeholder image" width="400" height="400" /></a>';
                echo '<h2>'.$lbl.'</h2>';
                echo '<p>'.$desc.'</p>';
                echo '<p><a class="btn btn-secondary" href="blog.php?label='.$imgid.'" role="button">Comments &raquo;</a></p>';
                echo '</div>';
                $row = $stmt->fetch();
                $img = base64_encode($img);
              }

              $stmt->free_result();
              $stmt->close();
            }
          }

          //close our database connection
          $db->close();


          ?>
        </div>
      </div><!-- /.container -->

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
    <script src="scripts/holder.min.js"></script>
  </body>

<!-- Mirrored from getbootstrap.com/docs/4.0/examples/yummy/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jul 2018 02:06:12 GMT -->
</html>
