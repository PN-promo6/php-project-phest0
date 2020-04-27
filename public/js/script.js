var lastScrollTop = 0;
$(window).scroll(function () {
    var st = $(this).scrollTop();
    var banner = $('.banner');
    setTimeout(function () {
        if (st > lastScrollTop) {
            banner.addClass('hide');
        } else {
            banner.removeClass('hide');
        }
        lastScrollTop = st;
    }, 100);
});