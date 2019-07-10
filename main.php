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
    .mySlides {display: none}
</style>
<body>
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="#loan" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOAN</a>
        <a href="#stock_cricket" class="w3-bar-item w3-button w3-padding-large w3-hide-small">STOCK CRICKET</a>
        <a href="#feed" class="w3-bar-item w3-button w3-padding-large w3-hide-small">FEED</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">LOG IN</a>
        <a href="register.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">REGISTER</a>
    </div>
</div>
<div id="mobile-navbar" class=  "w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="#loan" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">LOAN</a>
    <a href="#stock_cricket" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">STOCK CRICKET</a>
    <a href="#feed" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">FEED</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">LOG IN</a>
    <a href="register.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">REGISTER</a>
</div>
<div class="w3-content" style="max-width:2000px;margin-top:46px">
    <div class="mySlides w3-display-container w3-center">
        <img src="" style="width:100%">
        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
            <h3>Do you want to pursue higher education but cannot since you are short of money?</h3>
            <p><b>Personal Loans upto Rs 15 Lakhs</b></p>
        </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
        <img src="" style="width:100%">
        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
            <h3>DO you want to grow your business?</h3>
            <p><b>Business Loans upto Rs 15 Lakhs</b></p>
        </div>
    </div>
    <div class="mySlides w3-display-container w3-center">
        <img src="" style="width:100%">
        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
            <h3>Do you want to travel the world with your family?</h3>
            <p><b>Travel Loans upto Rs 15 Lakhs</b></p>
        </div>
    </div>
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
        <h2 class="w3-wide">XERVIXX</h2>
        <p class="w3-opacity"><i>We love to see your dreams come true</i></p>
        <p class="w3-justify"></p>
        <div class="w3-row-padding w3-padding-32">
            <div class="w3-quarter w3-col w3-card-4 w3-black w3-hover">
                <p>Protecting</p>
                <img src="" class="w3-round w3-margin-bottom" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p>Investing</p>
                <img src="" class="w3-round w3-margin-bottom" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p>Financing</p>
                <img src="" class="w3-round" alt="" style="width:60%">
            </div>
            <div class="w3-quarter w3-col w3-card-4 w3-black">
                <p>Advising</p>
                <img src="" class="w3-round" alt="" style="width:60%">
            </div>
        </div>
    </div>
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
        <span onclick="document.getElementById('ticketModal').style.display='none'"
              class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
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
                <p>Select a format of cricket (T20, ODI, TEST)</p>
            </div>
            <div class="w3-col w3-third">
                <img src="bar.png" width="120px">
                <p>Make your best team with companies as your players</p>
            </div>
            <div class="w3-col w3-third">
                <img src="rupee.png" width="120px">
                <p>Earn exciting rewards</p>
            </div>
        </div>
    </div>
    <div class="w3-black" id="feed">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center">THE FEED</h2>
            <p class="w3-opacity w3-center"><i>Personalized and uniquely designed feed for engaging even the non-interested</i></p><br>
            <div class="w3-row w3-center w3-padding-32">
                <div class="w3-col w3-third">
                    <img src="blog.png" width="120px">
                    <p>Read interesting and informative posts on what is going on around in the finance industry</p>
                </div>
                <div class="w3-col w3-third">
                    <img src="group.png" width="120px">
                    <p>Network with people from across the country</p>
                </div>
                <div class="w3-col w3-third">
                    <img src="recommendation.png" width="120px">
                    <p>Standout from others by competing globally and avail exciting offers</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">CONTACT</h2>
        <p class="w3-opacity w3-center"><i>WE WOULD LOVE TO HEAR FROM YOU!</i></p>
        <div class="w3-row w3-padding-32">
            <div class="w3-col m6 w3-large w3-margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Mumbai, India<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone: +91 1234567890<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email: support@xervixx.com<br>
            </div>
            <div class="w3-col m6">
                <form action="/action_page.php" target="_blank">
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
<footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Xervixx.com</p>
</footer>

<script>
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 4000);
    }
    function myFunction() {
        var x = document.getElementById("mobile-navbar");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
