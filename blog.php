<?php

//start session
session_start();

if(isset($_GET['label']))
{
  $_SESSION['lbl'] = $_GET['label'];
}


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
      <form method="GET">
      <div class="container marketing">

        <?php

        //create database connection
        $db = new mysqli('localhost','root','','YUMMYTUMMY');

        //check if connection is successful
        if(mysqli_connect_errno())
        {
          echo 'Error connecting to server, try again later.';
          exit;
        }
        else
        {
            //to store returned query results
            $img;
            $id = 0;
            $imgLabel;
            $imgDesc;

            //query the database to retrieve image and display back to user
            $stmt = $db->prepare("SELECT I.IMAGE,I.IMAGEID,I.IMAGELABEL,R.DESCRIPTION FROM IMAGES I, MEALINGREDIENT R WHERE I.IMAGEID = R.IMAGEID AND I.IMAGEID = ?");
            $stmt->bind_param("s",$_SESSION['lbl']);
            $stmt->execute();
            $stmt->bind_result($img,$id,$imgLabel,$imgDesc);
            $row = $stmt->fetch();

            //clear up results for another query
            $stmt->free_result();
            $stmt->close();

            $img = base64_encode($img);

            //if row returns greater than 0, our query was successful
            if($row > 0)
            {
              echo '<div style="height:100%; width:100%">';
              echo '<img style="padding: 30px 0 30px 0; display:block; margin-left: auto; margin-right: auto;" width="65%" height="65%" src="data:image/jpeg;base64,'.$img.'"/>';
              echo '<h2 name="label" value="'.$imgLabel.'" style="text-align:center; text-decoration:underline">'.$imgLabel.'</h2>';
              echo '<p style="text-align:center;">'.$imgDesc.'</p>';
              echo '</div>';
              echo '<div>';

              //if the user is not logged in, he cannot post comments only see them.
              if(!isset($_SESSION['login']))
              {
                echo '<p style="text-align:center;">You must be logged in to post your comments</p>';
              }
              else {
                echo '<textarea style="color: black; background-color: #E2E9EF" placeholder="Comment..." class="description" type="text" name="description" value="" rows="2" maxlength="200" required></textarea>';
                //<br>
                echo '<input style="height:100%; width:100%; background-color:#0E7BCE; color: white;"class="btn-lg" type="submit" value="POST COMMENT" name="postit" />';
              }

              $prevComment;
              $prevUser;
              $prevTime;

              //post if the comment has been submited.
              if(isset($_GET['postit']))
              {

                /*
                $stmt = $db->prepare("INSERT INTO COMMENTS (COMMENT, USERNAME, IMAGEID, IMAGELABEL) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssis", $_GET['description'], $_SESSION['user'], $id, $_SESSION['lbl'] );
                $stmt->execute();
                //clear up results to run another query
                $stmt->free_result();
                $stmt->close();
                */

                $stmt = $db->prepare("INSERT INTO RATINGS (COMMENT, USERID, IMAGEID) VALUES (?, ?, ?)");
                $stmt->bind_param("ssi", $_GET['description'], $_SESSION['userid'], $id);
                $stmt->execute();
                //clear up results to run another query
                $stmt->free_result();
                $stmt->close();

              }
              else{

              }


              //query for any previous Comments
              /*
              $stmt = $db->prepare("SELECT USERNAME,COMMENT,TIMEST FROM COMMENTS WHERE IMAGELABEL = ?");
              $stmt->bind_param("s",$_SESSION['lbl']);
              $stmt->execute();
              $stmt->bind_result($prevUser,$prevComment,$prevTime);
              $row = $stmt->fetch();
              */

              $stmt = $db->prepare("SELECT U.USERNAME, T.COMMENT, T.TIMELOGED FROM USERS U, RATINGS T WHERE U.USERID = T.USERID AND T.IMAGEID = ?");
              $stmt->bind_param("i",$_SESSION['lbl']);
              $stmt->execute();
              $stmt->bind_result($prevUser,$prevComment,$prevTime);
              $row = $stmt->fetch();

              if($row > 0)
              {
                //succcessful query
                echo '<div style="background-color:rgba(0, 33, 78, 0.7);">';
                while($row)
                {
                  echo '<div>';
                  echo '<p style="color:white;">'.$prevUser.'@'.$prevTime.':   '.$prevComment.'</p>';
                  echo '</div>';
                  $row = $stmt->fetch();
                }
                echo '</div>';
              }
              else {
              }

              //clear up results for another query
              $stmt->free_result();
              $stmt->close();

              echo '</div>';
            }

            /*
            //upload the image to database, use prepared statement to prevent sql injection attacks

            */
        }

        //close our database connection
        $db->close();
        ?>

        <!-- Three columns of text below the yummy -->
        <div class="row">

        </div>
      </div><!-- /.container -->

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018-2020 Yummy Tummy, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </form>
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
