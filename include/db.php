<!-- database -->
<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "cms";

$connection = mysqli_connect($serverName, $userName, $password, $dbName);

//check connection
// if ($connection) {
//     // connect success
//     echo "Connected";
// }

?>