<?php
include 'db_connect.php';
$tasks_sql="select * from tasks inner join user_tasks on tasks.tasks_id=user_tasks.task_id where user_id=".$user_id;
$tasks_res=$con->query($tasks_sql);
if($tasks_res->num_rows>0){
    while ($row=$tasks_res->fetch_assoc()){
        $task_name=$row['task'];
        $tot_levels=$row['levels'];
        $levels_comp=$row['levels_completed'];
        $percent_comp=($levels_comp/$tot_levels)*100;
        $task_done=$row['task_done'];
        echo '<div class="daily-task-div"><div class="ptrack">
              <div class="progress-bar pbar" aria-valuenow="'.$percent_comp.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent_comp.'%;">
              <i class="fas fa-fire" style="color:orange;float: right;font-size: 25px;margin:-4px -11px 0 0;"></i>
              </div></div>
              <dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>'.$task_name.'</dt><i style="float: right;margin-top: -20px">'.$levels_comp.'/'.$tot_levels.'</i></div>';
    }
}
$con->close();