<?php include 'includes/header.php' ?>
<?php include 'includes/connect.php' ?>

      <h2>Register a new user</h2>
      <p>Please enter your details below to register your information</p>
        
      <form method="post">
          <div class="form-group">
              <label for="emailbox">Email address</label>
              <input type="email" id="emailbox" name="newemail" placeholder="Enter email">
          </div>
          <div class="form-group">
              <label for="passwordbox">Password</label>
              <input type="password" id="passwordbox" name="newpass" placeholder="Password">
          </div>

          <button class="logReg" type="submit" name="newlogin">Submit</button>
      </form>

      <?php

        $salt ="4g£yc7";

        if(isset($_POST['newlogin'])) {

            $statement = $DB->prepare("SELECT * FROM logins WHERE emailAddress = '".$_POST['newemail']."'");
            $statement->execute();

            $count = $statement->rowCount();

            if($count > 0){
              echo "Email already taken, please try again...";
            } else {

            $username = trim($_POST['newemail']);
            $password = trim($_POST['newpass']);
            $password = md5($password.$salt);
                  
            $statement = $DB->prepare("INSERT INTO logins (userID, emailAddress, password) VALUES (NULL, '$username', '$password')");
            $statement->execute();

            $statement = $DB->prepare("INSERT INTO users (userID, emailAddress) VALUES (null, '$username')");
            $statement->execute();

            echo "<p>Success, you have registered your details!</p>";

            } 
        }

      include 'includes/footer.php'
  ?>