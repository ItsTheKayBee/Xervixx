<?php
include 'db_connect.php';
$user_sql="select * from user where user_id=".$user_id;
$user_res=$con->query($user_sql);
if($row=$user_res->fetch_assoc()){
    $username=$row['username'];
    $prof=$row['dp'];
    if($prof==''){
        $prof='dp\default';
    }
}
echo '<div class="profile-div"><img alt="display" src="'.$prof.'.png" class="profile-dp">
        @<span>'.$username.'</span><br>
    </div>';