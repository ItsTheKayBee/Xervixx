<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Quiz</title>
    <link rel="stylesheet" href="quiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body class="quiz_body">
<div id="container">
    <div id="start">PLAY THE QUIZ!</div>
    <div id="quiz" style="display: none">
        <div id="quiz_container">
        </div>
        <div id="timer">
            <div id="counter"></div>
            <div id="btimeGauge"></div>
            <div id="timeGauge"></div>
        </div>
        <div id="progress"></div>
    </div>
    <div id="scoreContainer" style="display: none"></div>
</div>
<script src="quiz.js"></script>
</body>
</html>