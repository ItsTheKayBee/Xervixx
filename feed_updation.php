<?php
include 'db_connect.php';
$image_path_retrieval_query="select * from feed";
$path_result=$con->query($image_path_retrieval_query);
    if ($path_result->num_rows > 0) {
        while($row = $path_result->fetch_assoc()) {
            $image=$row['image'];
            $tag=$row['category'];
            $title=$row['title'];
            $caption=$row['caption'];
            $likes=$row['likes'];
            $post_id=$row['id'];
            $c_user_sql="select user_id from post where post_id=".$post_id;
            $c_user_res=$con->query($c_user_sql);
            if($cuser=$c_user_res->fetch_assoc()){
                $comment_user_id=$cuser['user_id'];
            }
            $user_sql="select username from user where user_id=".$comment_user_id;
            $user_res=$con->query($user_sql);
            if($row=$user_res->fetch_assoc()){
                $username=$row['username'].": ";
            }
            $posts_sql="SELECT * FROM `feed` inner join post on post.post_id=feed.id where post.post_id=".$post_id;
            $comment_res=$con->query($posts_sql);
            $comment_count=$comment_res->num_rows;
            $like_sql="select * from likes where user_id=".$user_id." and post_id=".$post_id;
            $like_result=$con->query($like_sql);
            $user_like=$like_result->num_rows;
            if($user_like){
                $color='#0e0e92';
            }else{
                $color='dimgrey';
            }
            if($comment_count==0){
                $comment_count='No comments';
            }elseif($comment_count==1){
                $comment_count='View comment';
            }else{
                $comment_count="View all ".$comment_count." comments";
            }
            echo "<div class='column ".$tag."'>";
            echo "<div class='content'>";
            echo "<h4 class='title'>".$title."</h4>";
            echo "<img src='".$image."' style='width:100%'>";
            echo "<div class='post-info-container' style='font-weight: bolder;'>".$likes." <i onclick='addLike(this,".$post_id.")'style='color:".$color.";'class='fas fa-smile'></i>&nbsp;&nbsp;";
            echo "</div>";
            echo "<p class='caption'>".$caption."</p>";
            echo "<span class='view-comments' onclick='openComments(".$post_id.")'>".$comment_count."</span><div class='top-comments'>";
            if($comment_res->num_rows>0){
                $com=$comment_res->fetch_assoc();
                $top_comments=$com['comment'];
            }else{
                $username='';
                $top_comments='';
            }
            echo "<b>".$username." </b>";
            echo "<span>".$top_comments."</span><br>";
            echo "</div><input type='text' class='comment-inp' placeholder='Type a comment...'>";
            echo "<i class='fas fa-arrow-circle-right' onclick='sendComment(this,".$post_id.")'></i>";
            echo "</div></div>";
        }
    }
?>
