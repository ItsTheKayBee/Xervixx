<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Xervixx Home</title>
    <link href="style.css" rel="stylesheet">
    <link href="feed-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
    <body style="overflow-x: hidden">
        <div id="main_div">
            <div id="tabLayout">
                <a class="btn active" href="main.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
                <a class="btn feed-feed" onclick="filterSelection('all')" href="feed.php"><i class="fa fa-mobile"></i>&nbsp;&nbsp;&nbsp;Feed &nbsp;<span class="fa fa-caret-down flip"></span></a>
                <div id="feed-container">
                    <a class="btn feed-sub" onclick="filterSelection('protecting')"> Protecting</a>
                    <a class="btn feed-sub" onclick="filterSelection('investing')"> Investing</a>
                    <a class="btn feed-sub" onclick="filterSelection('financing')"> Financing</a>
                    <a class="btn feed-sub" onclick="filterSelection('advising')"> Advising</a>
                </div>
                <a class="btn" href="stock_cricket.php"><i class="fa fa-chart-line"></i>&nbsp;&nbsp;Stock Cricket</a>
                <a class="btn" href="quiz.php"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;Quiz</a>
                <a class="btn" href="buy.html"><i class="fa fa-ticket-alt"></i>&nbsp;&nbsp;Coupons</a>
                <div id="lower-menu">
                    <a class="btn" href=""><i class="fa fa-share-alt"></i>&nbsp;&nbsp;&nbsp;Share</a>
                    <a class="btn" href=""><i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;Logout</a>
                </div>
            </div>

            <div id="progressbar_container" style="left: 210px;">
                <p id="tag_emi"><i>PAY EMI ON TIME AND INCREASE YOUR CREDIT SCORE!!!</i></p>
                <?php include 'loan_updation.php';?>
            </div>
            <div id="container-div" style="position: relative;left: 200px;top: 60px;width:85%; height:230px;margin-bottom: 30px; border: 2px solid darkgray;background-color: white;">
                <div class="container" style="margin-left: -170px;position: absolute">
                    <?php include 'level.php';?>
                </div>
                <div class="daily-task" style="float:left; width: 55%;margin-left: 250px;">
                    <dl class="daily-task-list">
                        <?php include 'tasks.php';?>
                    </dl>
                </div>
                <div class="container" style="margin-right: -60px;float: right;margin-top: -180px;">
                    <?php include 'credit_score.php';?>
                </div>
            </div>
        </div>
    </body>
<footer>
    <script src="script.js"></script>
</footer>
</html>