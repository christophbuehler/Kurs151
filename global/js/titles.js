$(function() {
    var title = document.createElement('div'), tOut;
    $(title).attr('id', 'title');
    $('body').append(title);
    $('body').on('mouseover', '[data-title]', function() {
        clearTimeout(tOut);
        $('#title').html($(this).attr('data-title'));
        $('#title').css({
            'display':'inline-block',
            'left':($(this).offset().left + $(this).outerWidth() + 4) + 'px',
            'top':($(this).offset().top + $(this).outerHeight()/2 - $('#title').outerHeight()/2) + 'px'
        });

        setTimeout(function() {
            $('#title').css({'opacity':'1'});
        }, 10);
        tOut = setTimeout(function() {
            $('#title').css({'opacity':'0'});
            setTimeout(function() {
                $('#title').css({'display':'none'});
            }, 200);
        }, 2000);
    });
});