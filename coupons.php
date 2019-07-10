<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="coupons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home-style.css">
    <link rel="stylesheet" href="feed-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
    <body>
    <div id="top_navbar_container">
        <img src="xervizz_logo.png" id="logo">
    </div>
    <div id="tabLayout">
        <a class="btn btn_home" href="home.php" style="border-left: 10px solid #d35400"><i class="fa fa-home"></i>&nbsp;Home</a>
        <a class="btn btn_feed feed-feed" href='feed.php' onclick="filterSelection('all')" style="border-left: 10px solid #2980b9"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
        <div id="feed-container">
            <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('protecting')"> Protecting</a>
            <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('investing')"> Investing</a>
            <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('financing')"> Financing</a>
            <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('advising')"> Advising</a>
        </div>
        <a class="btn btn_stockcricket" href="stock_cricket.php" style="border-left: 10px solid #27ae60"><i class="fa fa-chart-line"></i>&nbsp; Stock Cricket</a>
        <a class="btn btn_quiz" href="quiz.php" style="border-left: 10px solid #8e44ad"><i class="fa fa-question-circle"></i>&nbsp; Quiz</a>
        <a class="btn btn_coupons active" href="coupons.php" style="border-left: 10px solid #16a085"><i class="fa fa-ticket-alt"></i>&nbsp; Coupons</a>
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
    <div id="buy-container">
        <h1 align="center">My Coupons</h1>
        <div class="row" style="width:90%;">
            <?php include 'coupons_purchased.php';?>
        </div>
        <h1 align="center">Purchase Coupons</h1>
        <div class="row" style="width:90%;">
            <?php include 'all_coupons.php';?>
        </div>
    </div>
    </body>
<footer>
    <script rel="script" src="feedScript.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
</html>