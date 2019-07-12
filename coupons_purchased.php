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
                    <div class="container" style="background-color:#b9f7c6">
                        <h2 style="font-weight: bolder;"><b>'.$title.'</b></h2>
                        <p>'.$description.'</p>
                    </div>
                    <div class="container">
                        <p style="font-weight: bolder;text-align: center;font-size: 18px;">PROMO CODE : <span id="promo">'.$code.'</span></p>
                        <button id="buy-btn">PURCHASED</button>
                    </div>
                </div>';
    }
}else{
    echo '<div id="no_coupon">You don\'t have any coupons! <i class="fa fa-frown"></i><br><br> Use x-money balance to buy some from below.</div>';
}
$con->close();







