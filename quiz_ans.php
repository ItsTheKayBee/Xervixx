<?php
include 'db_connect.php';
$a_no=$_REQUEST['q'];
$questions="select answer from questions";
$questions_array=$con->query($questions);
if($questions_array->num_rows>0){
    $i=0;
    while($row=$questions_array->fetch_assoc()) {
        $corr_answer = $row['answer'];
        $ans[$i] = $corr_answer;
        $i += 1;
    }
}
echo $ans[$a_no];
?>