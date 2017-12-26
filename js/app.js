

clickOnRowBP();
hideLoginScreen();


function clickOnRowBP() {
    $('.vacant-header').click(function(e) {
        e.preventDefault();
        $('.vacant-content').toggleClass("vacant-content-hide");
    })
}

function hideLoginScreen() {
    $('.loginForm-container').click(function(e) {
        e.preventDefault();
        $('.loginForm-container').toggleClass("loginForm-hide");
    })
}
