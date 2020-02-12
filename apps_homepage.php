<?php
  $connection = new mysqli("localhost", "root", "root", "apkhouse");

  if ($connection->connect_error) {
    echo "Error establishing connection with Database: " . $connection->connect_error;
  }

  function select_game_apk_data_1() { // Shows first 3 Games in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=4
       LIMIT 3 OFFSET 0";

       return $connection->query($sql);
  }

  function select_game_apk_data_2() { // Shows next 3 Games in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=4
       LIMIT 3 OFFSET 3";

       return $connection->query($sql);
  }

  function select_communication_apk_data_1() { // Shows first 3 Communication Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=1
       LIMIT 3 OFFSET 0";

       return $connection->query($sql);
  }

  function select_communication_apk_data_2() { // Shows next 3 Communication Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=1
       LIMIT 3 OFFSET 3";

       return $connection->query($sql);
  }

  function select_fitness_apk_data_1() { // Shows first 3 fitness Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=2
       LIMIT 3 OFFSET 0";

       return $connection->query($sql);
  }

  function select_fitness_apk_data_2() { // Shows next 3 fitness Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=2
       LIMIT 3 OFFSET 3";

       return $connection->query($sql);
  }

  function select_music_apk_data_1() { // Shows first 3 music Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=3
       LIMIT 3 OFFSET 0";

       return $connection->query($sql);
  }

  function select_music_apk_data_2() { // Shows next 3 music Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=3
       LIMIT 3 OFFSET 3";

       return $connection->query($sql);
  }

  function select_photo_apk_data_1() { // Shows first 3 photo Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=5
       LIMIT 3 OFFSET 0";

       return $connection->query($sql);
  }

  function select_photo_apk_data_2() { // Shows next 3 photo Apps in Database

    global $connection;

    $sql = "SELECT app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=5
       LIMIT 3 OFFSET 3";

       return $connection->query($sql);
  }



?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  

</head>
  <body>
    <!-- <div class="container"> -->

    <center><h2 id="communication-homepage" class="bg-success img-rounded" style="padding-top: 20px; padding-bottom:20px;">Communication Apps <small>Connect with your loved ones</small></h2></center>

    <div class="row"> <!-- div start of first row of communication -->

    <?php
      $data = select_communication_apk_data_1();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- div end of first row of communication -->

    <br>

    <div class="row"> <!-- second block of communication row -->

      <?php
      $data = select_communication_apk_data_2();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- end of second communication row -->

    <div class="row"> <!-- View all button -->
      <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <center>
          <h4 class="bg-info img-rounded" style="padding: 5px;"><strong><a href="communication.php">View All</a></strong></h4>
        </center>
      </div>
    </div> <!-- End of view all button -->

    <center><h2 id="fitness-homepage" class="bg-success img-rounded" style="padding-top: 20px; padding-bottom:20px;">Fitness and Health Apps <small>Stay Healthy</small></h2></center>

    <div class="row"> <!-- div start of first row of fitness -->

    <?php
      $data = select_fitness_apk_data_1();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- div end of first row of fitness -->

    <br>

    <div class="row"> <!-- second block of fitness row -->

      <?php
      $data = select_fitness_apk_data_2();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- end of second fitness row -->

    <div class="row"> <!-- View all button -->
      <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <center>
          <h4 class="bg-info img-rounded" style="padding: 5px;"><strong><a href="fitness.php">View All</a></strong></h4>
        </center>
      </div>
    </div> <!-- End of view all button -->

    <center><h2 id="music-homepage" class="bg-success img-rounded" style="padding-top: 20px; padding-bottom:20px;">Music and Entertainment Apps <small>Enjoy every moment!</small></h2></center>

    <div class="row"> <!-- div start of first row of music -->

    <?php
      $data = select_music_apk_data_1();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- div end of first row of music -->

    <br>

    <div class="row"> <!-- second block of music row -->

      <?php
      $data = select_music_apk_data_2();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- end of second music row -->

    <div class="row"> <!-- View all button -->
      <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <center>
          <h4 class="bg-info img-rounded" style="padding: 5px;"><strong><a href="music.php">View All</a></strong></h4>
        </center>
      </div>
    </div> <!-- End of view all button -->

    <center><h2 id="games-homepage" class="bg-success img-rounded" style="padding-top: 20px; padding-bottom:20px;">Games <small>Hottest Android Games</small></h2></center>

    <div class="row"> <!-- div start of first row of games -->

    <?php
      $data = select_game_apk_data_1();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- div end of first row of games -->

    <br>

    <div class="row"> <!-- second block of games row -->

      <?php
      $data = select_game_apk_data_2();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- end of second games row -->

    <div class="row"> <!-- View all button -->
      <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <center>
          <h4 class="bg-info img-rounded" style="padding: 5px;"><strong><a href="games.php">View All</a></strong></h4>
        </center>
      </div>
    </div> <!-- End of view all button -->

    <center><h2 id="photo-homepage" class="bg-success img-rounded" style="padding-top: 20px; padding-bottom:20px;">Photography Apps <small>Perfect Tools to Capture Perfect Moments</small></h2></center>

    <div class="row"> <!-- div start of first row of photo -->

    <?php
      $data = select_photo_apk_data_1();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- div end of first row of photo -->

    <br>

    <div class="row"> <!-- second block of photo row -->

      <?php
      $data = select_photo_apk_data_2();

      if ($data->num_rows>0) {
        while ($row = $data->fetch_assoc()) {
          $title = $row['app_name'];
          $d_link = $row['link'];
          $dev = $row['developer'];
          $category_name = $row['name'];
          $version_name = $row['version'];
          $size_app = $row['size'];
          $image = $row['link_img'];
          $image_alt = $row['alt'];

          echo '<div class="col-md-4">
            <h3 style="padding:10px;" class="bg-primary media-heading img-rounded">', $title ,'</h3>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-rounded media-object" src="', $image ,'" alt="', $image_alt ,'" width="100" height="100">
            </div>
              <div class="col-md-8">
                <p>Archived in: ', $category_name ,'<hr style="margin: 0px; padding: 0px;">
                Developed by: ', $dev ,'<hr style="margin: 0px; padding: 0px;">
                Version: ', $version_name,'  |  Size: ', $size_app ,'</p>
                <h5><a href="', $d_link ,'" target="_blank">', $title ,' APK</a></h5>
              </div>
            </div>
          </div>';

        }
      }
    ?>
       
    </div> <!-- end of second photo row -->

    <div class="row"> <!-- View all button -->
      <div class="col-md-8"></div>
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <center>
          <h4 class="bg-info img-rounded" style="padding: 5px;"><strong><a href="photography.php">View All</a></strong></h4>
        </center>
      </div>
    </div> <!-- End of view all button -->
      
    <!-- </div> -->
  </body>
</html>