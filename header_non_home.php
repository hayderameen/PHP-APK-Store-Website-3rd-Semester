<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="index.php"><img src="resources/APKHOUSE.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   <!--  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
      <ul class="nav navbar-nav">
      <?php
        session_start();

        // Checking if user is logged on or not
        if (isset($_SESSION['user']) || !empty($_SESSION['user'])) {
          if (isset($_SESSION['pass']) || !empty($_SESSION['pass'])) {
          
            echo '<li><a href="admin.php">Admin</a></li>';
        }
      }
      ?>
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="communication.php">Communication</a></li>
        <li><a href="fitness.php">Fitness</a></li>
        <li><a href="music.php">Music</a></li>
        <li><a href="games.php">Games</a></li>
        <li><a href="photography.php">Photography</a></li>
        <li><a href="blog.php">Blog</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="about.php">About Us</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
      </ul>
    <!-- </div> --><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

</body>
</html>