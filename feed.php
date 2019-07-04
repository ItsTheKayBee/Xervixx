<html lang="en">
<head>
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Feed</title>
</head>
<link rel="stylesheet" href="feed-style.css">
<link rel="stylesheet" href="style.css">
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div id="tabLayout">
    <a class="btn" href=""><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
    <a class="btn active feed-feed" onclick="filterSelection('all')"><i class="fa fa-mobile"></i>&nbsp;&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
    <div id="feed-container">
        <a class="btn feed-sub" onclick="filterSelection('protecting')"> Protecting</a>
        <a class="btn feed-sub" onclick="filterSelection('investing')"> Investing</a>
        <a class="btn feed-sub" onclick="filterSelection('financing')"> Financing</a>
        <a class="btn feed-sub" onclick="filterSelection('advising')"> Advising</a>
    </div>
    <a class="btn" href="stock_cricket.php"><i class="fa fa-chart-line"></i>&nbsp;&nbsp;Stock Cricket</a>
    <a class="btn" href=""><i class="fa fa-question-circle"></i>&nbsp;&nbsp;Quiz</a>
    <a class="btn" href="buy.html"><i class="fa fa-ticket-alt"></i>&nbsp;&nbsp;Coupons</a>
    <div id="lower-menu">
        <a class="btn" href="">FAQs</a>
        <a class="btn" href="">About us</a>
        <a class="btn" href="">Contact us</a>
    </div>
</div>
<div id="lower-menu-dropdown">
    <a class="btn" href="">FAQs</a>
    <a class="btn" href="">About us</a>
    <a class="btn" href="">Contact us</a>
</div>
<div id="feed-container-icon">
    <a class="btn feed-sub" onclick="filterSelection('protecting')"> Protecting</a>
    <a class="btn feed-sub" onclick="filterSelection('investing')"> Investing</a>
    <a class="btn feed-sub" onclick="filterSelection('financing')"> Financing</a>
    <a class="btn feed-sub" onclick="filterSelection('advising')"> Advising</a>
</div>
<div id="tabLayout-icons">
    <a class="btn" href=""><i class="fa fa-home"></i></a>
    <a class="btn active feed-feed" onclick="filterSelection('all')"><i class="fa fa-mobile"></i>&nbsp;&nbsp;<span class="fa fa-caret-down flip"></span></a>
    <a class="btn" href=""><i class="fa fa-chart-line"></i></a>
    <a class="btn" href=""><i class="fa fa-question-circle"></i></a>
    <a class="btn" href="buy.html"><i class="fa fa-ticket-alt"></i></a>
</div>
<nav id="closeScoreLayout">
    <span class="fa fa-ellipsis-h" onclick="scoreLayout(this)" style="font-size:40px;color:white;padding:10px;"></span>
    <span class="fa fa-bitcoin" id="display-btc" onclick="scoreLayout(this)" style="font-size:40px;color:gold;padding:10px;"></span>
    <div class="container" id="small-progress-circle" onclick="scoreLayout(this)">
        <div class="row" style="margin:0">
            <div class="col-md-3 col-sm-6">
                <div class="progress blue" style="width: 35px;height: 35px;">
                        <span class="progress-left">
                            <span class="progress-bar" style="border-width:5px;"></span>
                        </span>
                    <span class="progress-right">
                            <span class="progress-bar" style="border-width:5px;"></span>
                        </span>
                    <div class="progress-value" style="line-height:30px;">5</div>
                </div>
            </div>
        </div>
    </div>
   <span class="fa fa-phone" id="contact" style="color: white;font-size:40px;padding:10px;"></span>
    <div id="x-money-div">
        <h3 style="color: white">Your x-money wallet balance is:</h3>
        <h4 id="x-money">500<i style="color:gold" class="fa fa-bitcoin"></i></h4>
    </div>
    <div id="container-div" style="z-index:4;width:100%;display: none;box-shadow: none;">
        <div class="container" style="margin-left: -20px;">
            <div class="row" style="margin-left:30px">
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
                    <dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Daily jeuebrebvrbvr ubvurvburvunv ivirtask 1 kuhra</dt></div>
                <div class="daily-task-div"><div class="ptrack">
                    <div class="progress-bar pbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        7/10
                    </div>
                </div><dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Daily task 2</dt></div>
                <div class="daily-task-div"><div class="ptrack">
                    <div class="progress-bar pbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        7/10
                    </div>
                </div><dt><i class="fa fa-trophy" style="color:gold">&nbsp;</i>Daily task 3</dt></div>
            </dl>
            <center><button class="btns">View More&nbsp;<i class="fa fa-caret-right" style="color:deepskyblue;"></i></button></center>
        </div>
    </div>
</nav>
<div class="row">
    <?php include 'feed_php.php';?>
</div>
</body>
<script src="feed-script.js"></script>
</html>