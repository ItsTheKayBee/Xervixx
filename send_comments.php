<?php
$comment_post=explode(',',$_REQUEST['q']);
$comment=$comment_post[0];
$post_id=$comment_post[1];
include 'db_connect.php';
$comment_insert='insert into post(post_id,comment,user_id) values('.$post_id.',"'.$comment.'",'.$user_id.')';
if($con->query($comment_insert)===true){
    echo 'comment added';
}
$con->close();