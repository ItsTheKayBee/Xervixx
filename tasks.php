<?php
include 'db_connect.php';
$tasks_sql="select * from tasks inner join user_tasks on tasks.tasks_id=user_tasks.task_id where user_id=".$user_id;
$tasks_res=$con->query($tasks_sql);
if($tasks_res->num_rows>0){
    $count=0;
    while ($row=$tasks_res->fetch_assoc()){
        if($row['task_done']==0 && $count<2){
            $count+=1;
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
}else{
    $task_retrieval_query="SELECT tasks_id from tasks where tasks_id not in (SELECT task_id FROM user_tasks where user_id=".$user_id.")";
    $no_of_tasks=$con->query($task_retrieval_query);
    if($no_of_tasks->num_rows>0){
        $count=0;
        while ($row=$no_of_tasks->fetch_assoc()){
            if($count<2) {
                $count += 1;
                $task_id = $row['tasks_id'];
                $task_insertion_sql = "insert into user_tasks(task_id,user_id) values (" . $task_id . "," . $user_id . ")";
                if ($con->query($task_insertion_sql) === true) {
                    $tasks_sql = "select * from tasks inner join user_tasks on tasks.tasks_id=user_tasks.task_id where user_id=" . $user_id." and task_id=".$task_id;
                    $tasks_res = $con->query($tasks_sql);
                    $row = $tasks_res->fetch_assoc();
                    $task_name = $row['task'];
                    $tot_levels = $row['levels'];
                    $levels_comp = $row['levels_completed'];
                    $task_done = $row['task_done'];
                    echo '<div class="daily-task-div"><div class="ptrack">
                  <div class="progress-bar pbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0;">
                  <i class="fas fa-fire" style="color:orange;float: right;font-size: 25px;margin:-4px -11px 0 0;"></i>
                  </div></div>
                  <dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>' . $task_name . '</dt><i style="float: right;margin-top: -20px">' . $levels_comp . '/' . $tot_levels . '</i></div>';
                }
            }
        }
    }


}
$con->close();