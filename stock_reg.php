<?php
session_start();
$user_id=$_SESSION['user_id'];
$reg_details = explode('*',$_REQUEST["q"]);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xervixx_test";
$con = new mysqli($servername,$username,$password,$dbname);
$user_validation='select * from user where user_id=1';
$user_lb_validation='select * from leaderboard where user_id=1 and match_id='.$reg_details[0];
$matches="SELECT TIMESTAMPDIFF(MINUTE, `end_date`,CURRENT_TIME()) as end_time_diff FROM matches where match_id=".$reg_details[0];
$user_lb_result=$con->query($user_lb_validation);
$match_end_time=$con->query($matches);
$format_sql="SELECT format_id from matches where match_id=".$reg_details[0];
$formats=$con->query($format_sql);
$format_res=$formats->fetch_assoc();
$format_id=$format_res['format_id'];
if($format_id==1){
    $pool=30;
}else if($format_id==2){
    $pool=40;
}else{
    $pool=50;
}
if ($con->connect_error)
{
    die('No connection: ' . $con->connect_error);
}
$user_result=$con->query($user_validation);
if ($user_result->num_rows > 0 && $user_lb_result->num_rows==0) {
    $row = $user_result->fetch_assoc();
    $x_money=$row['x_money'];
    $match_details=$match_end_time->fetch_assoc();
    $end_time=$match_details['end_time_diff'];
    $end_time=str_replace('-','',$end_time);
    $end_time=number_format($end_time);
    $end_time=str_replace(',','',$end_time);
    if(intdiv($end_time,1440)>0)
        $hours = intdiv($end_time, 1440).' days '.(intdiv($end_time, 60)%24).' hours '. ($end_time % 60)." minutes";
    else
        $hours = intdiv($end_time, 60).' hours '. ($end_time % 60)." minutes";
    if($x_money>=$pool){
        $x_money=$x_money-$pool;
        $money_update="update user set x_money=".$x_money." where user_id=".$user_id;
        $add_reg="insert into leaderboard(user_id,match_id,team) values(1,".$reg_details[0].",\"".$reg_details[1]."\")";
        if ($con->query($add_reg) === TRUE) {
            if ($con->query($money_update) === TRUE) {
                /*                    echo '<span class="time-left" style="top:20px;left:30px">'.$hours.' left</span>';
                                    echo '<h3 align="center" style="padding-top: 20px;">You have successfully registered for this game!!!</h3>';
                                    echo '<h5 align="center">Please wait till the results are declared!</h5>';
                                    echo '<img src="flower.jpeg">';
                                    echo '<button class="in-active" style="position:fixed;height:50px;bottom: 40px;right: 30px;" onclick="location.replace(\'feed.php\')">Back to Feed</button>';*/
                echo "You have successfully registered for this game";
            }
        }
    }
    else{
        echo "Insufficient balance to play";
    }
}
$con->close();
?>
