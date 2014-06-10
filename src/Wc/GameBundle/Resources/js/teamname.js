$('.teamname').hover(function() {
    $('.teamname[data-teamid="' + $(this).data("teamid") + '"')
        .closest('td')
        .addClass('highlight')
        .end()
        .closest('div.bracket-player')
        .addClass('highlight')
    ;
}, function() {
    $('.teamname')
        .closest('td')
        .removeClass('highlight')
        .end()
        .closest('div.bracket-player')
        .removeClass('highlight')
    ;
});