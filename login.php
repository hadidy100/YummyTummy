<?php

//start session
session_start();

//if the user has already logged in and hits back
//or navigates to login.php again, redirect him to home page
if(isset($_SESSION['login']))
{
  echo "<script> window.location.assign('index.html'); </script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheets/loginStyle.css">
  <title>Login</title>
</head>
<body>
  <header>
    <h1 class="logo">Yummy Tummy</h1>
    <nav>
      <ul>
      </ul>
    </nav>
  </header>
  <section class="tagline">
    <div class="container">
    </div>
  </section>
  <section>
    <div class="loginStyle">
      <table align="center">
        <tr>
          <td align="center" style="font-size:35px; padding-bottom:100px;">User Login</td>
        </tr>
      </table>
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
            <td colspan="2"><input class="btn-lg" type="submit" value="Login" style="display:table-cell; width:100%;"></td>
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

                        //run query comparison with user entered username and password
                        $query = "select * from users where userName = '$username' and password='$password'";
                        $result = $db->query($query);
                        $num_results = $result->num_rows;

                        if($num_results > 0)
                        {
                          $_SESSION['login'] = true;

                          $result->free();
                          $db->close();

                          echo "<script> window.location.assign('index.html'); </script>";
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
            ?>


          </td>
        </tr>
        </table>
      </form>

    </div>
  </section>
  <footer>
    <p>All rights reserved</p>
  </footer>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scripts/main.js" charset="utf-8"></script>
</html>
