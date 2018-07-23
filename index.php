<?php

//start session
session_start();

//if the user has already logged in and hits back
//or navigates to login.php again, redirect him to home page
// if(isset($_SESSION['login']))
// {
//   echo "logged in";
//   echo "<script> window.location.assign('index.php'); </script>";
// }

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
    <link href="stylesheets/modal.css" rel="stylesheet">

  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a href="index.html"> <img class="rounded-circle" href="index.html" src="img/YummyTummy.jpg" alt="logo" width="40" height="40"> </a>
        <a class="navbar-brand" href="index.html">Yummy Tummy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq2.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="recipes.html">Recipe</a>
            </li>
            <li class="nav-item">

              <?php
                  if (isset($_SESSION['login']))
                  {
                    echo '<a class="nav-link" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;" href="#">Logout</a>';
                  }
                  else{
                    echo '<a class="nav-link" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;" href="#">Login</a>';
                  }
              ?>



<!-- modal code start -->
    <div id="id01" class="modal">

  <form class="modal-content animate" action="" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit" value="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <br>
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    <?php

      if(!isset($_POST['login']))
      {
          //check if login has been attempted
          if(isset($_POST['username']) && isset($_POST['password']))
          {
            //get the username and password from user
            $username = $_POST['username'];
            $password = $_POST['password'];

            //connect to db and run query only AFTER user has submitted form
            if($username && $password)
            {
              $db = new mysqli('localhost','root','','YUMMYTUMMY');

              //check if connection is successful
              if(mysqli_connect_errno())
              {
                echo 'Error connecting to database!';
                exit;
              }
              else {

                //run query comparison with user entered username and password
                $query = "select * from users where userName = '$username' and password='$password'";
                $result = $db->query($query);
                $num_results = $result->num_rows;

                if($num_results > 0)
                {
                  $_SESSION['login'] = true;

                  $result->free();
                  $db->close();

                  echo "<script> window.location.assign('index.php'); </script>";
                }
                else
                {
                  echo 'Incorrect login, please try again.';
                  session_destroy();

                  //if login failed clear query results and close database connection
                  $result->free();
                  $db->close();
                }
              }
          }
        }
      }
    ?>
  </form>
</div>
<!-- modal code end -->
            </li>
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
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">View Mexican food</a></p>
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
                <p><a class="btn btn-lg btn-primary" href="#" role="button">View Indian Food</a></p>
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
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Jordanian Food</a></p>
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
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Vietnamese Food</a></p>
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
        <p class="float-right"><a href="#">Back to top</a></p>

        <p>&copy; 2018-2020 Yummy Tummy, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <script src="scripts/main.js"></script>
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
