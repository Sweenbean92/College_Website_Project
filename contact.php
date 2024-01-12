<?php include 'includes/connect.php';
include 'includes/header.php';
$statement = $DB->prepare("SELECT * FROM company");                 
$statement->execute();
$result = $statement->fetchAll();
?>

        <h2>Where to Find Us</h2>
        <p>Bike King Borders have a social media account on all the major platforms so you can follow us for updates anywhere! The links are below and don't forget to follow!</p>

        <div class="icons">
          <img class="icon" src="facebook.svg">
          <img class="icon" src="instagram (1).svg">
          <img class="icon" src="twitter (1).svg">
        </div>

        <p>We also have an email and phone number that you can contact us on!</p>
        <?php
        foreach ($result as $rs) {
              echo'
            <p>Telephone Number: <b>'.$rs["contactNumber"].'</b></p>
            <p>Email: <b>'.$rs["email"].'</b></p>
          </div>';
            }
          ?>
        
<?php include 'includes/footer.php' ?>