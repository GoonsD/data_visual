<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'12345678');
define('DB_NAME', 'glory');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to Database: " . mysqli_connect_error();
}
?>