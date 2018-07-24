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


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheets/submitStyle.css">
  <title>Yummy Tummy</title>
</head>

<body>
  <header>
    <h1 class="logo">Yummy Tummy</h1>
  </header>
  <section>
    <div class="title">
      <h1>Upload Image</h1>
    </div>
    <div class="parent">
      <div>
      <form  method="post" enctype="multipart/form-data">
        <h3 class="imageDetails">Select image to upload</h3>
        <input class="fileToUpload" type="file" name="fileToUpload" id="fileToUpload" required/>
        <h3 class="imageDetails">Image Title</h3>
        <input class="imageLabel" type="text" name="title" value="" maxlength="30" required/>
        <h3 class="imageDetails">Description</h3>
        <textarea class="description" type="text" name="description" value="" rows="7" maxlength="120" required></textarea>
        <br>
        <input class="btn-lg" type="submit" value="Upload Image" name="submit" />
      </form>
    </div>
    </div>


    <div style="padding:50px 0 50px 0; margin: auto; width: 100%; text-align: center; display:inline-block; border:1px solid black;">



    <?php

    //check if form has been submmited
    if(isset($_POST['submit'])){

      //get the form variables and image data
      $label = $_POST['title'];
      $desc = $_POST['description'];
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
        if ($_FILES["fileToUpload"]["size"] > 500000){
          echo "<h3><p style='align-items:center;display:flex; justify-content:center;'>Sorry, your file is too large.</p></h3>";
        }
        else {
          //upload the image to database, use prepared statement to prevent sql injection attacks
          $stmt = $db->prepare("INSERT INTO images (image, imageLabel) VALUES (?, ?)");
          $stmt->bind_param("ss", $image, $label );
          $stmt->execute();
          //clear up results to run another query
          $stmt->free_result();
          $stmt->close();

          //to store returned query results
          $img;
          $id = 0;

          //query the database to retrieve image and display back to user
          $stmt = $db->prepare("SELECT image,imageId FROM images WHERE imageLabel = ?");
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
            //echo '<br>'.$id;
            //echo '<br>'.$desc;

            //update our imageDescription table as well.
            $stmt = $db->prepare("INSERT INTO imageDescription(imageId, description) VALUES (?, ?)");
            $stmt->bind_param("is",$id,$desc);
            $stmt->execute();
            //clear up results to run another query
            $stmt->free_result();
            $stmt->close();
          }
        }
      }

      //close our database connection
      $db->close();

    }
    else {

    }
    ?>
  </div>








  </section>
  <footer>
    <p>All rights reserved</p>
  </footer>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scripts/main.js" charset="utf-8"></script>

</html>
