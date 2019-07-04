<?php
    $sortOrder = $_REQUEST["q"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xervixx_test";
    $con = new mysqli($servername,$username,$password,$dbname);
    $stock_sort_acc_to_name="select * from stocks";
    $stock_sort_acc_to_price="SELECT * FROM `stocks` ORDER BY `stocks`.`last_price` DESC";
    $stock_sort_acc_to_price_change="SELECT * FROM `stocks` ORDER BY `stocks`.`price_change` DESC";
    if ($con->connect_error)
    {
        die('No connection: ' . $con->connect_error);
    }
    if($sortOrder==='Percentage Change')
        $stocks_result=$con->query($stock_sort_acc_to_price_change);
    else if($sortOrder==='Last Price')
        $stocks_result=$con->query($stock_sort_acc_to_price);
    else
        $stocks_result=$con->query($stock_sort_acc_to_name);

    if ($stocks_result->num_rows > 0) {
        while($row = $stocks_result->fetch_assoc()) {
            $companyName=$row['company_name'];
            $symbol=$row['symbol'];
            $lastPrice=$row['last_price'];
            $priceChange=$row['price_change'];
            echo '<div class="players" onclick="dragElement(this)">';
            echo '<div class="stock-container">';
            echo '<span class="stock-name">'.$companyName.'</span><br>';
            echo '<span class="symbol_name">('.$symbol.')</span></div>';
            echo '<div class="stock-info"><span class="stock-price">&nbsp;Rs.'.$lastPrice.'</span>';
            echo '<span class="stock-change">'.$priceChange.'% &nbsp;<i class="fa fa-caret-up"></i></span>';
            echo '</div></div>';
        }
    } else {
        echo "There are no players available";
    }
    $con->close();
?>
