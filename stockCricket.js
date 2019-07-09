let tourSelected=0;
let format;
$(document).ready(function () {
    $("li.active").prevAll().addClass('checkedli');
    $("li.active").prevAll().removeClass('uncheckedli');
    matchDisplay(document.getElementById('t20-b'));
    $('#odi').hide();
    $('#test').hide();
    $('#t20').show();
});
function matchDisplay(x) {
    $('button.active').removeClass('active');
    $(x).addClass('active');
    var matchFormat=x.id.substr(0,3);
    if(matchFormat==='t20') {
        $('#odi').hide();
        $('#test').hide();
        $('#t20').show();
        uponcom('t20','up');
        uponcom('t20','on');
        uponcom('t20','com');
    }
    else if(matchFormat==='odi'){
        $('#t20').hide();
        $('#test').hide();
        $('#odi').show();
        uponcom('odi','up');
        uponcom('odi','on');
        uponcom('odi','com');
    }
    else if(matchFormat==='tes'){
        $('#odi').hide();
        $('#t20').hide();
        $('#test').show();
        matchFormat='test';
        uponcom('test','up');
        uponcom('test','on');
        uponcom('test','com');
    }
}
function uponcom(matchFormat,session){
    var ajax_update = function() {
        format=matchFormat;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById(matchFormat+"-"+session).innerHTML= this.responseText;
            }
        };
        xmlhttp.open("GET", "stock_match_updation.php?q=" + matchFormat+","+session, true);
        xmlhttp.send();
    };
    ajax_update();
    var interval = 1000*60;
    setInterval(ajax_update, interval);
}
function matchSelect(match) {
    tourSelected=match;
    $('.tourney').hide();
    $('.tourney-menu').hide();
    $('.stock-select').show();
    sort('Name');
    progressIncrement();
    $(document.body).css('overflow','hidden');
}
function progressIncrement() {
    $('li.active').next().addClass('active');
    $('li.active:eq(0)').removeClass('active');
    $("li.active").prevAll().addClass('checkedli');
    $("li.active").prevAll().removeClass('uncheckedli');
}
function dragElement(e) {
    timeCheck();
    if(e.parentElement.className==="all-players"){
        if(($('#stock-chosen').children().length<8)){
            e.style.display = 'none';
            $('#stck-chsn-ref').hide();
            var stockChosen = document.getElementById('stock-chosen');
            stockChosen.insertBefore(e,stockChosen.childNodes[2]);
            e.style.display = 'block';
        }
    }
    else{
        dropElement(e);
    }
    if($('#stock-chosen').children().length===8){
        $('.in-active').addClass('act-ive');
        $('.act-ive').removeClass('in-active');
    }else{
        $('.act-ive').addClass('in-active');
        $('.in-active').removeClass('act-ive');
    }
}
function dropElement(e) {
    timeCheck();
    e.style.display = 'none';
    var stockChosen = document.getElementById("all-players");
    stockChosen.insertBefore(e,stockChosen.childNodes[0]);
    e.style.display = 'block';
}
function teamSelected(){
    var teamChosenFinal=[];
    var i;
    var players=$('#stock-chosen').children();
    for(i=1;i<6;i++) {
        var player=$(players[i]).find('.stock-container span:eq(1)').text();
        player=player.replace('(','');
        player=player.replace(')','');
        if(player!==null){
            teamChosenFinal.push(player);
        }
    }
    if(teamChosenFinal!==null){
        payPool(teamChosenFinal.toString());
    }
}
function payPool(teamChosenFinal) {
    var teamChosen=teamChosenFinal.split(',');
    timeCheck();
    if(teamChosen.length===5) {
        sessionStorage.setItem('teamChosen',teamChosenFinal.toString());
        progressIncrement();
        $('.stock-input').hide();
        $('.menubar').hide();
        $('.all-players').hide();
        $('.players').hide();
        $('#stock-chosen').hide();
        $('#stock-chosen').attr('id','pay-game');
        $('#pay-game').show();
        $('.act-ive').addClass('in-active');
        $('.in-active').removeClass('act-ive');
        $('h3').hide();
        $('h5').hide();
        $('#pay-game').prepend('<h5 align="center" style="color:lightblue;margin: 0;">SELECT A CAPTAIN (SCORE OF CAPTAIN DOUBLES)</h5>');
        $('#pay-game').prepend('<h3 align="center" style="padding:5px;color:white;margin: 0;">REVIEW YOUR TEAM AND PAY POOL</h3>');
        teamPlayers();
    }
}
function timeCheck() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var shouldPlay=this.responseText;
            console.log(shouldPlay);
            if(shouldPlay=='stop'){
                swal({
                    title:"Play stopped due to rain",
                    text:"It seems you were late in selecting a team",
                    type: "warning",
                    allowClickOutside: false,
                    button:"Try next time",
                })
                    .then((stop)=>{
                        if(stop){
                            location.replace('stock_cricket.php');
                        }
                    })
            }
        }
    };
    xmlhttp.open("GET", "time_check.php?q="+format+","+ tourSelected, true);
    xmlhttp.send();
}
function teamPlayers() {
    var teamChosen=[];
    teamChosen=sessionStorage.getItem('teamChosen').split(',');
    for(i=0;i<5;i++){
        $('#pay-game').append("<div class='players' ><div class='stock-container' onclick='capSelected(this)'>"+teamChosen[i]+"</div></div>");
    }
    $('#pay-game').append("<button class='act-ive'>Pay pool</button>");
}
function capSelected(x) {
    var pool;
    timeCheck();
    if(x.id!=='captain'){
        $(x).css('background-color','#11943d');
        $(x).css('color','white');
        $('#captain').css('color','black');
        $('#captain').css('background-color','#ddd');
        $('#captain').attr('id',"");
        $(x).attr('id','captain');
        var cap=$(x).text();
        var team=[];
        team=sessionStorage.getItem('teamChosen').split(',');
        var index = team.indexOf(cap);
        if (index > -1) {
            team.splice(index, 1);
        }
        team.unshift(cap);
        team=team.toString();
        sessionStorage.setItem('teamChosen',team);
        if(format==='t20'){
            pool=30;
        }else if(format==='odi'){
            pool=40;
        }else{
            pool=50;
        }
        $('.act-ive').on('click',function (cap) {
            if(cap!==null){
                swal({
                    title: "Do you wish to confirm your team and pay pool x-money?",
                    text: pool+" x-money will be deducted from your x-wallet",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willPay) => {
                        if (willPay) {
                            var team=sessionStorage.getItem('teamChosen');
                            var match_id=tourSelected;
                            var XMLHttp = new XMLHttpRequest();
                            XMLHttp.onreadystatechange=function(){
                                if (this.readyState === 4 && this.status === 200) {
                                    var resText=this.responseText;
                                    progressIncrement();
                                    $('#pay-game').hide();
                                    if(resText==="You have successfully registered for this game"){
                                        swal({
                                            title: resText,
                                            icon: "success",
                                            button:'Ok',
                                        })
                                            .then((ok)=>{
                                                if(ok){
                                                    location.replace('stock_cricket.php');
                                                }
                                            });
                                    }
                                    else{
                                        swal({
                                            title: "Could not complete registration",
                                            text:"You dont have sufficient x-money in your wallet",
                                            icon: "error",
                                            button:'Earn more',
                                        })
                                            .then((Earn)=>{
                                                if(Earn){
                                                    location.replace('main.php');
                                                }
                                            });
                                    }
                                }
                            };
                            XMLHttp.open("POST", "stock_reg.php?q=" + match_id+'*'+team, true);
                            XMLHttp.send();
                        } else {
                            swal({
                                title: "Could not complete registration",
                                icon: "error",
                            });
                        }
                    });
            }
        });
    }
}
function reg_comp() {
    timeCheck();
    var team=sessionStorage.getItem('teamChosen');
    var match_id=tourSelected;
    var XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange=function(){
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('succ-reg').innerHTML=this.responseText;
            progressIncrement();
            $('#succ-reg').show();
            $('h3').show();
            $('h5').show();
            $('.in-active').addClass('act-ive');
            $('.act-ive').removeClass('in-active');
        }
    };
    XMLHttp.open("POST", "stock_reg.php?q=" + match_id+'*'+team, true);
    XMLHttp.send();
}
function search(){
    var players=document.getElementsByClassName('players');
    var input = document.getElementById('company-name');
    var input1 = document.getElementById('company-name-1');
    var filter;
    if(input===document.activeElement){
        filter = input.value.toUpperCase();
    }
    else{
        filter = input1.value.toUpperCase();
    }
    for (i = 0; i < players.length; i++) {
        var stockContainer = players[i].getElementsByTagName('div');
        var stockName= stockContainer[0].getElementsByTagName('span')[0];
        var symbolName= stockContainer[0].getElementsByTagName('span')[1];
        var symbol=symbolName.innerText.replace('(','');
        symbol=symbol.replace(')','');
        var txtValue = stockName.textContent || stockName.innerText;
        txtValue+=symbol;
        if (txtValue.toUpperCase().indexOf(filter)>-1) {
            players[i].style.display = "";
        } else {
            if(players[i].parentElement.className==="all-players") {
                players[i].style.display = "none";
            }
        }
    }
}
function randomSelection(x) {
    for(i=$('#stock-chosen').children().length;i<($('#stock-chosen').children().length+5);i++) {
        if(x.value==='Automatic'){
            var randNum=Math.round(Math.random()*100);
            var e=document.getElementsByClassName('players');
            dragElement(e[randNum]);
        }
    }
}
function sort(x) {
    var sortOrder=x.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("all-players").innerHTML = this.responseText;
            caretUpDown();
        }
    };
    xmlhttp.open("GET", "stock_show.php?q=" + sortOrder, true);
    xmlhttp.send();
}
function caretUpDown() {
    var stockChange = document.getElementsByClassName('stock-change');
    for (i = 0; i < stockChange.length; i++) {
        var value = document.getElementsByClassName('stock-change')[i].textContent;
        value = value.replace('%', '');
        if (parseFloat(value) > 0) {
            stockChange[i].children[0].setAttribute('class', 'fa fa-caret-up');
            stockChange[i].setAttribute('style', 'color:#00862d');
        } else if (parseFloat(value) < 0) {
            stockChange[i].children[0].setAttribute('class', 'fa fa-caret-down');
            stockChange[i].setAttribute('style', 'color:#c00');
        } else {
            stockChange[i].children[0].setAttribute('style', 'color:#dddddd');
        }
    }
}
function showLB(matchID) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("leaderboard").innerHTML = this.responseText;
            $('.leaderboard').show();
        }
    };
    xmlhttp.open("GET", "leaderboard_show.php?q=" + matchID, true);
    xmlhttp.send();
}
function closeLB() {
    $('.leaderboard').hide();
}
function tnc() {
    var htp="1. This is a virtual stock market cricket game." +
        "<br>2. This game does not use real money for playing. But the benefits can be used to avail attractive discounts on other purchases." +
        "<br>3. Every user can play any/all of the three format(s) of the cricket game." +
        "<br>4. T20 matches are shorter matches with faster returns for the impatient. They are held every weekday from 9:15 AM to 11:00 AM." +
        "<br>5. ODI matches are a day long tournament for higher returns. They are held every weekday from 9:15 AM to 3:30 PM." +
        "<br>6. Test matches are week long tournaments for testing the patience of the player. The returns are the highest in these matches. They are held once a week from 9:15 AM Monday to 3:30 PM Friday." +
        "<br>7. Once a match is selected, a user gets a list of top 101 companies out of which 5 companies in total have to be selected." +
        "<br>8. A player can sort the list as per his need." +
        "<br>9. A player, if confused between selecting the companies or lacks time, can choose to automatically select the companies." +
        "<br>10. Once the company list is final, a player will be prompted to select a captain. The role of the captain company is to double its score." +
        "<br>11. The score will be calculated based on the percentage price change of every company in the player's team and a cumulative score will be calculated." +
        "<br>12. At the end of the tournament, a leaderboard will be declared and x-money would be distributed to the top 50% participants in decreasing fashion from top to bottom of the leaderboard." +
        "<br>13. x-money received can be used to purchase coupons which can be used to avail attractive offers.";
    Swal.fire({
        title: 'How to play',
        html:htp,
        type: 'info',
    })
}