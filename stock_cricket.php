<?php
include 'db_connect.php';
?>
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
<i class="fas fa-info-circle" onclick="tnc()"></i>
<button class="fas fa-caret-left" onclick="location.replace('home.php')">&nbsp;&nbsp;HOME</button>
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
    <p>EVERY DAY FROM 9:15-11:00 (MONDAY TO FRIDAY)</p>
    <div class="time_match">
        <div class="time_match_div">
            <span class="time_match_upcoming">UPCOMING</span><hr>
            <div class="match-container" id="t20-up"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_ongoing">ONGOING</span><hr>
            <div class="match-container" id="t20-on"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_completed">COMPLETED</span><hr>
            <div class="match-container" id="t20-com"></div>
        </div>
    </div>
</div>
<div id="odi" class="tourney">
    <p>EVERY DAY FROM 9:15-15:30 (MONDAY TO FRIDAY)</p>
    <div class="time_match">
        <div class="time_match_div">
            <span class="time_match_upcoming">UPCOMING</span><hr>
            <div class="match-container" id="odi-up"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_ongoing">ONGOING</span><hr>
            <div class="match-container" id="odi-on"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_completed">COMPLETED</span><hr>
            <div class="match-container" id="odi-com"></div>
        </div>
    </div>
</div>
<div id="test" class="tourney">
    <p>A WEEK LONG TOURNAMENT FROM MONDAY, 9:15 TO FRIDAY, 15:30</p>
    <div class="time_match">
        <div class="time_match_div">
            <span class="time_match_upcoming">UPCOMING</span><hr>
            <div class="match-container" id="test-up"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_ongoing">ONGOING</span><hr>
            <div class="match-container" id="test-on"></div>
        </div>
        <div class="time_match_div">
            <span class="time_match_completed">COMPLETED</span><hr>
            <div class="match-container" id="test-com"></div>
        </div>
    </div>
</div>
<div class="stock-select">
    <div id="stock-chosen">
        <h3 style="text-align:center;color:white;margin-bottom: 0;padding: 20px">CREATE A TEAM BY SELECTING 5 PLAYERS</h3>
        <h5 id="stck-chsn-ref" style="text-align:center;color:lightblue;margin-top: 5px;padding:20px">YOU CAN SIMPLY CLICK TO DROP YOUR PLAYERS HERE.</h5>
        <button class="in-active" onclick="teamSelected()">NEXT</button>
    </div>
    <div class="stock-input">
        <label id="rad">
            <input type="radio" name="selection" value="manual" checked>MANUAL
            <input type="radio" value="Automatic" name="selection" onchange="randomSelection(this)">AUTOMATIC
        </label><br>
        <label id="sort">
            <select onchange="sort(this)">
                <option>SORT BY</option>
                <option>NAME</option>
                <option>PERCENTAGE CHANGE</option>
                <option>LAST PRICE</option>
            </select>
        </label><br>
        <input type="text" id="company-name" onkeyup="search()" placeholder="ENTER COMPANY NAME">
    </div>
    <div class="menubar">
        <select onchange="randomSelection(this)">
            <option>MANUAL</option>
            <option>AUTOMATIC</option>
        </select>
        <input type="text" id="company-name-1" onkeyup="search()" placeholder="  Enter name">
        <select onchange="sort(this)">
            <option>SORT BY</option>
            <option>NAME</option>
            <option>PERCENTAGE CHANGE</option>
            <option>LAST PRICE</option>
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
<footer>
    <script src="stockCricket.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
</html>