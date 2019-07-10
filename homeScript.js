$('.emi_tracker').ready(function() {
    $('.emi_tracker').animate({
        scrollLeft: $('.upnext').offset().left
    }, 1000, function() {
    });
});
function logout() {
    swal({
        title: "Are you sure?",
        text: "You will be logged out",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willLogOut) => {
            if (willLogOut) {
                swal("You have been logged out!", {
                    icon: "success",
                    button:'ok',
                })
                    .then((ok)=>{
                        if(ok){
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    location.replace('main.php');
                                }
                            };
                            xmlhttp.open("POST", "logout.php?q=true", true);
                            xmlhttp.send();
                        }
                    });
            } else {

            }
        });
}

