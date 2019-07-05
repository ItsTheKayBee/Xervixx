<?php
session_start();
?>
<?php
include 'db_connect.php';
$a_no=explode(',',$_REQUEST['q']);
$q_no=$a_no[0];
$ans=$a_no[1];
$questions="select answer from questions";
$questions_array=$con->query($questions);
if($questions_array->num_rows>0){
    $i=0;
    while($row=$questions_array->fetch_assoc()) {
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