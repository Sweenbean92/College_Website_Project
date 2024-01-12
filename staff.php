<?php include 'includes/header.php' ?>

<?php

include 'includes/connect.php';
$salt = "£astl";
if(isset($_SESSION["staffdb"])) {

    echo '<h2>Change Opening Times</h2>
    <form class="form-group" method="post">

        <label for="day">Day:</label>
        <select name="day">
            <option value="weekDayOpen">Week Day</option>
            <option value="saturdayOpen">Saturday</option>
            <option value="sundayOpen">Sunday</option>
        </select>
            <br><br>

        <label for="open">Opening Time:</label>
        <input type="text" name="open"><br><br>
            
        <input class="logReg" type="submit" name="button2" value="Insert"/>
         
    </form>
    
    <hr>
    
    <h2>Change Closing Times</h2>
    <form class="form-group" method="post">

        <label for="day1">Day:</label>
        <select name="day1">
            <option value="weekDayClose">Week Day</option>
            <option value="saturdayClose">Saturday</option>
            <option value="sundayClose">Sunday</option>
        </select>
            <br><br>

        <label for="close">Closing Time Time:</label>
        <input type="text" name="close"><br><br>
            
        <input class="logReg" type="submit" name="button3" value="Insert"/>
         
    </form>
    
    <hr>';

    $statement = $DB->prepare("SELECT * FROM products");
    $statement->execute();

    $result = $statement->fetchAll();

    if($result){
        echo '<h2>Change Prices</h2>
        <form class="form-group" method="post">

        <label for="day1">Product Name:</label>
        <select name="products">';

        foreach ($result as $rs) {
            echo '
                <option value="'.$rs["productName"].'">'.$rs["productName"].'</option>';
        }

        echo '</select>
        <br><br>

        <label for="price">Change Price:</label>
        <input type="number" name="price" value="0" step="0.01"><br><br>
    
        <input class="logReg" type="submit" name="button5" value="Insert"/>
 
        </form>
        
        <hr>';
    
    }

    if(isset($_POST['button5'])) {

        $product = $_POST["products"];
        $price = $_POST["price"];

        $statement=$DB->prepare("UPDATE products SET price = '$price' WHERE productName = '$product'");
        $statement->execute();
    }

    $statement = $DB->prepare("SELECT * FROM logins");
    $statement->execute();

    $result = $statement->fetchAll();

    if($result){
        echo '<h2>Delete Users</h2>
        <form class="form-group" method="post">

        <label for="day1">User:</label>
        <select name="username">';

        foreach ($result as $rs) {
            echo '
                <option value="'.$rs["emailAddress"].'">'.$rs["emailAddress"].'</option>';
        }

        echo '</select>
        <br><br>

        <input class="logReg" type="submit" name="button6" value="Delete"/>
 
        </form>
        ';

        if (isset($_POST['button6'])) {

            $user = $_POST["username"];

            $statement=$DB->prepare("DELETE FROM logins WHERE emailAddress = '$user';");
            $statement->execute();
        }

    }
}
else { 

    //Store the username and password, use trim() to removing any spaces

    echo '<h2>Staff Login</h2>
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
    </form>';

    if (isset($_POST['checklogin'])) {

        $salt = "£astl";
        $checkuser = trim($_POST['checkemail']);
        $checkpass = trim($_POST['checkpass']);
        $checkpass = md5($checkpass.$salt);

        //prepare Database query statement, to find the staff credentials submitted
        $statement=$DB->prepare("SELECT * FROM staff WHERE staffEmail='$checkuser' AND staffPass ='$checkpass'");
        $statement->execute(); //sends the query to the sql database

        //if successful then the database should generate 1 row that matches our login details
        $count =$statement->rowCount();
        if($count==1) {
            echo "<h2>Log in successful</h2>";
            $_SESSION["staffdb"] = true;
            header("refresh:0");
        }
        else {
            echo "<p>Error logging in, please try again...</p>";
        } 
    }   
}

if(isset($_POST['button2'])) {

    $day = $_POST["day"];
    $open = $_POST["open"];
    
    $statement=$DB->prepare("UPDATE company SET $day = '$open';");
    $statement->execute();

$statement->execute();

}

if(isset($_POST['button3'])) {

    $day1 = $_POST["day1"];
    $close = $_POST["close"];
    
    $statement=$DB->prepare("UPDATE company SET $day1 = '$close';");
    $statement->execute();

$statement->execute();

}

?>

<?php include 'includes/footer.php' ?>