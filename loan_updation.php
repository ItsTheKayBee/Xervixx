<style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</style>
<?php
    include 'db_connect.php';
    $loan_taken=$_SESSION['loan_taken'];
    $user_query="select * from user where user_id=".$user_id;
    $user_res=$con->query($user_query);
    if($loan_taken==1){
        echo '<div class="steps">
                    <p id="tag_emi"><i>WANT TO INCREASE YOUR CREDIT SCORE ?</i></p>
                    <div id="steps_container">
                        <div class="steps_div"><p class="steps_content">1. PAY YOUR EMIs BEFORE THE DUE DATE</p></div>
                        <div class="steps_div"><p class="steps_content">2. EARN STARS AND INCREASE YOUR CREDIT SCORE</p></div>
                        <div class="steps_div"><p class="steps_content">3. GET EXCITING CASHBACK OFFERS AND DISCOUNTS</p></div>
                    </div>
                    <p id="emi_pay"><a href="#emi_progress" style="text-decoration: none;"><i>PAY NOW</i></a></p>
                </div>
                <p id="emi_progress">EMI PROGRESS</p><hr>';
/*        echo '<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="emi">
        <h2 class="w3-wide w3-center">EASY MONTHLY INSTALLMENTS- THE GAME</h2>
        <p class="w3-opacity w3-center"><i>GOTTA WIN EVERY LEVEL!</i></p>
        <div class="w3-row w3-center w3-padding-32">
            <div class="w3-col w3-third">
                <img src="rate.png"  width="120px">
                <p> PAY ALL EMIs ON TIME TO GET STARS</p>
            </div>
            <div class="w3-col w3-third">
                <img src="success.png" width="120px">
                <p>REACH AT THE TOP OF THE LEADERBOARD</p>
            </div>
            <div class="w3-col w3-third">
                <img src="money.png" width="120px">
                <p>GET CASHBACK ON YOUR LOAN</p>
            </div>
        </div>
    </div>';*/
        if($res=$user_res->fetch_assoc()){
            $loan_query="select * from loan where user_id=".$user_id;
            $loan_res=$con->query($loan_query);
            if($loan_res->num_rows>0){
                while($loans=$loan_res->fetch_assoc()){
                    $loan_id=$loans['loan_id'];
                    $emi_query="select instl_no,due_date,paid_date,DATEDIFF(paid_date,due_date) as date_diff,DATEDIFF(CURRENT_DATE,due_date) as due_date_diff from emi where loan_id=".$loan_id;
                    $emi_res=$con->query($emi_query);
                    $loan_type=$loans['loan_type'];
                    echo '<div class="emi_tracker" ><div id="emi-info">
                    <p class="loan_type">' .$loan_type.' LOAN</p>';
                    if($emi_res->num_rows>0) {
                        while ($emis = $emi_res->fetch_assoc()) {
                            $paid_date=$emis['paid_date'];
                            $instl_no=$emis['instl_no'];
                            $due_date=$emis['due_date'];
                            $due_diff=$emis['due_date_diff'];
                            if($due_diff>0){
                                $due_diff_text=$due_diff.' DAYS POST DUE. PAY ASAP';
                            }else{
                                $due_diff_text=str_replace('-','',$due_diff).' DAYS LEFT';
                            }
                            if($paid_date=='0000-00-00'){
                                $curr_instl_no=$instl_no;
                                break;
                            }
                        }
                    }
                    $due_date_time=date_create($due_date);
                    $due_formatted=date_format($due_date_time,'d-m-Y');
                    echo '<span class="due-date"> NEXT DUE ON <i class="fa fa-long-arrow-right"></i> '.$due_formatted.'</span><p class="installment"> NEXT INSTALLMENT NO. <i class="fa fa-long-arrow-right"></i> ' .$curr_instl_no.'<span class="days_left">'.$due_diff_text.'</span></p><input type="button" name="pay" value="PAY NOW" class="pay_btn"></div><ul class="progressbar">';
                    $emi_res=$con->query($emi_query);
                    if($emi_res->num_rows>0) {
                        while ($emis = $emi_res->fetch_assoc()) {
                            $instl_no=$emis['instl_no'];
                            $date_diff=$emis['date_diff'];
                            $paid_date=$emis['paid_date'];
                            $due_date=$emis['due_date'];
                            $due_diff=$emis['due_date_diff'];
                            $marker='';
                            $stars='';
                            $stars_ratings1='';
                            $stars_ratings2='';
                            $stars_ratings3='';
                            if($paid_date=='0000-00-00'){
                                if($due_diff>0){
                                    $date_diff_text='Your payment is due';
                                }
                                else if($due_diff<0){
                                    if($due_diff<=-7){
                                        $date_diff_text='Pay 7 days before to get 30 fincoins';
                                    }else if($due_diff>-7 && $due_diff<=-3){
                                        $date_diff_text='Pay 3 days before to get 20 fincoins';
                                    }else if($due_diff>-3 && $due_diff<=-1){
                                        $date_diff_text='Pay 1 day before to get 10 fincoins';
                                    }
                                }else{
                                    $date_diff_text='Pay today to avoid decrease in credit score';
                                }
                            } else if($date_diff>0){
                                $date_diff_text='Paid '.$date_diff.' days late';
                                if($date_diff==1){
                                    $date_diff_text='Paid '.$date_diff.' day late';
                                }
                            }else if($date_diff<0){
                                $date_diff_text='Paid '.str_replace('-','',$date_diff).' days early';
                                if($date_diff==-1){
                                    $date_diff_text='Paid '.str_replace('-','',$date_diff).' day early';
                                }
                            }else if($date_diff==0){
                                $date_diff_text='Paid on time';
                            }
                            if(($paid_date=='0000-00-00' && $due_diff>0) or $date_diff>0){
                                $class='default';
                                if(($paid_date=='0000-00-00' && $due_diff>0)){
                                    $class='defaulter';
                                    $marker='fas fa-map-marker-alt';
                                }
                                $stars='stars';
                                if($date_diff>=7){
                                    $stars_ratings1='fas fa-star def-star';
                                    $stars_ratings2='fas fa-star def-star';
                                    $stars_ratings3='fas fa-star def-star';
                                }else if($date_diff<7 && $date_diff>=3){
                                    $stars_ratings1='fas fa-star def-star';
                                    $stars_ratings2='fas fa-star def-star';
                                    $stars_ratings3='fas fa-star';
                                }else if($date_diff>0 && $date_diff<3){
                                    $stars_ratings1='fas fa-star def-star';
                                    $stars_ratings2='fas fa-star';
                                    $stars_ratings3='fas fa-star';
                                }
                            }
                            else if($date_diff<=0 && $paid_date!='0000-00-00'){
                                $class='active';
                                $stars='stars';
                                if($date_diff<=-7){
                                    $stars_ratings1='fas fa-star one-star';
                                    $stars_ratings2='fas fa-star one-star';
                                    $stars_ratings3='fas fa-star one-star';
                                }else if($date_diff>-7 && $date_diff<=-3){
                                    $stars_ratings1='fas fa-star one-star';
                                    $stars_ratings2='fas fa-star one-star';
                                    $stars_ratings3='fas fa-star';
                                }else if($date_diff>-3 && $date_diff<=0){
                                    $stars_ratings1='fas fa-star one-star';
                                    $stars_ratings2='fas fa-star';
                                    $stars_ratings3='fas fa-star';
                                }
                            }else if($paid_date=='0000-00-00' && $due_diff<=0 && $due_diff>-30){
                                $class='upnext';
                                $marker='fas fa-map-marker-alt';
                            }
                            else{
                                $class='up-next-next';
                            }
                            echo '<li class="'.$class.' tooltip">Level '.$instl_no.
                                '<span class="'.$stars.'"><span class="'.$stars_ratings1.'"></span><span class="'.$stars_ratings2.'"></span><span class="'.$stars_ratings3.'"></span></span><span class="'.$marker.
                                ' marker-pos"></span><span class="tooltiptext">'.$date_diff_text.'</span></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</div>';
                }
            }
        }
    }
$con->close();
?>

