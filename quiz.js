const start = $("#start");
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

$(document).ready(function(){
    renderingQuestion();
    start.click(renderingQuestion);
});
var renderingQuestion=function renderQuestion(){
    start.on("click",function () {
        start.hide();
        quiz.style.display = "block";
        renderProgress();
        renderCounter();
        TIMER = setInterval(renderCounter,1000);
    });
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            var resText=this.responseText;
            if(resText==="Already attempted"){
                swal({
                    title: "You have played today's quiz already!",
                    text: "Check back later",
                    icon: "success",
                    allowClickOutside:false,
                    button:"Ok"
                })
                    .then((Ok) => {
                        if (Ok) {
                            location.replace("home.php");
                        }
                    });
            }else if(resText==='no quiz present'){
                swal({
                    title: "There is no quiz present at this moment",
                    text: "Check back later",
                    icon: "warning",
                    allowClickOutside:false,
                    button: true,
                })
                    .then((Ok) => {
                        if (Ok) {
                            location.replace("home.php");
                        }
                    });
            }else{
                document.getElementById('quiz_container').innerHTML=resText;
            }
        }
    };
    xmlhttp.open('GET','quiz_questions.php?q='+runningQuestion,true);
    xmlhttp.send();
};

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
            renderingQuestion();
        }else{
            clearInterval(TIMER);
            scoreRendering();
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
    console.log(ans_verify);
    if(ans_verify==1){
        answerIsCorrect();
    }else{
        answerIsWrong();
    }
    count = 0;
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderingQuestion();
    }else{
        clearInterval(TIMER);
        scoreRendering();
    }
}
function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor = "#0ace41";
    swal({
        title: "Right Answer",
        icon: "success",
        button:false,
    })
}
function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor = "#ed2409";
    swal({
        title: "Sorry, your answer is incorrect",
        icon: "error",
        button:false,
    })
}
var scoreRendering= function scoreRender(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var score=this.responseText;
            swal({
                title: "Congratulations!!!",
                text: "You scored "+score+"\n"+(score*10)+" x-money added to your wallet",
                icon: "success",
                button: "Okay",
            })
                .then((ok)=> {
                    if (ok) {
                        location.replace("home.php");
                    }
                });
        }
    };
    xmlhttp.open('GET', 'quiz_score.php?', true);
    xmlhttp.send();
    $('#quiz_container').hide();
}