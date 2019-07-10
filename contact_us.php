<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="contact_us.css">
    <link rel="stylesheet" href="feed-style.css">
    <link rel="stylesheet" href="home-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div id="contact_container">
        <form name="contact_form" id="contact_form">
            <h2>CONTACT US</h2>
            <div class="c_style">
                <input type="text" name="c_name" placeholder="Name"><br>
            </div>
            <div class="c_style">
                <input type="email" name="c_email" placeholder="Email"><br>
            </div>
            <div class="c_style">
                <input type="tel" name="c_contact" placeholder="Mobile Number"><br>
            </div>
            <p id="c_msg">Message:</p>
            <div>
                <textarea rows="4" cols="28"></textarea><br>
            </div>
            <input type="button" name="submit" onclick="feedBack()" value="SEND FEEDBACK">
        </form>
    </div>
</body>
<script>
    function feedBack(){
        Swal.mixin({
            input: 'text',
            confirmButtonText: 'Next',
            showCancelButton: true,
            progressSteps: ['1', '2', '3']
        }).queue([
            {
                title: 'Do you like the stock cricket game?',
            },
            'Do you find paying loans',
            'Do you find your feed personalized and informative?'
        ]).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Thank you for reaching to us!',
                    confirmButtonText: 'Request a Call!'
                })
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>