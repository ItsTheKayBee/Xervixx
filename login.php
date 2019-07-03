<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="xervixx";

$con=mysqli_connect($host,$user,$password);
if($con)
{
    echo "";
}
else
{
    die("Connection failed".mysqli_connect_error());
}
mysqli_select_db($con,$db);

if(isset($_POST['submit'])){
    $uname=$_POST['Username'];
    $password=$_POST['Password'];

    $query="SELECT * FROM user where username='".$uname."'AND password='".md5($password)."'limit 1";
    $result=mysqli_query($con,$query);

    $loan_query="SELECT loan_taken FROM user";
    $loan_result=mysqli_query($con,$loan_query);
    $loan_query="SELECT loan_taken FROM user where username=$uname";
    $loan_result=mysqli_query($con,$loan_query);

    if(mysqli_num_rows($result)==1)
    {
        if($loan_result["loan_taken"]==1)
        {
            header('location:main.html');
        }
        else{
            header('location:feed1.php');
        }
    }
    else{
        echo "Incorrect Username/Password!";
        exit();
    }
}
?>

<html>
<title>SIGNIN</title>
<head>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form class="login-form" name="myForm" id="myForm" method="post" autocomplete="off" action="">
    <h1>LOGIN</h1>
    <div class="styles">
        <input type="text" name="Username" placeholder="Username" id="nid">
    </div>
    <div class="styles">
        <input type="password" name="Password" placeholder="Password" id="pid">
    </div><br>
    <input type="submit" name="submit" value="LOGIN" >
    <p>FORGOT PASSWORD?</p>
</form>
</body>
</html>