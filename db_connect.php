<?php

$host="localhost";
$user="root";
$password="";
$db="xervixx";

$con=mysqli_connect($host,$user,$password);
if($con)
{
    echo "";
}
else
{
    die("Connection failed".mysqli_connect_error());
}
mysqli_select_db($con,$db);

?>