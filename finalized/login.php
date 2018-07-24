<?php

//start session
session_start();

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
              <a class="nav-link" href="faq2.php">FAQ</a>
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

      </div>
      <section class="tagline" align="center" style="padding:50px 0 50px 0;">
        <div class="container">
      <h1>User Login</h1>
        </div>
      </section>
      <div class="container marketing">

        <!-- Three columns of text below the yummy -->
        <div class="row">
          <div class="loginStyle">
    <form method="POST">
      <table align="center">
        <tr>
          <td style="font-size:20px;">Username: </td>
          <td><input style="font-size:20px;" type="text" name="username" required="required"></td>
        </tr>
        <tr>
          <td style="font-size:20px;">Password: </td>
          <td><input style="font-size:20px;" type="password" name="password" required="required"></td>
        </tr>
        <tr>
          <td style="padding:25px 0 25px 0;" colspan="2"><input class="btn-lg" type="submit" value="Login" style="display:table-cell; width:100%; padding:15px 0 15px 0;"></td>
        </tr>
      </table>
      <table align="center">
        <tr>
        <td align="center" style="font-size:25px; padding-top:25px; color:red;">


          <?php
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

                      $usid;
                      $usname;

                      $stmt = $db->prepare("SELECT USERID,USERNAME FROM USERS WHERE USERNAME = ? AND PASSWORD = ?");
                      $stmt->bind_param("ss",$username, $password);
                      $stmt->execute();
                      $stmt->bind_result($usid,$usname);

                      //create loop to display all images
                      $row = $stmt->fetch();

                      if($row > 0)
                      {
                        $_SESSION['login'] = true;
                        $_SESSION['userid'] = $usid;
                        $_SESSION['user'] = $usname;

                        $stmt->free_result();
                        $stmt->close();

                        echo "<script> window.location.assign('index.php'); </script>";

                      }
                      else
                      {
                        echo 'Incorrect login, please try again.';
                        session_destroy();

                        //if login failed clear query results and close database connection
                        $stmt->free_result();
                        $stmt->close();
                        $db->close();
                      }


                      /*
                      //run query comparison with user entered username and password
                      $query = "select * from USERS where userName = '$username' and password='$password'";
                      $result = $db->query($query);
                      $num_results = $result->num_rows;

                      if($num_results > 0)
                      {
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $username;


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
                      }*/
                    }
                }
              }
          ?>
            </td>
            </tr>
            </table>
          </form>
        </div>
      </div>
      </div>

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
</html>
