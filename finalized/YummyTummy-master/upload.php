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
    //connection to database successful

    //limit the image size data to 15mb
    if ($_FILES["fileToUpload"]["size"] > 15000000){
      echo "Sorry, your file is too large.<br>";
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
  echo 'Please enter all fields, title, description, and image';
}
?>
