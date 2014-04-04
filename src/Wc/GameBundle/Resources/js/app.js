$('.teamname').hover(function() {
    $('.teamname[data-teamid="' + $(this).data("teamid") + '"').addClass('hover');
}, function() {
    $('.teamname').removeClass('hover');
});