<?php
include 'db_connect.php';
$user_id=$_SESSION['user_id'];
$x_money_sql='select x_money from user where user_id='.$user_id;
$x_money_res=$con->query($x_money_sql);
if($row=$x_money_res->fetch_assoc()) {
    $x_money = $row['x_money'];
    echo 'Your x-money balance is: '.$x_money;
}