<?php
include 'db_connect.php';
$user_sql="select * from user where user_id=".$user_id;
$user_res=$con->query($user_sql);
if($row=$user_res->fetch_assoc()){
    $username=$row['username'];
    $name=$row['name'];
    $xp=$row['xp'];
    $x_money=$row['x_money'];
    $level=(int)($xp/100);
    $prof=$row['dp'];
    if($prof==''){
        $prof='dp\default';
    }
}
$sc_sql='select * from leaderboard where user_id='.$user_id;
$q_sql='select * from quiz_lb where user_id='.$user_id;
$sc_res=$con->query($sc_sql);
$q_res=$con->query($q_sql);
$matches_played=$sc_res->num_rows;
$quiz_attempted=$q_res->num_rows;

$show_lb="select user_id,xp from user order by xp DESC";
$lb_results=$con->query($show_lb);
if($lb_results->num_rows>0){
    $count=0;
    while ($row=$lb_results->fetch_assoc()) {
        $count += 1;
        if ($user_id == $row['user_id']) {
            $rank = $count;
        }
    }
}
echo '<div class="global-rank col">
        <span class="rank">'.$rank.'</span><br>
        <span>GLOBAL RANK</span>
    </div>
    <div class="col profile"><img alt="display" src="'.$prof.'.png" class="profile-pic"><br>
        <span>'.$name.'</span><br>
        @<span>'.$username.'</span><br>
    </div>
    <div class="matches-played col">
        <b>Matches Played: </b><span>'.$matches_played.'</span><br>
        <b>Quizzes Attempted: </b><span>'.$quiz_attempted.'</span><br>
        <b>Fincoins Won: </b><span>'.$x_money.'</span><br>
        <b>XP: </b><span>'.$xp.'</span><br>
        <b>Level: </b><span>'.$level.'</span><br>
    </div>';
