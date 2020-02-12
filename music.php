<?php
  $connection = new mysqli("localhost", "root", "root", "apkhouse");

  if ($connection->connect_error) {
    echo "Error establishing connection with Database: " . $connection->connect_error;
  }

  function select_music_apk_data() { // Shows first 3 communication in Database

    global $connection;

    $sql = "SELECT app.description, app.app_name, app.developer, category.name, apk.version, apk.link, apk.size, app_image.link_img, app_image.alt
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=3";

       return $connection->query($sql);
  }

  function count_total_apps() {

    global $connection;

    $sql = "SELECT COUNT(*) FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id 
       WHERE category.cat_id=1";

       return $connection->query($sql);
  }

?>

<html>
<head>
  <title>Music and Entertainment Apps - Download APKs from APK House</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .app_heading {
      color: #fff;
      background-color: #ff3200;
    }

    #main_heading {
      color: #ff3200;
      background-color: #fff;
    }
  </style>
</head>
<body id="top-home">
  <?php include('header_non_home.php'); ?>
  <br>
  <br>
  <br>
  <div class="container">

      <center><h2 id="main_heading" class="img-rounded" style="padding-top: 20px; padding-bottom:20px;">Viewing All Music and Entertainment Apps <small class="bg-primary img-rounded" style="padding: 5px;">Enjoy every moment!</small></h2></center>
    

    <br>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <div class="row"> <!-- div start of first row of music -->

    <?php
      $data = select_music_apk_data();

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
          $desc = $row['description'];

          echo '<div class="col-md-4">
            <h3 data-toggle="tooltip" title="',$desc,'" style="padding:10px;" class="app_heading media-heading img-rounded">', $title ,'</h3>
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
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><?php include('request_apk.php'); ?></div>
      <div class="col-md-3"></div>
    </div>

    


  </div>

  <br>
  <div class="footer">
  <?php include('footer_2.php'); ?>
</div>
<div class="footer">
  <?php include('footer.php'); ?>
</div>
</body>
</html>