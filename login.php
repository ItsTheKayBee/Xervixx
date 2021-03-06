<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(isset($_SESSION['user_id'])){
        header('Location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" type="text/css" href="feed-style.css">
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>LOGIN</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<div id="top_navbar_container">
    <img src="xervixx-logo.png" alt="logo" id="logo">
</div>
<form class="login-form" name="myForm" id="login-form" method="post" action="login_check.php">
    <h1>LOGIN</h1>
    <div>
        <div class="styles">
            <input type="text" name="Username" pattern="^[a-zA-Z0-9]+$" placeholder="Username" autocomplete="off" id="nid" required>
        </div>
        <div class="styles">
            <input type="password" name="Password" pattern="[A-Za-z0-9]{3,}" placeholder="Password" id="pid" required>
        </div><br>
        <input type="submit" name="submit" value="LOGIN">
        <a onclick="verification()" href="#" id="forgot_pwd">FORGOT PASSWORD?</a>
    </div>
</form>
<form id="pwdc-form" class="login-form" name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
        <div class="styles">
            <input type="tel" name="phone" pattern="^[0-9]{10}+$" placeholder="Phone number" autocomplete="off" required>
        </div>
        <div class="styles">
            <input type="password" name="otp" pattern="(?=.*\d)(?=.*[a-zA-Z0-9])(?=.*[a-zA-Z0-9]).{3,}" placeholder="Enter OTP" required>
        </div><br>
        <input type="submit" name="submit" value="LOGIN">
    </div>
</form>
</body>
<footer>
    <script src="login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</footer>
</html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xervixx";
    $con = new mysqli($servername,$username,$password,$dbname);
    if ($con->connect_error)
    {
        die('No connection: ' . $con->connect_error);
    }
    if(isset($_POST['submit'])) {
        $phone = $_POST['phone'];
        $otp = $_POST['otp'];
        if ($otp == '123') {
            $otp_validation_query = "SELECT * FROM user where contact='" . $phone . "'";
            $result = $con->query($otp_validation_query);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $user_id = $row['user_id'];
                $loan_taken = $row['loan_taken'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['loan_taken'] = $loan_taken;
                echo '<script>
                swal({
                    title: "Logged in successfully!",
                    icon: "success",
                    button:"OK"
                })
                    .then((Ok) => {
                        if (Ok) {
                            location.replace("home.php");
                        }
                    });
                </script>';
        } else {
            echo '<script>
                swal({
                    title: "Incorrect Phone number",
                    text: "Please re-enter",
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
    } else {
        echo '<script>
            swal({
                title: "Incorrect OTP",
                text: "Please re-enter OTP",
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