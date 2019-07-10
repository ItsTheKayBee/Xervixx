<?php
include 'db_connect.php';
$show_lb="select user_id,name,username,x_money,xp from user order by xp DESC";
$lb_results=$con->query($show_lb);
if($lb_results->num_rows>0){
    $count=0;
    echo "<tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>x-money won</th>
                    <th>xp</th>
                    <th>level</th>
                </tr>";
    while ($row=$lb_results->fetch_assoc()){
        $current='';
        $color='';
        if($user_id==$row['user_id']){
            $current='current';
            $color='green';
        }
        $name=$row['name'];
        $username=$row['username'];
        $xp=$row['xp'];
        $x_money=$row['x_money'];
        $count+=1;
        $level=(int)($xp/100);
        echo "<tr style='background-color:".$color."' class='".$current."'>
                        <td>".$count."</td>
                        <td>".$name."</td>
                        <td>".$username."</td>
                        <td>".$x_money."</td>
                        <td>".$xp."</td>
                        <td>".$level."</td></tr>";
    }
}
$con->close();
?>