function main() {
    // *** SMOOTHLY SCROLL TO SHOW FROM JUMBOTRON LINKS ***
    $showShortcut = $('.shows-full-list-item');
    $showShortcut.on('click', function (e) {
        $(e.preventDefault());
        var shortcut = '#' + $(this).attr('id');
        var target = $(this).data('target');
        console.log(shortcut + ' has target ' + target);
        $('html, body').animate({
            scrollTop: $('#' + target).offset().top - 65
        }, 1200);
    });

    // *** YouTube MODAL ***
    // fix the bugs with modal opening (backdrop, scroll, scrolltop button)
    $('#videoModal').on('shown.bs.modal', function () {
        $('#scrollTop').hide();
        $(this).css('overflow', 'hidden');
        $('.modal-backdrop.fade').removeClass('show').addClass('in');
    });

    // When video button is clicked, modal is opened
    // and ajax call retrieves the video and all related videos
    $(".video-button").on('click', function (e) {
        $(e.preventDefault());
        // load the default video (data stored in the video button)
        loadvideo($(this).data('video'));

        function loadvideo($ytid) {
            var $iframe = $('#iframeYT');
            var src = 'https://www.youtube.com/embed/' + $ytid + '?rel=0';
            $iframe.attr('src', src);
            retrieveVideoId();
        }

        function retrieveVideoId() {
            return $currentVideoId = $('#iframeYT').attr('src').substr(-17, 11);
        }

        var $xhr = new XMLHttpRequest();

        var $showId = $(this).data('show-id');
        $xhr.open("GET", "/api/shows/videos?show=" + $showId, true);

        // output to store the list of related videos
        var $output = '';
        $xhr.onload = function () {
            $relatedVideos = JSON.parse(this.responseText);

            var $related = $('.modal-footer ul');
            for (var i in $relatedVideos) {
                $output += '<li>' +
                    '<a class="play-video" href="#"' +
                    'data-video="' + $relatedVideos[i].ytid + '"' +
                    'data-show-id="1">' +
                    $relatedVideos[i].name
                    + '</a>' +
                    '</li>';
            }
            // add related videos to the list
            $related.html($output);

            // add 'active' class to the name of the video currently playing
            $('.play-video').each(function () {
                if ($(this).data('video') == $currentVideoId) {
                    $('.play-video').removeClass('active');
                    $(this).addClass('active');
                }
            });

            // load related video and add 'active' class
            $('.play-video').on('click', function (e) {
                $(e.preventDefault());
                loadvideo($(this).data('video'));
                $('.play-video').each(function () {
                    if ($(this).data('video') == $currentVideoId) {
                        $('.play-video').removeClass('active');
                        $(this).addClass('active');
                    }
                });
            })
        }

        $xhr.send();
    });

    // stop playing video when modal is closed and show the scrolltop button
    $("#videoModal").on("hidden.bs.modal", function () {
        $("#iframeYT").attr("src", "#");
        $('#scrollTop').show();
    });


    // *** PARAGRAPHS AND IMAGES APPEARING ON VIEWPORT ENTRY ***
    // 	pass each paragraph container to the "in viewport checker" to get its position
    var $showsParagraph = $('#shows-content .show-box .paragraph');
    var $showsMisc = $('#shows-content .show-box .shows-misc');
    $showsParagraph.each(function () {
        if (inPartialViewport($(this), 150)) {
            $(this).addClass('appear');
        }
    });
    $showsMisc.each(function () {
        if (inPartialViewport($(this), 150)) {
            $(this).find('img').addClass('appear');
        }
    });

    //  make it work on scroll as well
    $(window).scroll(function () {
        $showsParagraph.each(function () {
            if (inPartialViewport($(this), 150)) {
                $(this).addClass('appear');
            }
        });
        $showsMisc.each(function () {
            if (inPartialViewport($(this), 150)) {
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
        $("html, body").animate({scrollTop: 0}, 1200);
        $(e.preventDefault());
    });
}

$(document).ready(main);