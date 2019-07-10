<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>REGISTER</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<form class="login-form" name="myForm" id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>REGISTER</h1>
    <div>
        <div class="styles">
            <input type="text" name="name" pattern="^[a-zA-Z ,.'-]+$" placeholder="FULL NAME" autocomplete="off" id="nid" required>
        </div>
        <div class="styles">
            <input type="text" name="Username" pattern="^[a-zA-Z0-9]+$" placeholder="USERNAME" autocomplete="off" required>
        </div>
        <div class="styles">
            <input type="text" name="phone" pattern="^[0-9]{10}" placeholder="PHONE" autocomplete="off" required>
        </div>
        <div class="styles">
            <input type="password" name="Password" pattern="[A-Za-z0-9]{3,}" placeholder="PASSWORD" id="pid" required>
        </div>
        <div class="styles">
            <input type="text" name="referral" pattern="^[a-zA-Z]+$" placeholder="HAVE A REFERRAL CODE?">
        </div><br>
        <input type="submit" name="submit" value="SIGN UP">
        <a href="login.php">ALREADY A USER?</a>
    </div>
</form>
</body>
<footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
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
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $refer=$_POST['referral'];
    $user_validation_query="SELECT * FROM user where username='".$uname."'";
    $result=$con->query($user_validation_query);
    if($result->num_rows==1){
        echo '<script>
        swal({
                title: "You are already a user. Log in!",
                icon: "warning",
                button:"Ok"
                })
                .then((Ok) => {
                    if (Ok) {
                        location.replace("login.php");
                    }
                 });
                </script>';
    }
    else{
        $ref_money=0;
        if($refer!=null){
            $refer_sql="select * from user where referral_code='".$refer."'";
            $refer_res=$con->query($refer_sql);
            if($refer_res->num_rows==1){
                $ref_money=100;
                $ref=$refer_res->fetch_assoc();
                $ref_x_money=$ref['x_money'];
                $ref_x_money+=100;
                $user_insertion_query="update user set x_money=".$ref_x_money." where referral_code='".$refer."'";
                if($con->query($user_insertion_query)===true){
                    echo '<script>
                swal({
                        title: "Congrats! You and your friend have received 100-money coins",
                        icon: "success",
                        button:"Yay!"
                        })
                        </script>';
                }
            }
        }
        $password=md5($password);
        $x_money=$ref_money+100;
        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
        $referral_code=strtoupper(substr(str_replace($vowels,'',$name),0,6));
        $user_insertion_query="insert into user(name,username,contact,password,x_money,referral_code) values('".$name."','".$uname."','".$phone."','".$password."',".$x_money.",'".$referral_code."')";
        if($con->query($user_insertion_query)===true){
            $user_validation_query="SELECT * FROM user where username='".$uname."'";
            $result=$con->query($user_validation_query);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                $user_id=$row['user_id'];
                $loan_taken=$row['loan_taken'];
                $_SESSION['user_id']=$user_id;
                $_SESSION['loan_taken']=$loan_taken;
            }
            echo '<script>
            swal({
                title: "Logged in successfully!",
                icon: "success",
                button:"Ok"
            })
                .then((Ok) => {
                    if (Ok) {
                        location.replace("home.php");
                    }
                });
                </script>';
        }
    }
}
?>