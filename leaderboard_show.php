<?php
    $match_id = $_REQUEST["q"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xervixx_test";
    $con = new mysqli($servername, $username, $password, $dbname);
    $show_lb="select user.name,user.username,leaderboard.score,leaderboard.money_won from leaderboard inner join user on user.user_id=leaderboard.user_id where leaderboard.match_id=".$match_id. " order by leaderboard.score DESC";
    $lb_results=$con->query($show_lb);
    if ($con->connect_error) {
        die('No connection: ' . $con->connect_error);
    }
    if($lb_results->num_rows>0){
        $count=0;
        echo "<tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Score</th>
                    <th>x-money won</th>
                </tr>";
        while ($row=$lb_results->fetch_assoc()){
            $name=$row['name'];
            $username=$row['username'];
            $score=$row['score'];
            $money_won=$row['money_won'];
            $count+=1;
            echo "<tr>
                        <td>".$count."</td>
                        <td>".$name."</td>
                        <td>".$username."</td>
                        <td>".$score."</td>
                        <td>".$money_won."</td></tr>";
        }
    }else {
        echo "There were no players in this game";
    }
    $con->close();
?>