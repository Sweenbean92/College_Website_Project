<?php
//Set variables for the Server Name / Address, Database Name and Username & Password details.
$my_host = "localhost";
$my_db = 'bikeking';  //change to match your DB
$my_db_username = "root";
$my_db_passwd = "";

try {
    //PHP Data Objects. PDO is a lean, consistent way to access databases
	$DB = new PDO("mysql:host=$my_host;dbname=$my_db", $my_db_username, $my_db_passwd);

} catch (Exception $ex) {
	echo $ex->getMessage();
}
?>