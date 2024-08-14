$('.faq__question').on('click', function () {
    if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active');
        $(this).next().slideUp();
    } else {
        $(this).parent().addClass('active');
        $(this).next().slideDown();
    }
})