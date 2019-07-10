<?php
include 'db_connect.php';
$post_id=$_REQUEST['q'];
$posts_sql="SELECT * FROM `feed` inner join post on post.post_id=feed.id where post.post_id=".$post_id;
$comment_res=$con->query($posts_sql);
if($comment_res->num_rows>0){
    echo "<p style='text-align: left'>";
    while($com=$comment_res->fetch_assoc()){
        $comment=$com['comment'];
        $user_id=$com['user_id'];
        $user_sql="select username from user where user_id=".$user_id;
        $user_res=$con->query($user_sql);
        if($row=$user_res->fetch_assoc()){
            $username=$row['username'];
        }
        echo "<b>".$username.": </b>";
        echo "<i>".$comment."</i><br>";
    }
    echo "</p>";
}else
    echo 'No comments found for this post.<br>Add yours.';