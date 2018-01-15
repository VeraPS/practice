

clickOnRowBP();
loginWindow();


function clickOnRowBP() {
    $('.vacant-header').click(function(e) {
        e.preventDefault();
        $('.vacant-content').toggleClass("vacant-content-hide");
    })
}

function loginWindow() {
    $('#login').click(function(e) {
        e.preventDefault();
        $('.loginForm-container').toggleClass("loginForm-container-hide");
    })
}