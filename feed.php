<html lang="en">
<head>
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="feed-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div id="top_navbar_container">
    <img src="xervizz_logo.png" id="logo">
</div>
<div id="tabLayout">
    <a class="btn btn_home" href="main.php" style="border-left: 10px solid #d35400"><i class="fa fa-home"></i>&nbsp;Home</a>
    <a class="btn btn_feed active feed-feed" href="feed.php" onclick="filterSelection('all')" style="border-left: 10px solid #2980b9"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
    <div id="feed-container">
        <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('protecting')"> Protecting</a>
        <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('investing')"> Investing</a>
        <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('financing')"> Financing</a>
        <a class="btn feed-sub btn_feed_sub" onclick="filterSelection('advising')"> Advising</a>
    </div>
    <a class="btn btn_stockcricket" href="stock_cricket.php" style="border-left: 10px solid #27ae60"><i class="fa fa-chart-line"></i>&nbsp; Stock Cricket</a>
    <a class="btn btn_quiz" href="quiz.php" style="border-left: 10px solid #8e44ad"><i class="fa fa-question-circle"></i>&nbsp; Quiz</a>
    <a class="btn btn_coupons" href="buy.html" style="border-left: 10px solid #16a085"><i class="fa fa-ticket-alt"></i>&nbsp; Coupons</a>
    <div id="lower-menu">
        <a class="btn btn_share" href="" style="border-left: 10px solid #f39c12"><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Share & Earn</a>
        <a class="btn btn_feedback" href="" style="border-left: 10px solid #d35400"><i class="fa fa-comments-o"></i>&nbsp;&nbsp;Feedback&nbsp;</a>
        <a class="btn btn_contact" href="" style="border-left: 10px solid #2980b9"><i class="fa fa-phone"></i>&nbsp;&nbsp;Contact Us&nbsp;</a>
        <a class="btn btn_logout" href="logout.php" style="border-left: 10px solid #c0392b"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout&nbsp;</a>
    </div>
</div>
<div id="lower-menu-dropdown">
    <a class="btn btn_share" href="" style="border-left: 10px solid #f39c12"><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Share & Earn</a>
    <a class="btn btn_feedback" href="" style="border-left: 10px solid #d35400"><i class="fa fa-comments-o"></i>&nbsp;&nbsp;Feedback&nbsp;</a>
    <a class="btn btn_contact" href="" style="border-left: 10px solid #2980b9"><i class="fa fa-phone"></i>&nbsp;&nbsp;Contact Us&nbsp;</a>
    <a class="btn btn_logout" href="logout.php" style="border-left: 10px solid #c0392b"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout&nbsp;</a>
</div>
<div id="feed-container-icon">
    <a class="btn feed-sub" onclick="filterSelection('protecting')"> Protecting</a>
    <a class="btn feed-sub" onclick="filterSelection('investing')"> Investing</a>
    <a class="btn feed-sub" onclick="filterSelection('financing')"> Financing</a>
    <a class="btn feed-sub" onclick="filterSelection('advising')"> Advising</a>
</div>
<div id="tabLayout-icons">
    <a class="btn" href="main.php" style="color:#d35400; "><i class="fa fa-home"></i></a>
    <a class="btn active feed-feed" href="feed.php" onclick="filterSelection('all')" style="color:#2980b9;"><i class="fa fa-mobile" style="top: -10px;left:10px;position: relative;"></i>&nbsp;&nbsp;<span class="fa fa-caret-down flip" style="top: -10px;position: relative;color:#2980b9;"></span></a>
    <a class="btn" href="stock_cricket.php" style="color:#27ae60;"><i class="fa fa-chart-line"></i></a>
    <a class="btn" href="quiz.php" style="color:#8e44ad;"><i class="fa fa-question-circle"></i></a>
    <a class="btn" href="buy.html" style="color:#16a085;"><i class="fa fa-ticket-alt"></i></a>
</div>
<nav id="closeScoreLayout">
    <span class="fa fa-ellipsis-h" onclick="scoreLayout(this)" style="font-size:30px;color:white;padding:10px;line-height:25px;"></span>
    <span class="fa fa-phone" id="contact" style="color: white;font-size:40px;padding:10px;"></span>
    <div id="x-money-div">
        <h4 id="x-money">500 <i style="color:gold" class="fas fa-coins"></i></h4>
    </div>
    <div id="container-div" style="z-index:4;width:100%;display: none;box-shadow: none;">
        <div class="container" style="margin-left: -20px;">
            <div class="row" style=" top:-25px; position: relative; margin-left:35px;">
                <div class="col-md-3 col-sm-6">
                    <div class="progress blue">
                            <span class="progress-left">
                                <span class="progress-bar"></span>
                            </span>
                        <span class="progress-right">
                                <span class="progress-bar"></span>
                            </span>
                        <div class="progress-value">Level 1</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="daily-task">
            <dl class="daily-task-list">
                <div class="daily-task-div">
                    <div class="ptrack">
                        <div class="progress-bar pbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                            1/2
                        </div>
                    </div>
                    <dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Weekly task 1</dt></div>
                <div class="daily-task-div"><div class="ptrack">
                        <div class="progress-bar pbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                            7/10
                        </div>
                    </div><dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Weekly task 2</dt></div>
                <div class="daily-task-div"><div class="ptrack">
                        <div class="progress-bar pbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                            7/10
                        </div>
                    </div><dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Weekly task 3</dt></div>
            </dl>
            <!-- <center><button class="btns">View More&nbsp;<i class="fa fa-caret-right" style="color:deepskyblue;"></i></button></center> -->
        </div>
    </div>
</nav>
<div class="row" style="top: 60px;">
        <?php include 'feed_updation.php';?>
    </div>
</body>
<script src="feed-script.js"></script>
</html>