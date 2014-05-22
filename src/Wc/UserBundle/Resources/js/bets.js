$('.bets').click(function() {
    var $elm = $(this);
    var id = $elm.data('matchid');
    var title = $elm.attr('title');
    var modal = $('#betmodal');
    var $value = $('#bet_point_' + id);

    modal.find('.modal-title').html(title);
    modal.find('.modal-body p:nth-child(2)').html(
        '<input id="slider_' + id + '" type="text" data-slider-min="0" data-slider-max="250" data-slider-step="10" data-slider-value="' + ($value.val() != "" ? $value.val() : 0) + '" />'
    );
    modal.modal('show');

    $('#slider_' + id).slider({
        formater: function (value) {
            $elm.attr('title', title + ' : Points ' + value);
            $value.val(value);
            return value;
        }
    })

});