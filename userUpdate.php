<?php include 'includes/header.php' ?>

<?php

include 'includes/connect.php'; ?>

<h2>Update your Details</h2>

<form class="form-group" method="post">

<div class="form-group">
<label for="firstname">First Name:</label>
<input type="text" name="firstname">
<button class="#" type="submit" name="fname">Update</button>
</div>

<div class="form-group">
<label for="lastname">Last Name:</label>
<input type="text" name="lastName">
<button class="#" type="submit" name="lname">Update</button>
</div>

<div class="form-group">
<label for="houseNum">House Number:</label>
<input type="text" name="houseNum">
<button class="#" type="submit" name="hNum">Update</button>
</div>

<div class="form-group">
<label for="street">Street:</label>
<input type="text" name="street">
<button class="#" type="submit" name="streetButton">Update</button>
</div>

<div class="form-group">
<label for="city">City:</label>
<input type="text" name="city">
<button class="#" type="submit" name="cityButton">Update</button>
</div>

<div class="form-group">
<label for="postcode">Post Code:</label>
<input type="text" name="postcode">
<button class="#" type="submit" name="postcodeButton">Update</button>
</div>
</form>

<?php 

$user = $_SESSION["userName"];

if (isset($_POST['fname']))
{
    $fname = $_POST["firstname"];
    $statement=$DB->prepare("UPDATE users SET firstName = '$fname' WHERE emailAddress='$user';");
    $statement->execute();
}
if (isset($_POST['lname']))
{
    $lname = $_POST["lastName"];
    $statement=$DB->prepare("UPDATE users SET lastName = '$lname' WHERE emailAddress='$user';");
    $statement->execute();
}
if (isset($_POST['hNum']))
{
    $house = $_POST["houseNum"];
    $statement=$DB->prepare("UPDATE users SET houseNumber = '$house' WHERE emailAddress='$user';");
    $statement->execute();
}
if (isset($_POST['streetButton']))
{
    $street = $_POST["street"];
    $statement=$DB->prepare("UPDATE users SET street = '$street' WHERE emailAddress='$user';");
    $statement->execute();
}
if (isset($_POST['cityButton']))
{
    $city = $_POST["city"];
    $statement=$DB->prepare("UPDATE users SET city = '$city' WHERE emailAddress='$user';");
    $statement->execute();
}
if (isset($_POST['postcodeButton']))
{
    $pcode = $_POST["postcode"];
    $statement=$DB->prepare("UPDATE users SET postCode = '$pcode' WHERE emailAddress='$user';");
    $statement->execute();
}
    

?>

<?php include 'includes/footer.php' ?>