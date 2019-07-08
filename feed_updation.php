<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xervixx";
    $con = new mysqli($servername,$username,$password,$dbname);
    $image_path_retrieval_query="select * from feed";
    if ($con->connect_error)
    {
        die('No connection: ' . $con->connect_error);
    }
    $path_result=$con->query($image_path_retrieval_query);
    if ($path_result->num_rows > 0) {
        while($row = $path_result->fetch_assoc()) {
            $image=$row['img_src'];
            $tag=$row['category'];
            $title=$row['title'];
            $caption=$row['caption'];
            echo "<div class='column ".$tag."'>";
            echo "<div class='content'>";
            echo "<img src='".$image."' style='width:100%'>";
            echo "<div><i class='fas fa-smile'></i>";
            echo "<i class='fas fa-frown'></i>";
            echo "<i class='fas fa-comment'></i></div>";
            echo "<h4>".$title."</h4>";
            echo "<p>".$caption."</p>";
            echo "</div></div>";
        }
    } else {
        echo "Your feed is empty";
    }
    $con->close();
?>
