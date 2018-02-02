function shrinkPaginator() {
    var $viewport = $(window).width();
    var $paginator = $('ul.pagination');

    if ($viewport < 440) {
        $paginator.addClass('pagination-sm');
    } else {
        $paginator.removeClass('pagination-sm');
    }
}

function main() {
    // var $misc = $('.news-preview-misc');
    // $misc.each(function(){
    // 	$targetHeight = $(this).prev().height();
    // 	$(this).height($targetHeight);
    // });


// *** News images appearing on viewport entry ***
// 	pass each news image container to the "in viewport checker" to get its position
    var $newsImageBox = $('.post-image-container');
    $newsImageBox.each(function () {
        if (inPartialViewport($(this), 100)) {
            $(this).find('img').addClass('appear');
        }
    });

// 	repeat to make it work on scroll as well
    $(window).scroll(function () {
        $newsImageBox.each(function () {
            if (inPartialViewport($(this), 100)) {
                $(this).find('img').addClass('appear');
            }
        });
    });


// *** SCROLLTOP ***

    // first, make scrolltop button visible only when there's an offset
    $scrolltopButton = $('#scrollTop');
    $(window).scroll(function () {
        if (getWindowOffset()[0] > 200) {
            $scrolltopButton.addClass('appear');
        }
        else {
            $scrolltopButton.removeClass('appear');
        }
    });

    // next, make it go *SMOOTHLY*  to page top on click
    $scrolltopButton.on('click', function (e) {
        // $(window).scrollTop(0);
        $("html, body").animate({scrollTop: 0}, 1500);
        // e.preventDefault();
    });

// *** Paginator ***
    shrinkPaginator();

// *** PUSH FOOTER TO THE BOTTOM OF THE PAGE IF THE CONTENT IS NOT HIGH ENOUGH ***
    var docHeight = $(window).height();
    var footerHeight = $('#footer').height();

    var footerTop = $('#footer').position().top + footerHeight;
    if (footerTop < docHeight) {
        $('#footer').css('margin-top', (docHeight - footerTop) + 'px');
    }
}

$(document).ready(main);

$(window).resize(shrinkPaginator);
