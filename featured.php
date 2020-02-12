<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="resources/fb.jpg" alt="Communication Apps" height="600">
        <div class="carousel-caption">
          <h3>Communication Apps</h3>
          <p>Download APKs of your favourite social applications like Facebook, Instagram, WhatsApp and many more</p>
        </div>
      </div>

      <div class="item">
        <img src="resources/fitness.jpg" alt="Health and Fitness Apps" height="600">
        <div class="carousel-caption">
          <h3>Health and Fitness Apps</h3>
          <p>Need some motivation to lose that unnecessary weight? Try Health and Fitness Apps from APK House</p>
        </div>
      </div>
    
      <div class="item">
        <img src="resources/music.jpg" alt="Music Apps" height="600">
        <div class="carousel-caption">
          <h3>Music and Entertainment Apps</h3>
          <p>Without music, Life would be a Mistake!</p>
        </div>
      </div>

      <div class="item">
        <img src="resources/games.jpg" alt="Games" height="600">
        <div class="carousel-caption">
          <strong><h3 >Download APKs and OBB Files of Top Rated Games</h3></strong>
          <blockquote><p><kbd>Some people say video games rot your brain, but I think they work different muscles that maybe you don't normally use</kbd></p>
             <footer><short>Ezra Koenig</short></footer></blockquote>
        </div>
      </div>

      <div class="item">
        <img src="resources/photography.jpg" alt="Photography Apps" height="600">
        <div class="carousel-caption">
          <strong><h3 >Best Photography Apps for Android Phones and Tablets</h3></strong>
          <p>There are No Rules for Good Photographs. There are Only Good Photographs</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
   <!--  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>
</div>

</body>
</html>