<?php
include 'db_connect.php';
$code_sql="SELECT referral_code FROM user where user_id=".$user_id;
$code_res=$con->query($code_sql);
if($com=$code_res->fetch_assoc()){
    $code=$com['referral_code'];
    echo "<b><i style='background-color: #8178c7;color: white;padding: 2px 10px;'>".$code."</i></b>";
}
