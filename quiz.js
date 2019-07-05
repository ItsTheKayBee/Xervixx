const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const counter = document.getElementById("counter");
const timeGauge = document.getElementById("timeGauge");
const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");
const lastQuestion = 2;
let runningQuestion = 0;
let count = 0;
const questionTime = 10;
const gaugeWidth = 150;
const gaugeUnit = gaugeWidth / questionTime;
let TIMER;
function renderQuestion(){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            document.getElementById('quiz_container').innerHTML=this.responseText;
        }
    };
    xmlhttp.open('GET','quiz_questions.php?q='+runningQuestion,true);
    xmlhttp.send();
}
start.addEventListener("click",startQuiz);
function startQuiz(){
    start.style.display = "none";
    renderQuestion();
    quiz.style.display = "block";
    renderProgress();
    renderCounter();
    TIMER = setInterval(renderCounter,1000);
}
function renderProgress(){
    for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
        progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
    }
}
function renderCounter(){
    if(count <= questionTime){
        counter.innerHTML = count;
        timeGauge.style.width = count * gaugeUnit + "px";
        count++
    }else{
        count = 0;
        answerIsWrong();
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            clearInterval(TIMER);
            scoreRender();
        }
    }
}
function checkAnswer(answer) {
    var corr_answer;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            ans_verify = this.responseText;
            ans_check(ans_verify);
        }
    };
    xmlhttp.open('GET', 'quiz_ans.php?q=' + runningQuestion+','+answer, true);
    xmlhttp.send();
}
function ans_check(ans_verify){
    if(ans_verify){
        answerIsCorrect();
    }else{
        answerIsWrong();
    }
    count = 0;
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
        clearInterval(TIMER);
        scoreRender();
    }
}
function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor = "#0ace41";
}
function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor = "#ed2409";
}
function scoreRender(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var score=this.responseText;
            scoreDiv.innerHTML += "<p>YOU SCORED "+ score +"/3</p>";
        }
    };
    xmlhttp.open('GET', 'quiz_score.php?', true);
    xmlhttp.send();
    scoreDiv.style.display = "block";
    $('#quiz_container').hide();
}