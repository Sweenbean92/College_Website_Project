<?php include 'includes/header.php' ?>

<?php

include 'includes/connect.php';

if(isset($_SESSION["userdb"])) {

    echo '<h2>User Login</h2>
    <p>You have logged in.</p>
    <p>Change your details below</p>';

    $user = $_SESSION["userName"];

    $statement=$DB->prepare("SELECT * FROM users WHERE emailAddress='$user'");
    $statement->execute();

    $result = $statement->fetchAll();

    foreach ($result as $rs) {
          echo 
          '<table border = "2" >
          <tbody>
              <tr>
                  <td>Email</td>
                  <td>'.$rs["emailAddress"].'</td>
              </tr>
              <tr>
                  <td>First Name</td>
                  <td>'.$rs["firstName"].'</td>
              </tr>
              <tr>
                  <td>Last Name</td>
                  <td>'.$rs["lastName"].'</td>
              </tr>
              <tr>
                  <td>House Name</td>
                  <td>'.$rs["houseNumber"].'</td>
              </tr>
              <tr>
                  <td>Street</td>
                  <td>'.$rs["street"].'</td>
              </tr>
              <tr>
                  <td>City</td>
                  <td>'.$rs["city"].'</td>
              </tr>
              <tr>
                  <td>Post Code</td>
                  <td>'.$rs["postCode"].'</td>
              </tr>
          </tbody>
      </table>
      <br>
      
      <a href="userUpdate.php"><button class="logReg" type="submit" name="">Update Details</button></a>' ;
      }
}
else { 

    //Store the username and password, use trim() to removing any spaces

    echo '<h2>User Login</h2>
    <p>Please enter your details below to login</p>
            
    <form method="post">
        <div class="form-group">
          <label for="emailbox">Email address</label>
          <input type="email" id="emailbox" name="checkemail" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="passwordbox">Password</label>
          <input type="password" id="passwordbox" name="checkpass" placeholder="Password">
      </div>
    
      <button class="logReg" type="submit" name="checklogin">Submit</button>
    </form>
    <a class="staffLink" href="staff.php">Staff Login</a>';

    if (isset($_POST['checklogin'])) {

        $checkuser = trim($_POST['checkemail']);
        $checkpass = trim($_POST['checkpass']);
        
        $salt ="4g£yc7";
        $checkpass = md5($checkpass.$salt);

        //prepare Database query statement, to find the staff credentials submitted
        $statement=$DB->prepare("SELECT * FROM logins WHERE emailAddress='$checkuser' AND password ='$checkpass'");
        $statement->execute(); //sends the query to the sql database

        //if successful then the database should generate 1 row that matches our login details
        $count =$statement->rowCount();
        if($count==1) {
            $_SESSION["userdb"] = true;
            $_SESSION["userName"] = $checkuser;
            header("refresh:0");
        }
        else {
            echo "<p>Error logging in, please try again...</p>";
        } 
    }   
}
?>

<?php include 'includes/footer.php' ?>