<?php

include 'db_connect.php';
$get_questions_query='SELECT * FROM quiz';
$get_questions_result=mysqli_query($con,$get_questions_query);
if(mysqli_num_rows($get_questions_result)>0){
    while($row=mysqli_fetch_assoc($get_questions_result)){

    }
}
?>