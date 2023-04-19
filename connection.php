
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'projectify';

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) 
{
    die("Failed to coneect!");
}

?>