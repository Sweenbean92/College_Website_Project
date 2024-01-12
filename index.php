<?php include 'includes/header.php' ?>
<?php include 'includes/connect.php' ?>

  <?php
  
  $statement = $DB->prepare("SELECT * FROM company");
  $statement->execute();

  $result = $statement->fetchAll();

  if($result) {
    foreach ($result as $rs) {

      echo '<p id="times">Weekdays '.$rs["weekDayOpen"].' to '.$rs["weekDayClose"].'';
      echo '<p id="times">Saturday '.$rs["saturdayOpen"].' to '.$rs["saturdayClose"].'';
      echo '<p id="times">Sunday '.$rs["sundayOpen"].' to '.$rs["sundayClose"].'';
    }
  }
  else {
    echo 'The Shop is Closed';
  }

  
  ?>
        
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="picture\bike_pic1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="picture\bike_pic2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="picture\bike_pic5.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <?php
          
          if (isset($_SESSION['userdb'])) {
            echo '<p>Welcome '.$_SESSION["userName"].'</p>';
          } else {
            echo '<p>Welcome new user! Register <a class="homeLink" href="register.php">here!</a><p>';
          }
          ?>

<?php include 'includes/footer.php' ?>

