<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Cricket</title>
</head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<link rel="stylesheet" href="stock-cricket.css">
<body>
    <div class="container">
        <ul class="progress-bar">
            <li class=" active uncheckedli fas fa-check-circle">Select a Tournament</li>
            <li class=" uncheckedli fas fa-check-circle">Create a Team</li>
            <li class="uncheckedli fas fa-check-circle">Pay Pool x-money</li>
            <li class="uncheckedli fas fa-check-circle" style="display: none">Pay Pool x-money</li>
        </ul>
        <div id="track"></div>
    </div>
    <nav class="tourney-menu">
        <button class="menu active" id="t20-b" onclick="matchDisplay(this)">T20</button>
        <button class="menu" id="odi-b" onclick="matchDisplay(this)">ODI</button>
        <button class="menu" id="test-b" onclick="matchDisplay(this)">TEST</button>
    </nav>
    <div id="t20" class="tourney">
        <p>Every day from 9:15-11.00 (Monday to Friday)</p>
        <span class="time_match">Upcoming</span><hr>
        <div class="match-container" id="t20-up">
        </div>
        <span class="time_match">Ongoing</span><hr>
        <div class="match-container" id="t20-on">
        </div>
        <span class="time_match">Completed</span><hr>
        <div class="match-container" id="t20-com">
        </div>
    </div>
    <div id="odi" class="tourney">
        <p>Every day from 9:15-15.30 (Monday to Friday)</p>
        <span class="time_match">Upcoming</span><hr>
        <div class="match-container" id="odi-up" >
        </div>
        <span class="time_match">Ongoing</span><hr>
        <div class="match-container" id="odi-on">
        </div>
        <span class="time_match">Completed</span><hr>
        <div class="match-container" id="odi-com">
        </div>
    </div>
    <div id="test" class="tourney">
        <p>A week long tournament from Monday, 9:15 to Friday, 15.30</p>
        <span class="time_match">Upcoming</span><hr>
        <div class="match-container" id="test-up">
        </div>
        <span class="time_match">Ongoing</span><hr>
        <div class="match-container" id="test-on">
        </div>
        <span class="time_match">Completed</span><hr>
        <div class="match-container" id="test-com">
        </div>
    </div>
    <div class="stock-select">
        <div id="stock-chosen">
            <h3 style="text-align:center;color:white;margin-bottom: 0;padding: 20px">Create a team by selecting 5 players</h3>
            <h5 id="stck-chsn-ref" style="text-align:center;color:lightblue;margin-top: 5px;padding:20px">You can simply click to drop your players here.</h5>
            <button class="in-active" onclick="teamSelected()">Next</button>
        </div>
        <div class="stock-input">
            <label id="rad">
                <input type="radio" name="selection" value="manual" checked>Manual
                <input type="radio" value="Automatic" name="selection" onchange="randomSelection(this)">Automatic
            </label><br>
            <label id="sort">
                <select onchange="sort(this)">
                    <option>Sort By</option>
                    <option>Name</option>
                    <option>Percentage Change</option>
                    <option>Last Price</option>
                </select>
            </label><br>
            <input type="text" id="company-name" onkeyup="search()" placeholder="Enter company name">
        </div>
        <div class="menubar">
            <select onchange="randomSelection(this)">
                <option>Manual</option>
                <option>Automatic</option>
            </select>
            <input type="text" id="company-name-1" onkeyup="search()" placeholder="  Enter name">
            <select onchange="sort(this)">
                <option>Sort By</option>
                <option>Name</option>
                <option>Percentage Change</option>
                <option>Last Price</option>
            </select>
        </div>
        <div class="all-players" id="all-players">
        </div>
    </div>
    <div id="succ-reg" class="match">
    </div>
    <div class="leaderboard">
        <h1>&nbsp;&nbsp;
            <i class="fa fa-trophy" style="color: gold;font-size: 32px;"></i>
            &nbsp;Top Performers
            <i class="fa fa-times-circle" onclick="closeLB()" style="float: right;padding-right: 15px"></i>
        </h1>
        <table id="leaderboard">
        </table>
    </div>
</body>
<script src="stockCricket.js"></script>
</html>