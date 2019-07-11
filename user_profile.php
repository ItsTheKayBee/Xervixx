<?php
include 'db_connect.php';
?>
<html lang="en">
<head>
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Account</title>
    <link rel="stylesheet" href="feed-style.css">
    <link rel="stylesheet" href="stock-cricket.css">
    <link rel="stylesheet" href="home-style.css">
    <link rel="stylesheet" href="user_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div id="top_navbar_container">
    <img src="xervixx-logo.png" alt="logo" id="logo">
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
        <button onclick="showOLB()" class="olb_btn">VIEW GLOBAL LEADERBOARD</button>
    </div>
</nav>
<div class="leaderboard">
    <p>&nbsp;
        <i class="fa fa-trophy" style="color: gold;font-size:32px;"></i>&nbsp;GLOBAL RANKING
        <i class="fa fa-times-circle" onclick="closeLB()" style="float: right;padding-right: 15px; font-size:30px;"></i>
    </p>
    <table id="ranking">
    </table>
</div>
<button class="fas fa-caret-left" onclick="location.replace('home.php')">&nbsp;&nbsp;HOME</button>
<div class="user-div">
    <?php include 'user_info.php'?>
</div>
<div class="time_match">
    <div class="time_match_div">
        <span class="time_match_completed" style="transform:translateX(-50%);margin-bottom:10px;position: absolute;top:500px;left: 50%; ">MATCHES PLAYED IN THE PAST 3 DAYS</span><hr style="top:5px;position: relative">
        <div class="match-container" style="margin: 0 auto">
            <?php include 'previous_matches.php';?>
        </div>
    </div>
</div>
</body>
<footer>
    <script src="feedScript.js"></script>
    <script src="stockCricket.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
</html>