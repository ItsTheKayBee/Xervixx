<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xervixx";
$con = new mysqli($servername,$username,$password,$dbname);
if ($con->connect_error)
{
    die('No connection: ' . $con->connect_error);
}
?>