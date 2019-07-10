let d='all';
let counter=0;
feed_post_update();
function feed_post_update() {
    var feed_update = function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                $('#feed-posts').html(this.responseText);
                filterSelection(d);
            }
        };
        xmlhttp.open("GET", "feed_updation.php", true);
        xmlhttp.send();
    };
    feed_update();
}
function filterSelection(c) {
    d=c;
    var x, i;
    x = document.getElementsByClassName("column");
    if (c === "all"){
        c = "";
    }
    for (i = 0; i < x.length; i++) {
        removeClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
}
function feedUpDown() {
    feed_post_update();
    if(counter===0){
        document.getElementById('feed-container').style.display="none";
        counter++;
    }
    if(document.getElementById('feed-container').style.display==="none"&& window.innerWidth>750){
        document.getElementById('feed-container').style.display="block";
        document.getElementsByClassName('flip')[0].setAttribute('class','fa fa-caret-down flip down');
    }
    else{
        document.getElementById('feed-container').style.display="none";
        document.getElementsByClassName('flip')[0].setAttribute('class','fa fa-caret-down flip');
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
        $('.fa-ellipsis-h').attr('class','fa fa-times-circle');
        var cont=document.getElementById("container-div");
        cont.style.display="block";
        var xmoney=document.getElementById("x-money-div");
        xmoney.style.display="block";
        if(window.innerWidth<750){
            document.getElementById("tabLayout").style.display="none";
            var contact=document.getElementById('contact');
            contact.style.display="none";
        }
    }else{
        x.parentElement.setAttribute("id","closeScoreLayout");
        $('.fa-times-circle').attr('class','fa fa-ellipsis-h');
        document.getElementById("container-div").style.display="none";
        document.getElementById("x-money-div").style.display="none";
        document.getElementById('tabLayout').style.display="block";
        if(window.innerWidth<750)
            document.getElementById('contact').style.display="block";
    }
}
$(window).on('resize', function(){
    if ($(window).width()>750){
        $("#contact").hide();
    }
    else{
        $("#contact").show();
    }
});
$(window).on('resize load', function() {
    if (window.innerWidth < 750) {
        $(".feed-feed").click(
            function () {
                if(window.innerWidth<750) {
                    $("#feed-container-icon").show();
                }
            }
        );
        $(".feed-feed").hover(
            function () {
                if(window.innerWidth<750) {
                    $("#feed-container-icon").show();
                }
            },
            function () {
                $("#feed-container-icon").hover(
                    function () {
                        $("#feed-container-icon").show();
                    },
                    function () {
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
function logout() {
    swal({
        title: "Are you sure?",
        text: "You will be logged out",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willLogOut) => {
            if (willLogOut) {
                swal("You have been logged out!", {
                    icon: "success",
                    button:'ok',
                })
                    .then((ok)=>{
                        if(ok){
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    location.replace('login.php');
                                }
                            };
                            xmlhttp.open("POST", "logout.php?q=true", true);
                            xmlhttp.send();
                        }
                    });
            } else {

            }
        });
}
function sendComment(btn,postId) {
    var comment=$(btn).prev().val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if(this.responseText=='comment added'){
                $(btn).prev().val('');
                commentAdded();
                feed_post_update();
            }
        }
    };
    xmlhttp.open("POST", "send_comments.php?q="+comment+","+postId, true);
    xmlhttp.send();
}
function commentAdded() {
    var x = document.getElementById("comment-toast");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
}
function addLike(emo,postId){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            feed_post_update();
        }
    };
    xmlhttp.open("POST", "add_like.php?q="+postId, true);
    xmlhttp.send();
}
function openComments(postId) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var comments=this.responseText;
            Swal.fire({
                title:"All comments",
                html:comments,
            })
        }
    };
    xmlhttp.open("POST", "view_comments.php?q="+postId, true);
    xmlhttp.send();
}
function showOLB() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("leaderboard").innerHTML = this.responseText;
            $('.leaderboard').show();
            $('.leaderboard').animate({
                scrollTop: $('.current').offset().top
            }, 1000, function() {
            });
        }
    };
    xmlhttp.open("GET", "overall_leaderboard_show.php?", true);
    xmlhttp.send();
}
function closeLB() {
    $('.leaderboard').hide();
}
function referral() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var code=this.responseText;
            console.log(code);
            Swal.fire({
                title: "Share and Earn",
                html:"Friend joins, friend earns 100 x-money<br>" +
                    "Friend plays his first stock cricket game, you earn 100 x-money.<br>" +
                    "Share your referral code: "+code,
                button: true,
            })
        }
    };
    xmlhttp.open("GET", "referral_code.php?", true);
    xmlhttp.send();
}

