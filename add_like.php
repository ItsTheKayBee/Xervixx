<?php
include 'db_connect.php';
$post_id=$_REQUEST['q'];
$like_sql="select * from likes where user_id=".$user_id." and post_id=".$post_id;
$like_result=$con->query($like_sql);
$tot_likes="select likes from feed where id=".$post_id;
$tot_res=$con->query($tot_likes);
if($row = $tot_res->fetch_assoc()) {
    $likes=$row['likes'];
}
if($like_result->num_rows==0){
    $user_like="insert into likes(post_id,user_id) values(".$post_id.",".$user_id.")";
    if($con->query($user_like)===true){
        $likes+=1;
    }
}
else{
    $user_dislike="delete from likes where user_id=".$user_id." and post_id=".$post_id;
    if($con->query($user_dislike)===true){
        $likes-=1;
    }
}
$like_update='update feed set likes='.$likes.' where id='.$post_id;
if($con->query($like_update)===true){
}
$con->close();