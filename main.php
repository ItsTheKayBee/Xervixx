<!DOCTYPE html>
<html lang="en">
<title>XERVIXX</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {font-family: "Lato", sans-serif}
    p{cursor: default}
</style>
<body>
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)"  title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="#loan" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOAN</a>
        <a href="#stock_cricket" class="w3-bar-item w3-button w3-padding-large w3-hide-small">STOCK CRICKET</a>
        <a href="#emi" class="w3-bar-item w3-button w3-padding-large w3-hide-small">EMI</a>
        <a href="#feed" class="w3-bar-item w3-button w3-padding-large w3-hide-small">FEED</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">LOG IN</a>
        <a href="register.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">REGISTER</a>
    </div>
</div>
<div id="mobile-navbar" class=  "w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="#loan" class="w3-bar-item w3-button w3-padding-large" >LOAN</a>
    <a href="#stock_cricket" class="w3-bar-item w3-button w3-padding-large" >STOCK CRICKET</a>
    <a href="#emi" class="w3-bar-item w3-button w3-padding-large" >EMI</a>
    <a href="#feed" class="w3-bar-item w3-button w3-padding-large" >FEED</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large" >CONTACT</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large" >LOG IN</a>
    <a href="register.php" class="w3-bar-item w3-button w3-padding-large" >REGISTER</a>
</div>
<div class="w3-content" style="max-width:2000px;margin-top:46px">
    <div class="w3-padding-32"></div>
    <div class="w3-container w3-black w3-content w3-center" style="max-width:800px;padding-top: 30px" id="band">
        <img class="w3-center" alt="xervixx-logo" src='xervixx-logo.png' style="z-index:30;width: 400px;height: 120px">
        <p class="w3-opacity"><i>WE LOVE TO SEE YOUR DREAMS COME TRUE</i></p>
        <p class="w3-justify"></p>
        <div class="w3-row-padding" style="padding-top: 30px;font-weight: bolder">
            <div class="w3-quarter w3-col w3-card-4 w3-black w3-hover">
                <p CLASS="w3-wide">PROTECTING</p>
                <img src="" class="w3-round w3-margin-bottom" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p class="w3-wide">INVESTING</p>
                <img src="" class="w3-round w3-margin-bottom" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p class="w3-wide">FINANCING</p>
                <img src="" class="w3-round" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p class="w3-wide">ADVISING</p>
                <img src="" class="w3-round" alt="" style="width:60%">
            </div>
        </div>
    </div>
    <div class="w3-padding-32"></div>
    <div class="w3-black" id="loan">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h1 class="w3-center w3-wide">LOAN</h1>
            <p class="w3-opacity w3-center"><i>BECOME A LIFELONG MEMBER</i></p><br>
            <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                <div class="w3-container w3-white">
                    <p><b>Personal loan</b></p>
                    <p class="w3-opacity"></p>
                    <p>At interest rates lower than any other company</p>
                    <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Apply now</button>
                </div>
            </div>
        </div>
    </div>
    <div id="ticketModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal w3-center w3-padding-32">
        <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
                <h2 class="w3-wide">Loan</h2>
            </header>
            <div class="w3-container">
                <p><label><i class="fa fa-dollar"></i> Enter loan amount</label></p>
                <input class="w3-input w3-border" type="text" placeholder="How much?">
                <p><label><i class="fa fa-user"></i> Enter profession</label></p>
                <input class="w3-input w3-border" type="text" placeholder="Sales executive, developer, etc">
                <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">Apply <i class="fa fa-check"></i></button>
                <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
                <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
            </div>
        </div>
    </div>
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="stock_cricket">
        <h2 class="w3-wide w3-center">STOCK CRICKET</h2>
        <p class="w3-opacity w3-center"><i>MAKING THE SHARE MARKET INTERESTING FOR ALL!</i></p>
        <div class="w3-row w3-center w3-padding-32">
            <div class="w3-col w3-third">
                <img src="cricket.png"  width="120px">
                <p>SELECT A FORMAT OF CRICKET (T20, ODI, TEST)</p>
            </div>
            <div class="w3-col w3-third">
                <img src="bar.png" width="120px">
                <p>MAKE THE BEST SHARE MARKET TEAM</p>
            </div>
            <div class="w3-col w3-third">
                <img src="rupee.png" width="120px">
                <p>EARN EXCITING REWARDS!</p>
            </div>
        </div>
    </div>
    <div class="w3-black" id="feed">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center">THE FEED</h2>
            <p class="w3-opacity w3-center"><i>PERSONALIZED AND UNIQUELY DESIGNED FEED FOR ENGAGING EVEN THE NON-INTERESTED!</i></p><br>
            <div class="w3-row w3-center w3-padding-32">
                <div class="w3-col w3-third">
                    <img src="blog.png" width="120px">
                    <p>READ INTERESTING AND INFORMATIVE POSTS ON WHAT IS GOING ON AROUND IN THE FINANCE INDUSTRY</p>
                </div>
                <div class="w3-col w3-third">
                    <img src="group.png" width="120px">
                    <p>NETWORK WITH PEOPLE FROM ACROSS THE COUNTRY</p>
                </div>
                <div class="w3-col w3-third">
                    <img src="recommendation.png" width="120px">
                    <p>STANDOUT FROM OTHERS BY COMPETING GLOBALLY AND AVAIL EXCITING OFFERS!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="emi">
        <h2 class="w3-wide w3-center">EASY MONTHLY INSTALLMENTS- THE GAME</h2>
        <p class="w3-opacity w3-center"><i>GOTTA WIN EVERY LEVEL!</i></p>
        <div class="w3-row w3-center w3-padding-32">
            <div class="w3-col w3-third">
                <img src="rate.png"  width="120px">
                <p> PAY ALL EMIs ON TIME TO GET STARS</p>
            </div>
            <div class="w3-col w3-third">
                <img src="success.png" width="120px">
                <p>REACH AT THE TOP OF THE LEADERBOARD</p>
            </div>
            <div class="w3-col w3-third">
                <img src="money.png" width="120px">
                <p>GET CASHBACK ON YOUR LOAN</p>
            </div>
        </div>
    </div>
    <div class="w3-black" id="feed">
        <h2 class="w3-wide w3-center">CONTACT</h2>
        <p class="w3-opacity w3-center"><i>WE WOULD LOVE TO HEAR FROM YOU!</i></p>
        <div class="w3-container w3-content w3-padding-64" style="width: 120%" id="contact">
            <div class="w3-row w3-padding-32">
                <div class="w3-col m6 w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker" style="width:30px"></i> Mumbai, India<br>
                    <i class="fa fa-phone" style="width:30px"></i> Phone: +91 1234567890<br>
                    <i class="fa fa-envelope" style="width:30px"> </i> Email: support@xervixx.com<br>
                </div>
                <div class="w3-col m6">
                    <form target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                        <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">xervixx.com</p>
</footer>

<script>
    var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
