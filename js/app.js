

clickOnRowBP();



function clickOnRowBP() {
    $('.vacant-header').click(function(e) {
        e.preventDefault();
        $('.vacant-content').toggleClass("vacant-content-hide");
    })
}
