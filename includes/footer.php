<?php include 'includes/connect.php';
$statement = $DB->prepare("SELECT * FROM company");                 
$statement->execute();
$result = $statement->fetchAll();
?>
<footer>
          <div id="footerColumn">
            <a href="index.php">Home</a>
            <a href="gallary.php">Gallery</a>
            <a href="trails.php">Bike Trials</a>
            <a href="contact.php">Contact Page</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          </div>
          <div id="footerColumn">
            <?php
            foreach ($result as $rs) {
              echo'
            <p>Telephone Number: '.$rs["contactNumber"].'</p>
            <p>Email: '.$rs["email"].'</p>
          </div>';
            }
          ?>
          <div id="footerColumn">
            <img class="footericon" src="facebook.svg">
            <img class="footericon" src="instagram (1).svg">
            <img class="footericon" src="twitter (1).svg">
          </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>

</html>