<?php
include 'db_connect.php';
$a_no=explode(',',$_REQUEST['q']);
$q_no=number_format($a_no[0]);
$q_no+=1;
$ans=$a_no[1];
$quiz_id=$_SESSION['quiz_id'];
$questions="select answer from questions where quiz_id=".$quiz_id." and questn_no=".$q_no;
$questions_selected=$con->query($questions);
if($questions_selected->num_rows>0){
    $i=0;
    while($row=$questions_selected->fetch_assoc()) {
        $corr_answer = $row['answer'];
        if($ans==$corr_answer){
            $_SESSION['score']+=1;
            echo 1;
        }else{
            echo 0;
        }
        $i += 1;
    }
}
?>