<?php
session_start();
include 'db_connect.php';
if(isset($_POST['submit'])){
    $uname=$_POST['Username'];
    $password=$_POST['Password'];
    if($uname==NULL){
        $phone=$_POST['phone'];
        $otp=$_POST['otp'];
    }
    if($uname!=NULL){
        $user_validation_query="SELECT * FROM user where username='".$uname."' AND password='".md5($password)."'";
        $result=$con->query($user_validation_query);
    }else if($otp=='123') {
        $otp_validation_query = "SELECT * FROM user where contact='" . $phone . "'";
        $result = $con->query($otp_validation_query);
    }
    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        $user_id=$row['user_id'];
        $loan_taken=$row['loan_taken'];
        $_SESSION['user_id']=$user_id;
        $_SESSION['loan_taken']=$loan_taken;
        header('Location: main.html');
    }
    else{
        echo "<script>alert('Incorrect Username or Password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>LOGIN</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<form class="login-form" name="myForm" id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>LOGIN</h1>
    <div>
        <div class="styles">
            <input type="text" name="Username" pattern="^[a-zA-Z0-9]+$" placeholder="Username" autocomplete="off" id="nid" required>
        </div>
        <div class="styles">
            <input type="password" name="Password" pattern="(?=.*\d)(?=.*[a-zA-Z0-9])(?=.*[a-zA-Z0-9]).{3,}" placeholder="Password" id="pid" required>
        </div><br>
        <input type="submit" name="submit" value="LOGIN">
        <a onclick="verification()" href="#">FORGOT PASSWORD?</a>
    </div>
</form>
<form id="pwdc-form" class="login-form" name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
        <div class="styles">
            <input type="tel" name="phone" pattern="^[0-9]+$" placeholder="Phone number" autocomplete="off" required>
        </div>
        <div class="styles">
            <input type="password" name="otp" pattern="(?=.*\d)(?=.*[a-zA-Z0-9])(?=.*[a-zA-Z0-9]).{3,}" placeholder="Enter OTP" required>
        </div><br>
        <input type="submit" name="submit" value="LOGIN">
    </div>
</form>
</body>
<script src="login.js"></script>
</html>