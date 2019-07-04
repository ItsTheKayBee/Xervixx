var tourSelected=0;
var format;
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
    format=matchFormat;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(matchFormat+"-"+session).innerHTML= this.responseText;
        }
    };
    xmlhttp.open("GET", "stock_match_updation.php?q=" + matchFormat+","+session, true);
    xmlhttp.send();
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
        $('#pay-game').prepend('<h5 align="center" style="color:lightblue;margin: 0;">Select a captain (score of captain doubles)</h5>');
        $('#pay-game').prepend('<h3 align="center" style="padding:5px;color:white;margin: 0;">Review your team and pay pool</h3>');
        teamPlayers();
    }
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
    if(x.id!=='captain'){
        $(x).css('background-color','#c00');
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
                var confirmReg=confirm("Do you wish to confirm your team and pay pool x-money?\nPool x-money: "+pool);
                if(confirmReg===true){
                    reg_comp();
                    $('#pay-game').hide();
                }
            }
        });
    }
}
function reg_comp() {
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
            stockChange[i].setAttribute('style', 'color:#55b776');
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