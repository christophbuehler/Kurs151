$(function() {
    $('#showNavBtn').on('mousedown', function() {

        if ($('#navContainer').attr('data-show') == 'true') {
            $('#navContainer').attr('data-show', 'false');
            $('#wrapper').css({'transform':'translate3d(0, 0, 0)'});
            $('#showNavBtn').css({'transform':'rotate(0)'});
            return;
        }
        $('#wrapper').css({'transform':'translate3d(-140px, 0, 0)'});
        $('#navContainer').attr('data-show', 'true');
        $('#showNavBtn').css({'transform':'rotate(90deg)'});
    });
});