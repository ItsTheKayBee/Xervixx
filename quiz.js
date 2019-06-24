function check(){
    var ans1=document.quiz_form.q1.value;
    var ans2=document.quiz_form.q2.value;
    var ans3=document.quiz_form.q3.value;
    var ans4=document.quiz_form.q4.value;
    var count=0;
    if(ans1=="abc"){
        count++;}
    if(ans2=="pqr"){
        count++;}
    if(ans3=="xyz"){
        count++;}
    if(ans4=="lmn"){
        count++;}

    document.getElementById("no_correct").innerHTML="YOU GOT "+count+" CORRECT!";

};