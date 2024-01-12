<?php
 include 'includes/header.php';
?>


<?php
session_unset();

session_destroy();
?>

<h2>Log Out</h2>
<p>You have successfully logged out!!</p>

<?php
header("refresh:1, login.php");
include 'includes/footer.php';
?>