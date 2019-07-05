<?php
    include 'db_connect.php';
    $user_id=1;
    $q_no=$_REQUEST['q'];
    $questions="select * from questions inner join quiz on quiz.quiz_id=questions.quiz_id where CURRENT_DATE=quiz.quiz_date";
    $questions_array=$con->query($questions);
    if($questions_array->num_rows>0){
        $i=0;
        while($row=$questions_array->fetch_assoc()){
            $quiz_id=$row['quiz_id'];
            $question=$row['question'];
            $option1=$row['option1'];
            $option2=$row['option2'];
            $option3=$row['option3'];
            $option4=$row['option4'];
            $all_questions[$i]=array($question,$option1,$option2,$option3,$option4);
            $i+=1;
        }
    }else{
        echo "No quiz present at this moment. come back later.";
    }
    $quiz_attempt_validation="select attempted from quiz_lb where user_id=".$user_id." and quiz_id=".$quiz_id;
    $attempt_res=$con->query($quiz_attempt_validation);
    if($attempt_res->num_rows==0){
        echo '<div id="question">'.$all_questions[$q_no][0].'</div>
                    <div id="choices">
                    <div class="choice" id="A" onclick="checkAnswer(1)">'.$all_questions[$q_no][1].'</div>
                    <div class="choice" id="B" onclick="checkAnswer(2)">'.$all_questions[$q_no][2].'</div>
                    <div class="choice" id="C" onclick="checkAnswer(3)">'.$all_questions[$q_no][3].'</div>
                    <div class="choice" id="D" onclick="checkAnswer(4)">'.$all_questions[$q_no][4].'</div></div>';
    }else{
        echo "You have already given this quiz. Come back later for a new quiz.";
    }
?>