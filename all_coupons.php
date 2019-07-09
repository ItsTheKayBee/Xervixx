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

        echo '<div class="coupon">
                    <div class="container" style="background-color:gainsboro">
                        <h2><b>'.$title.'</b></h2>
                        <p>'.$description.'</p>
                    </div>
                    <div class="container">
                        <p>Use Promo Code: <span class="promo">'.$code.'</span></p>
                        <span class="expire">Expires: '.$expiry.'</span>
                        <button class="btns buy-btn">Buy Now<br>'.$price.'<span class="fa fa-btc" style="color: gold"></span></button>
                    </div>
                </div>';
    }
}
$con->close();







