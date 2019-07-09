<?php
include 'db_connect.php';
$coupon_sql="SELECT * from coupons inner join coupons_purchased on coupons.coupon_id=coupons_purchased.coupon_id where coupons_purchased.user_id=".$user_id;
$coupon_res=$con->query($coupon_sql);
if($coupon_res->num_rows>0){
    while ($row=$coupon_res->fetch_assoc()){
        $title=$row['text'];
        $description=$row['description'];
        $code=$row['code'];
        echo '<div class="coupon">
                    <div class="container" style="background-color:gainsboro">
                        <h2><b>'.$title.'</b></h2>
                        <p>'.$description.'</p>
                    </div>
                    <div class="container">
                        <p>Promo Code: <span class="promo">'.$code.'</span></p>
                        <button class="btns buy-btn">Purchased</button>
                    </div>
                </div>';
    }
}else{
    echo "You don't have any coupons! Use x-money balance to buy some from below.";
}
$con->close();







