<?php

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
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item active">
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

    <div class="row featurett">
      <div class="col-md-7">
        <h2 class="featurette-heading">FAQ</h2>
        <ol type ="1" class = "lead">
          <li>How do I get the recipes?</li>
          <p class="answer">	Click on a photo and you will be taken to the submitter's blog post, where you'll most likely find a recipe. </p>
          <li>How do I share my favorites page with my friends?</li>
          <p class="answer">	To share your favorites, go to your favorites page and click on the "share with friends" link above the filter by category box. once your favorites page is public, your friends can see your favorited posts. you can also share any favorites page, tag page, category or search result page. it's a great way to share and meal plan with your friends and family. </p>
          <li>Can anyone submit pictures?</li>
          <p class="answer">	Yes, anyone with a blog or publishing original content is able to submit. </p>
          <li>Can you provide more specific feedback on how to get photos accepted?</li>
          <p class="answer">	While we would love to respond to every inquiry with more specific ways to improve your photos, we don't have the resources to provide an in-depth review of your photos. keep in mind that while we have quality guidelines for our editors, the photo selection process is still a subjective one and we will never agree 100% of the time on accepted or declined photos.
          we encourage you to keep on submitting and review the photography tips in the faq below. </p>
          <li>Can I submit multiple pictures from the same post?</li>
          <p class="answer">	We encourage you to select the best image from your post and submit only one. if your submission is not accepted and you feel another picture within that post is worthy of consideration, feel free to try again. but please don't submit multiple pictures of the same post within minutes of each other. let the moderation process happen before you upload another image from the original post/submission. </p>
        </ol>
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
  <script src="scripts/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="scripts/holder.min.js"></script>
</body>

</html>
