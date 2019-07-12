<?php
    include 'db_connect.php';
    $lb_update_query="select match_id from matches where results_declared=0 and TIMESTAMPDIFF(MINUTE, end_date,CURRENT_TIME)>0";
    $lb_update_results=$con->query($lb_update_query);
    if($lb_update_results->num_rows>0){
        while ($row=$lb_update_results->fetch_assoc()){
            $match_id=$row['match_id'];
            update_script($match_id,$con);
        }
    }
    function update_script($match_id,$con){
        $match_select = "select * from leaderboard where match_id=".$match_id;
        $match_results=$con->query($match_select);
        if ($match_results->num_rows > 0) {
            while ($row = $match_results->fetch_assoc()) {
                $user_team = $row['team'];
                $user_id = $row['user_id'];
                $user_team = explode(',', $user_team);
                $score=price_calc($con, $user_team);
                $score_update = "update leaderboard set score=" . $score . " where user_id=" . $user_id . " and match_id=" . $match_id;
                if ($con->query($score_update) === true) {
                } else {
                    echo "score error";
                }
            }
        }
        $updated_LB="select user_id,score,matches.format_id from leaderboard inner join matches on leaderboard.match_id=matches.match_id where leaderboard.match_id=".$match_id." order by score desc";
        $ranking=$con->query($updated_LB);
        $count_query="select count(user_id) as no_of_players from leaderboard where match_id=".$match_id;
        $count_results=$con->query($count_query);
        $no_of_players=$count_results->fetch_assoc();
        $total_players=$no_of_players['no_of_players'];
        if ($ranking->num_rows > 0) {
            $count=0;
            while ($row = $ranking->fetch_assoc()) {
                $count+=1;
                $user_id=$row['user_id'];
                $format_id=$row['format_id'];
                $score=$row['score'];
                $money_won=money_calc($count,$total_players,$format_id,$score);
                $money_update="update leaderboard set money_won=".$money_won." where user_id=".$user_id." and match_id=".$match_id;
                if ($con->query($money_update) === true) {
                } else {
                    echo "money error";
                }
                $x_money_query="select x_money,xp from user where user_id=".$user_id;
                $x_money_results=$con->query($x_money_query);
                $user_money=$x_money_results->fetch_assoc();
                $x_money=$user_money['x_money'];
                $xp=$user_money['xp']+$money_won;
                $x_money=$x_money+$money_won;
                $money_user_update="update user set x_money=".$x_money.",xp=".$xp." where user_id=".$user_id;
                if ($con->query($money_user_update) === true) {
                } else {
                    echo "fincoin update error";
                }
            }
        }
        $results_declared="update matches set results_declared=1 where match_id=".$match_id;
        if ($con->query($results_declared) === true) {
        } else {
            echo "match results error";
        }
    }
    function price_calc($con, $user_team)
    {
        $score = 0;
        for ($i = 0; $i < 5; $i++) {
            $stocks_query = 'select * from stocks where symbol="'.$user_team[$i].'"';
            $stocks_result = $con->query($stocks_query);
            $val = $stocks_result->fetch_assoc();
            $price_change = $val['price_change'];
            if ($i === 0) {
                $score = 2 * $price_change;
            } else {
                $score = $score + $price_change;
            }
        }
        return $score;
    }
    function money_calc($rank,$total_players,$format_id,$score){
        $money_won=0;
        $position=$rank / $total_players;
        if($score>0) {
            if ($format_id == 1) {
                if ($rank == 1) {
                    $money_won = 60;
                } else if ($rank == 2) {
                    $money_won =57;
                } else if ($rank == 3) {
                    $money_won =55;
                }else if($position<=0.1){
                    $money_won=50;
                }else if($position<=0.2 && $position>0.1){
                    $money_won=45;
                }else if($position>0.2 && $position<=0.3){
                    $money_won=40;
                }else if($position>0.3 && $position<=0.4){
                    $money_won=35;
                }else if($position>0.4 && $position<=0.5){
                    $money_won=30;
                }
            } else if ($format_id == 2) {
                if ($rank == 1) {
                    $money_won = 100;
                } else if ($rank == 2) {
                    $money_won =90;
                } else if ($rank == 3) {
                    $money_won =80;
                }else if($position<=0.1){
                    $money_won=60;
                }else if($position<=0.2 && $position>0.1){
                    $money_won=55;
                }else if($position>0.2 && $position<=0.3){
                    $money_won=50;
                }else if($position>0.3 && $position<=0.4){
                    $money_won=45;
                }else if($position>0.4 && $position<=0.5){
                    $money_won=40;
                }
            } else {
                if ($rank == 1) {
                    $money_won = 200;
                } else if ($rank == 2) {
                    $money_won =175;
                } else if ($rank == 3) {
                    $money_won =150;
                }else if($position<=0.1){
                    $money_won=125;
                }else if($position<=0.2 && $position>0.1){
                    $money_won=100;
                }else if($position>0.2 && $position<=0.3){
                    $money_won=75;
                }else if($position>0.3 && $position<=0.4){
                    $money_won=60;
                }else if($position>0.4 && $position<=0.5){
                    $money_won=50;
                }
            }
        }
        return $money_won;
    }
    $con->close();
    ?>