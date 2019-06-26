$(document).ready(function () {
    $("li.active").prevAll().addClass('checkedli');
    $("li.active").prevAll().removeClass('uncheckedli');
    if(sessionStorage.getItem('tourChosen')==='t20'||sessionStorage.getItem('tourChosen')==='odi'||sessionStorage.getItem('tourChosen')==='test'){
        matchSelect(sessionStorage.getItem('tourChosen'));
    }
    else{
        $('#t20').show();
    }
});
function matchDisplay(x) {
    $('button.active').removeClass('active');
    $(x).addClass('active');
    if($('button.active').attr('id')==='t20-b'){
        $('.tourney').hide();
        $('#t20').show();
    }else if($('button.active').attr('id')==='odi-b'){
        $('.tourney').hide();
        $('#odi').show();
    }else{
        $('.tourney').hide();
        $('#test').show();
    }
}
function matchSelect(match) {
    var tourChosen;
    sessionStorage.setItem(tourChosen,match);
    $('.tourney').hide();
    $('.tourney-menu').hide();
    $('.stock-select').show();
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
        var player=$(players[i]).find('.stock-container span:eq(0)').text();
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
$('.active')
function teamPlayers() {
    var teamChosen=[];
    teamChosen=sessionStorage.getItem('teamChosen').split(',');
    for(i=0;i<5;i++){
        $('#pay-game').append("<div class='players' ><div class='stock-container' onclick='capSelected(this)'>"+teamChosen[i]+"</div></div>");
    }
    $('#pay-game').append("<button class='act-ive'>Pay 50</button>");
}
function capSelected(x) {
    if(x.id!=='captain'){
        $(x).css('background-color','#c00');
        $(x).css('color','white');
        $('#captain').css('color','black');
        $('#captain').css('background-color','#ddd');
        $('#captain').attr('id',"");
        $(x).attr('id','captain');
        var cap=$(x).text();
        $('.act-ive').on('click',function (cap) {
            if(cap!==null){
                $('#pay-game').hide();
                progressIncrement();
                $('#succ-reg').show();
                $('h3').show();
                $('h5').show();
                $('.in-active').addClass('act-ive');
                $('.act-ive').removeClass('in-active');
            }
        });
    }
}
