filterSelection('all');
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c === "all"){
        c = "";
        if(document.getElementById('feed-container').style.display==="none"){
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
    }else{
        x.parentElement.setAttribute("id","closeScoreLayout");
        document.getElementById("container-div").style.display="none";
    }
}
