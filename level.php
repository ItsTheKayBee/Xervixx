<?php
include 'db_connect.php';
$level_sql="select xp from user where user_id=".$user_id;
$level_res=$con->query($level_sql);
if($row=$level_res->fetch_assoc()){
        $xp=$row['xp'];
        $level=(int)($xp/100);
        $level_extra=(($xp/100)-(int)($xp/100))*100;
        if($level_extra==0){
            $level_extra=1;
        }
        $angle_level=360*$level_extra/100;
        if($angle_level>180){
            $left=$angle_level-180;
            $right=180;
        }else{
            $left=0;
            $right=$angle_level;
        }
        $color='';
        if($level_extra>0 && $level_extra<10){
            $color='red';
        }else if($level_extra>=10 && $level_extra<30){
            $color='orange';
        }else if($level_extra>=30 && $level_extra<70){
            $color='deepskyblue';
        }else if($level_extra>=70 && $level_extra<90){
            $color='lime';
        }else if($level_extra>=90 && $level_extra<=100){
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
                               <div class="progress-value">Level '.$level.'</div>
                          </div>
                      </div>
                  </div>';
}
$con->close();
