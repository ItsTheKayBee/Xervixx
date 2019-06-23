filterSelection('all');
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c === "all"){
        c = "";
        if(document.getElementById('feed-container').style.display==="none"&& window.innerWidth>750){
            document.getElementById('feed-container').style.display="block";
            document.getElementsByClassName('flip')[0].setAttribute('class','fa fa-caret-down flip down');
        }
        else{
            document.getElementById('feed-container').style.display="none";
            document.getElementsByClassName('flip')[0].setAttribute('class','fa fa-caret-down flip');
        }
    }
    for (i = 0; i < x.length; i++) {
        removeClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
}
function addClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) === -1) {
            element.className += " " + arr2[i];
        }
    }
}
function removeClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}
var tabLayout = document.getElementById("tabLayout");
var btns = tabLayout.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}
function scoreLayout(x){
    if(x.parentElement.id==="closeScoreLayout"){
        x.parentElement.setAttribute("id","openScoreLayout");
        var cont=document.getElementById("container-div");
        cont.style.display="block";
        var xmoney=document.getElementById("x-money-div");
        xmoney.style.display="block";
        var spc= document.getElementById("small-progress-circle");
        spc.style.display="none";
        var btc=document.getElementById('display-btc');
        btc.style.display="none";
        if(window.innerWidth<750){
            document.getElementById("tabLayout").style.display="none";
            var contact=document.getElementById('contact');
            contact.style.display="none";
        }
    }else{
        x.parentElement.setAttribute("id","closeScoreLayout");
        document.getElementById("container-div").style.display="none";
        document.getElementById("x-money-div").style.display="none";
        document.getElementById('small-progress-circle').style.display="block";
        document.getElementById('display-btc').style.display="block";
        document.getElementById('tabLayout').style.display="block";
        if(window.innerWidth<750)
            document.getElementById('contact').style.display="block";
    }
}
$(window).on('resize', function(){
    if ($(window).width()>750 && $(window).height()>310){
        $("#contact").hide();
    }
    else{
        $("#contact").show();
    }
});
$(window).on('resize load', function() {
    if (window.innerWidth < 750) {
        console.log("ku");
        $(".feed-feed").on("click", function () {
            $("#feed-container-icon").show();
        });
        $(".feed-feed").hover(
            function (e) {
                $("#feed-container-icon").show();
            },
            function (e) {
                $("#feed-container-icon").hover(
                    function (e) {
                        $("#feed-container-icon").show();
                    },
                    function (e) {
                        $("#feed-container-icon").hide();
                    }
                );
                $("#feed-container-icon").hide();
            }
        );
        $("#feed-container-icon").on("click", function () {
            $("#feed-container-icon").hide();
        });
        $(document).scroll(function () {
            $('#feed-container-icon').hide();
        });
    }
});
$(document).ready(function () {
    $('#contact').click(function () {
        $('#lower-menu-dropdown').show();
    });
    $(document).scroll(function () {
        $('#lower-menu-dropdown').hide();
    });
    $("#contact").hover(
        function (e) {
            $("#lower-menu-dropdown").show();
        },
        function (e) {
            $("#lower-menu-dropdown").hover(
                function (e) {
                    $("#lower-menu-dropdown").show();
                },
                function (e) {
                    $("#lower-menu-dropdown").hide();
                }
            );
            $("#lower-menu-dropdown").hide();
        }
    );
});