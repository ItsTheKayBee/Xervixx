<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Xervixx Home</title>
    <link href="home-style.css" rel="stylesheet">
    <link href="feed-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
    <body style="overflow-x: hidden">
        <div id="main_div">
            <div id="top_navbar_container">
                <img src="xervixx-logo.png" alt="logo" id="logo">
                <a href="user_profile.php"><?php include "display_pic.php";?></a>
            </div>
            <div id="tabLayout">
                <a class="btn btn_home active" href="home.php" style="border-left: 10px solid #d35400"><i class="fa fa-home"></i>&nbsp;Home</a>
                <a class="btn btn_feed feed-feed" href='feed.php' onclick="filterSelection('all')" style="border-left: 10px solid #2980b9"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
                <div id="feed-container">
                    <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('protecting')"> Protecting</a>
                    <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('investing')"> Investing</a>
                    <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('financing')"> Financing</a>
                    <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('advising')"> Advising</a>
                </div>
                <a class="btn btn_stockcricket" href="stock_cricket.php" style="border-left: 10px solid #27ae60"><i class="fa fa-chart-line"></i>&nbsp; Stock Cricket</a>
                <a class="btn btn_quiz" href="quiz.php" style="border-left: 10px solid #8e44ad"><i class="fa fa-question-circle"></i>&nbsp; Quiz</a>
                <a class="btn btn_coupons" href="coupons.php" style="border-left: 10px solid #16a085"><i class="fa fa-ticket-alt"></i>&nbsp; Coupons</a>
                <div id="lower-menu">
                    <a class="btn btn_share" onclick="referral()" style="border-left: 10px solid #f39c12"><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Share & Earn</a>
                    <a class="btn btn_contact" href="contact_us.php" style="border-left: 10px solid #2980b9"><i class="fa fa-phone"></i>&nbsp;&nbsp;Contact &nbsp;</a>
                    <a class="btn btn_logout" onclick="logout()" style="border-left: 10px solid #c0392b"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout&nbsp;</a>
                </div>
            </div>
            <div id="lower-menu-dropdown">
                <a class="btn btn_share" onclick="referral()" style="border-left: 10px solid #f39c12"><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Share & Earn</a>
                <a class="btn btn_contact" href="contact_us.php" style="border-left: 10px solid #2980b9"><i class="fa fa-phone"></i>&nbsp;&nbsp;Contact &nbsp;</a>
                <a class="btn btn_logout" onclick="logout()" style="border-left: 10px solid #c0392b"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout&nbsp;</a>
            </div>
            <div id="feed-container-icon">
                <a class="btn feed-sub" onclick="filterSelection('protecting')"> Protecting</a>
                <a class="btn feed-sub" onclick="filterSelection('investing')"> Investing</a>
                <a class="btn feed-sub" onclick="filterSelection('financing')"> Financing</a>
                <a class="btn feed-sub" onclick="filterSelection('advising')"> Advising</a>
            </div>
            <div id="tabLayout-icons">
                <a class="btn" href="home.php" style="color:#d35400; "><i class="fa fa-home"></i></a>
                <a class="btn active feed-feed" href="feed.php" onclick="filterSelection('all')" style="color:#2980b9;"><i class="fa fa-mobile" style="top: -10px;left:10px;position: relative;"></i>&nbsp;&nbsp;<span class="fa fa-caret-down flip" style="top: -10px;position: relative;color:#2980b9;"></span></a>
                <a class="btn" href="stock_cricket.php" style="color:#27ae60;"><i class="fa fa-chart-line"></i></a>
                <a class="btn" href="quiz.php" style="color:#8e44ad;"><i class="fa fa-question-circle"></i></a>
                <a class="btn" href="coupons.php" style="color:#16a085;"><i class="fa fa-ticket-alt"></i></a>
            </div>
            <div id="progressbar_container" style="left: 240px;top:120px;">
                <span id="x_money_div" style="margin: 0 50px 0 0;" style="background-color: none;position: relative;top: -200px;">
                    <?php include 'x_money_credit.php';?> <i style="color:yellow" class="fas fa-coins"></i>
                </span><br><br><br>
                <?php include 'loan_updation.php';?>
            </div>
            <div id="container-div" style="position: relative;left: 240px;top: 120px;width:80%; height:230px;margin-bottom: 30px;background-image: linear-gradient(to bottom, #ff7b0d 0%,#ffa84c 100%);;box-shadow: -1px -1px 5px 1px grey;border-radius:20px;">
                <div class="container" style="margin-left: -170px;margin-top:50px;position: absolute">
                    <?php include 'level.php';?>
                </div>
                <div class="daily-task" style="float:left; width: 55%;margin-left: 250px;margin-top:60px;">
                    <dl class="daily-task-list">
                        <?php include 'tasks.php';?>
                    </dl>
                </div>
                <div class="container" style="margin-right: -60px;float: right;margin-top: -200px;">
                    <?php include 'credit_score.php';?>
                </div>
            </div>
        </div>
    </body>
<footer>
    <script src="homeScript.js"></script>
    <script src="feedScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
</html>