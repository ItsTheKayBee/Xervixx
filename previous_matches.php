<?php
include 'db_connect.php';
$matches="SELECT format_id,matches.match_id,matches.start_date,matches.end_date, DATEDIFF(CURRENT_DATE(), `start_date`) as date_diff, TIMESTAMPDIFF(MINUTE, `start_date`,CURRENT_TIME()) as start_time_diff,TIMESTAMPDIFF(MINUTE, `end_date`,CURRENT_TIME()) as end_time_diff FROM matches where TIMESTAMPDIFF(MINUTE, `start_date`, CURRENT_TIME())>0 and TIMESTAMPDIFF(MINUTE, `end_date`, CURRENT_TIME())<5760 ";
$user_lb_validation='select * from leaderboard where user_id='.$user_id.' and match_id=';
$match_result=$con->query($matches."order by start_date desc");
if ($match_result->num_rows > 0) {
    while($row = $match_result->fetch_assoc()) {
        $start_time_diff = $row['start_time_diff'];
        $date_diff = $row['date_diff'];
        $end_time_diff = $row['end_time_diff'];
        $match_date = date_create($row['start_date']);
        $matchFormat = $row['match_id'];
        $format_id=$row['format_id'];
        if($format_id==1){
            $format_match='T20';
        }else if($format_id==2){
            $format_match='ODI';
        }else{
            $format_match='TEST';
        }
        $user_play_validation = $con->query($user_lb_validation . $matchFormat);
        if ($user_play_validation->num_rows == 1) {
            $play = 1;
        } else {
            $play = 0;
        }
        if($play==1){
            if ($date_diff < 0) {
                $date_diff = str_replace('-', '', $date_diff);
                $match_date = date_format($match_date, 'H:ia');
                echo '<div class="match">';
                echo '<span class="format">'.$format_match.'</span>';
                echo '<div class="'.$format_match.'-img"></div>';
                echo '<span class="live">PLAYING</span>';
                echo '<span class="time-left">' . $date_diff . ' days left</span>';
                echo '</div>';
            } else if ($date_diff == 0) {
                if ($start_time_diff < 0) {
                    $match_date = date_format($match_date, 'H:iA');
                    $start_time_diff = str_replace('-', '', $start_time_diff);
                    $hours = intdiv($start_time_diff, 60) . ' hours ' . ($start_time_diff % 60) . " minutes";
                    echo '<div class="match">';
                    echo '<span class="format">'.$format_match.'</span>';
                    echo '<div class="'.$format_match.'-img"></div>';
                    echo '<span class="live">PLAYING</span>';
                    echo '<span class="time-left">' . $hours . ' left</span>';
                    echo '</div>';
                } else if ($start_time_diff > 0 && $end_time_diff < 0) {
                    $end_time_diff = str_replace('-', '', $end_time_diff);
                    if(intdiv($end_time_diff, 1440)>=1){
                        $hours = intdiv($end_time_diff, 1440) . ' days ' . (intdiv($end_time_diff, 60) % 24) . ' hours ' . ($end_time_diff % 60) . " minutes";
                    }else if((intdiv($end_time_diff, 60) % 24)>=1){
                        $hours = (intdiv($end_time_diff, 60) % 24) . ' hours ' . ($end_time_diff % 60) . " minutes";
                    }else{
                        $hours = ($end_time_diff % 60) . " minutes";
                    }
                    echo '<div class="match">';
                    echo '<span class="format">'.$format_match.'</span>';
                    echo '<div class="'.$format_match.'-img"></div>';
                    echo '<span class="live">LIVE</span>';
                    echo '<span class="results-time">' . $hours . ' left</span>';
                    echo '<button class="playing">PLAYING</button></div>';
                } else {
                    $match_date = date_format($match_date, 'd-m-Y');
                    echo '<div class="match">';
                    echo '<span class="format">'.$format_match.'</span>';
                    echo '<div class="'.$format_match.'-img"></div>';
                    echo '<span class="match-date">' . $match_date . '</span>';
                    echo '<span class="play-status">PLAYED</span>';
                    echo '<button class="btn" onclick="showLB('.$matchFormat.')">LEADERBOARD</button></div>';
                }
            } else {
                if ($start_time_diff > 0 && $end_time_diff < 0) {
                    $end_time_diff = str_replace('-', '', $end_time_diff);
                    if(intdiv($end_time_diff, 1440)>=1){
                        $hours = intdiv($end_time_diff, 1440) . ' days ' . (intdiv($end_time_diff, 60) % 24) . ' hours ' . ($end_time_diff % 60) . " minutes";
                    }else if((intdiv($end_time_diff, 60) % 24)>=1){
                        $hours = (intdiv($end_time_diff, 60) % 24) . ' hours ' . ($end_time_diff % 60) . " minutes";
                    }else{
                        $hours = ($end_time_diff % 60) . " minutes";
                    }
                    echo '<div class="match">';
                    echo '<span class="format">'.$format_match.'</span>';
                    echo '<div class="'.$format_match.'-img"></div>';
                    echo '<span class="live">LIVE</span>';
                    echo '<span class="results-time">' . ($hours) . ' left</span>';
                    echo '<button class="playing">PLAYING</button></div>';
                } else {
                    $match_date = date_format($match_date, 'd-m-Y');
                    echo '<div class="match">';
                    echo '<span class="format">'.$format_match.'</span>';
                    echo '<div class="'.$format_match.'-img"></div>';
                    echo '<span class="match-date">' . $match_date . '</span>';
                    echo '<span class="play-status">PLAYED</span>';
                    echo '<button class="btn" onclick="showLB('.$matchFormat.')">LEADERBOARD</button></div>';
                }
            }
        }
    }
} else {
    echo '<div class="no_match">'."No matches available!".' <i class="fa fa-frown-o"></i>';
}
$con->close();
?>
