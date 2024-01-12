<?php include 'includes/header.php' ?>
<?php include 'includes/connect.php' ?>

      <?php

      $statement = $DB->prepare("SELECT * FROM products");
      $statement->execute();

      $result = $statement->fetchAll();

      if($result){
        echo '<h2>Bikes</h2>';
        echo '<div id="carousel">';

        foreach ($result as $rs) {
          if ($rs['category'] == "Bike") {
            echo 
            '<div class="slide">
              <img src="data:image/jpeg;base64, '.base64_encode($rs['image']).'">
              
              <p>'.$rs['productName'].'</p>
              <p>£'.$rs['price'].'</p>
            </div>';
          }
        }

        echo '</div>';
      }

      if($result){
        echo '<h2>Clothes & Accessories</h2>';
        echo '<div id="carousel">';

        foreach ($result as $rs) {
          if ($rs['category'] == "Clothing" or $rs['category'] == "Accessories") {
            echo 
            '<div class="slide">
              <img src="data:image/jpeg;base64, '.base64_encode($rs['image']).'">
              
              <p>'.$rs['productName'].'</p>
              <p>'.$rs['price'].'</p>
            </div>';
          }
        }

        echo '</div>';
      }

      ?>

<?php include 'includes/footer.php' ?>