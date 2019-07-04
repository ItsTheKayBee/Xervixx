<?php
include 'db_connect.php';
$user_id=1;
$score=$_REQUEST['q'];
if($score==1){
    $money_won=10;
}else if($score==2){
    $money_won=20;
}else if($score==3){
    $money_won=30;
}else{
    $money_won=0;
}
$quiz_sql="select quiz_id from quiz where CURRENT_DATE=quiz.quiz_date";
$quiz_res=$con->query($quiz_sql);
$quiz_results=$quiz_res->fetch_assoc();
$quiz_id=$quiz_results['quiz_id'];
$user_lb_validation='select * from quiz_lb where user_id='.$user_id.' and quiz_id='.$quiz_id;
$user_lb_result=$con->query($user_lb_validation);
if($user_lb_result->num_rows==0){
    $quiz_attempt="INSERT INTO `quiz_lb` (`quiz_id`, `user_id`, `attempted`, `score`, `money_won`) VALUES (".$quiz_id.", ".$user_id.", '1',".$score.",".$money_won.")";
    if($con->query($quiz_attempt)===true){
    }
    else
    {
        echo "quiz updation error";
    }
    $x_money_query="select x_money from user where user_id=".$user_id;
    $x_money_results=$con->query($x_money_query);
    $user_money=$x_money_results->fetch_assoc();
    $x_money=$user_money['x_money'];
    $x_money=$x_money+$money_won;
    $money_user_update="update user set x_money=".$x_money." where user_id=".$user_id;
    if ($con->query($money_user_update) === true) {
    } else {
        echo "x-money update error";
    }
}
else{
    echo "you have played already. come back later";
}

