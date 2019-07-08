<?php
include 'db_connect.php';
$user_id=$_SESSION['user_id'];
$credit_sql='select credit_score from user where user_id='.$user_id;
$credit_res=$con->query($credit_sql);
if($row=$credit_res->fetch_assoc()){
    $credit_score=$row['credit_score'];
    $credit_percent=($credit_score-300)*100/600;
    $credit_angle=360*$credit_percent/100;
    if($credit_angle>180){
        $left=$credit_angle-180;
        $right=180;
    }else{
        $left=0;
        $right=$credit_angle;
    }
    $color='';
    if($credit_score>=300 && $credit_score<550){
        $color='red';
    }else if($credit_score>=500 && $credit_score<650){
        $color='orange';
    }else if($credit_score>=650 && $credit_score<750){
        $color='lime';
    }else if($credit_score>=750 && $credit_score<=900){
        $color='green';
    }
    echo '<div class="row" style="width: 300px;">
                  <div class="col-md-3 col-sm-6">
                      <div class="progress blue">
                          <span class="progress-right">
                              <span class="progress-bar" style="border-color:'.$color.';transform:rotate('.$right.'deg);"></span>
                          </span>
                          <span class="progress-left">
                              <span class="progress-bar" style="border-color:'.$color.';transform:rotate(-'.$left.'deg);"></span>
                          </span>
                               <div class="progress-value" style="font-size: 15px">Credit Score: '.$credit_score.'</div>
                          </div>
                      </div>
                  </div>';
}
$con->close();
