<?php
include 'db_connect.php';
$coupon_sql="select * from coupons where coupon_id not in (SELECT coupons_purchased.coupon_id from coupons inner join coupons_purchased on coupons.coupon_id=coupons_purchased.coupon_id where coupons_purchased.user_id=".$user_id.")";
$coupon_res=$con->query($coupon_sql);
if($coupon_res->num_rows>0){
    while ($row=$coupon_res->fetch_assoc()){
        $title=$row['text'];
        $description=$row['description'];
        $code=$row['code'];
        $expiry=date_create($row['expiry_date']);
        $expiry=date_format($expiry,'d-m-Y');
        $price=$row['price'];

        echo '<div id="coupon_purchase">
                    <div class="container" style="background-color:#b4bbec">
                        <h2><b>'.$title.'</b></h2>
                        <p>'.$description.'</p>
                    </div>
                    <div class="container">
                        <p style="font-weight: bolder;font-size: 18px;">USE PROMO CODE : <span id="promo_code">'.$code.'</span></p>
                        <span class="expire">EXPIRES ON : '.$expiry.'</span>
                        <button id="purchase-btn">BUY NOW<br>'.$price.' <span class="fas fa-coins" style="color: gold"></span></button>
                    </div>
                </div>';
    }
}
$con->close();







