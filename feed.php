<?php
include 'db_connect.php';
?>
<html lang="en">
<head>
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Feed</title>
    <link rel="stylesheet" href="home-style.css">
    <link rel="stylesheet" href="feed-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body id="feed-body">
<div id="top_navbar_container">
    <img src="xervizz_logo.png" id="logo">
</div>
<div id="tabLayout">
    <a class="btn btn_home" href="home.php" style="border-left: 10px solid #d35400"><i class="fa fa-home"></i>&nbsp;Home</a>
    <a class="btn btn_feed active feed-feed" onclick="filterSelection('all');feedUpDown()" style="border-left: 10px solid #2980b9"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
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
    <a class="btn active feed-feed" onclick="filterSelection('all')" style="color:#2980b9;"><i class="fa fa-mobile" style="top: -10px;left:10px;position: relative;"></i>&nbsp;&nbsp;<span class="fa fa-caret-down flip" style="top: -10px;position: relative;color:#2980b9;"></span></a>
    <a class="btn" href="stock_cricket.php" style="color:#27ae60;"><i class="fa fa-chart-line"></i></a>
    <a class="btn" href="quiz.php" style="color:#8e44ad;"><i class="fa fa-question-circle"></i></a>
    <a class="btn" href="coupons.php" style="color:#16a085;"><i class="fa fa-ticket-alt"></i></a>
</div>
<nav id="closeScoreLayout">
    <span class="fa fa-ellipsis-h" onclick="scoreLayout(this)" style="font-size:30px;color:white;padding:10px;line-height:25px;"></span>
    <span class="fa fa-phone" id="contact" style="color: white;font-size:40px;padding:10px;"></span>
    <div id="x-money-div" style="font-size: 52px;">
        <?php include 'x_money_credit.php';?>
        <i style="color:gold" class="fas fa-coins"></i>
    </div>
    <div id="container-div" style="z-index:4;width:100%;display: none;box-shadow: none;">
        <div class="container" style="margin-left: -130px;">
            <?php include 'level.php';?>
        </div>
        <div class="daily-task">
            <dl class="daily-task-list">
                <?php include 'tasks.php';?>
            </dl>
        </div>
        <button onclick="showOLB()">Global leaderboard</button>
        <div class="leaderboard">
            <h1>&nbsp;&nbsp;
                <i class="fa fa-trophy" style="color: gold;font-size: 32px;"></i>
                &nbsp;GLOBAL RANKING
                <i class="fa fa-times-circle" onclick="closeLB()" style="float: right;padding-right: 15px"></i>
            </h1>
            <table id="leaderboard">
            </table>
        </div>
    </div>
</nav>
<div class="row" id="feed-posts" style="top: 60px;">
</div>
<div id="comment-toast">Your comment was added.</div>
</body>
<script src="feedScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>