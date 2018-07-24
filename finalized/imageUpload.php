<?php

//start session
session_start();

//prevent users that have not logged in from accessing
//imageupload.php file to upload images, only logged in users can do so.
if(!isset($_SESSION['login']))
{
  echo "<script> window.location.assign('login.php'); </script>";
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
  <section>
    <div style="background-color:gray;">
      <h1 style="text-align:center; color:white; padding:15px 0 15px 0;">Upload Image</h1>
    </div>
    <div class="parent">
      <div>
      <form  method="post" enctype="multipart/form-data">
        <h4 class="imageDetails">Select image to upload</h4>
        <input class="fileToUpload" type="file" name="fileToUpload" id="fileToUpload" required/>
        <h4 class="imageDetails">Image Title</h4>
        <input class="imageLabel" type="text" name="title" value="" maxlength="30" required/>
        <h4 class="imageDetails">Food Type</h4>

        <select name="selection" style="width:100%; font-size:20px;">
          <option value="3">Mexican</option>
          <option value="2">Jordanian</option>
          <option value="1">Indian</option>
          <option value="4">Vietnamese</option>
        </select>

        <h4 class="imageDetails">Description</h4>
        <textarea class="description" type="text" name="description" value="" rows="7" maxlength="120" required></textarea>
        <br>
        <input class="btn-lg" type="submit" value="Upload Image" name="submit" />
      </form>
    </div>
    </div>
    <div style="padding:50px 0 50px 0; margin: auto; width: 100%; text-align: center; display:inline-block;">

    <?php

    //check if form has been submmited
    if(isset($_POST['submit'])){


      //get the form variables and image data
      $label = $_POST['title'];
      $desc = $_POST['description'];
      $selection = $_POST['selection'];
      $image = file_get_contents($_FILES['fileToUpload']['tmp_name']);

      //create database connection
      $db = new mysqli('localhost','root','','YUMMYTUMMY');

      //check if connection is successful
      if(mysqli_connect_errno()){
        echo 'Error connecting to server, try again later.';
        exit;
      }
      else {
        //limit the image size data to 15mb
        if ($_FILES["fileToUpload"]["size"] > 5000000){
          echo "<h3><p style='align-items:center;display:flex; justify-content:center;'>Sorry, your file is too large.</p></h3>";
        }
        else {
          //upload the image to database, use prepared statement to prevent sql injection attacks
          $stmt = $db->prepare("INSERT INTO IMAGES (IMAGE, IMAGELABEL, COUNTRYID) VALUES (?, ?, ?)");
          $stmt->bind_param("ssi", $image, $label, $selection);
          $stmt->execute();
          //clear up results to run another query
          $stmt->free_result();
          $stmt->close();

          //to store returned query results
          $img;
          $id = 0;

          //query the database to retrieve image and display back to user
          $stmt = $db->prepare("SELECT IMAGE,IMAGEID FROM IMAGES WHERE IMAGELABEL = ?");
          $stmt->bind_param("s",$label);
          $stmt->execute();
          $stmt->bind_result($img,$id);
          $row = $stmt->fetch();

          //clear up results for another query
          $stmt->free_result();
          $stmt->close();

          $img = base64_encode($img);

          //if row returns greater than 0, our query was successful
          if($row > 0)
          {
            echo '<img src="data:image/jpeg;base64,'.$img.'"/>';
          }

          //insert into mealingridients
          //query the database to retrieve image and display back to user
          $stmt = $db->prepare("INSERT INTO MEALINGREDIENT(IMAGEID,DESCRIPTION) VALUES(?,?)");
          $stmt->bind_param("is",$id,$desc);
          $stmt->execute();

          //clear up results for another query
          $stmt->free_result();
          $stmt->close();
        }
      }

      //close our database connection
      $db->close();

    }
    else {

    }
    ?>
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
</html>
