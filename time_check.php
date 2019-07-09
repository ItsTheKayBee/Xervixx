<?php
$match_details =explode(',',$_REQUEST["q"]);
$match_format=$match_details[0];
$match_id=$match_details[1];
include 'db_connect.php';
if($match_format==='t20'){
    $match="1";
}
else if($match_format==='odi'){
    $match="2";
}
else{
    $match="3";
}
$matches="SELECT match_id FROM matches where format_id=". $match." and TIMESTAMPDIFF(SECOND, `start_date`, CURRENT_TIME())>0 and match_id=".$match_id;
$match_result=$con->query($matches);
if($match_result->num_rows>0){
    echo "stop";
}else{
    echo "play";
}