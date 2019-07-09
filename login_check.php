<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xervixx";
$con = new mysqli($servername,$username,$password,$dbname);
if ($con->connect_error)
{
    die('No connection: ' . $con->connect_error);
}
session_start();
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
        echo '<script>
            swal({
                title: "Logged in successfully!",
                icon: "success",
                button:"Ok"
                })
                .then((Ok) => {
                    if (Ok) {
                        location.replace("main.php");
                    }
                });
                </script>';
    }
    else{
        echo '<script>
            swal({
                title: "Incorrect username or password",
                text: "Please check the username and password",
                icon: "warning",
                button: "Try Again",
            })
                .then((Ok) => {
                    if (Ok) {
                        location.replace("login.php");
                    }
                });
    </script>';
    }
}
?>


