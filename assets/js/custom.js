jQuery(document).ready(function ($) {
    $('#blog-titles li').on('click', function () {
        var postID = $(this).data('id');

        // Make clicked title active
        $('#blog-titles li').removeClass('active');
        $(this).addClass('active');

        // Load post content into the #post-content div
        $.ajax({
            url: ajax_vars.ajaxurl, // Use localized ajaxurl
            type: 'POST',
            data: {
                action: 'load_post_content',
                post_id: postID
            },
            success: function (response) {
                $('#post-content').html(response);
            }
        });
    });


    var headerHeight = $('.site-header').outerHeight() || 0; // Get sticky header height
    var adminBarHeight = $('body').hasClass('logged-in') ? 32 : 0; // Admin bar height
    var offset = headerHeight + adminBarHeight; // Total offset

    // Target TOC links inside the custom container
    $('.bd_toc_content_list a[href^="#"]').on('click', function (e) {
        e.preventDefault(); // Prevent default anchor click behavior
        var targetId = $(this).attr('href').substring(1); // Get the target ID without "#"
        var $targetElement = $('#' + targetId); // Find the target element by ID

        if ($targetElement.length) {
            // Calculate the scroll position
            var scrollPosition = $targetElement.offset().top - offset;

            // Smoothly scroll to the target
            $('html, body').animate(
                { scrollTop: scrollPosition },
                1000, // Animation duration in milliseconds
                function () {
                    // Remove .current class from all <li> elements
                    $('.bd_toc_content_list li').removeClass('current');

                    // Add .current class to the parent <li> of the clicked link
                    var $clickedLink = $('.bd_toc_content_list a[href="#' + targetId + '"]');
                    $clickedLink.closest('li').addClass('current');
                }
            );
        }
    });


    $('.testimonial-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,
        prevArrow: $('.testimonial-btn .left-btn'),
        nextArrow: $('.testimonial-btn .right-btn')
    });


    // 	var $stickySidebar = $(".bd_toc_container"); // Sticky sidebar container
    //     var $tocSection = $(".bd_toc_content_list_item"); // The entire TOC section

    //     if ($stickySidebar.length === 0 || $tocSection.length === 0) {
    //         console.error("Sticky sidebar or TOC section not found. Check selectors.");
    //         return;
    //     }

    //     function toggleStickyCSS() {
    //         var tocTop = $tocSection.offset().top; // Top position of the TOC section
    //         var tocBottom = tocTop + $tocSection.outerHeight(); // Bottom position of the TOC section
    //         var scrollTop = $(window).scrollTop(); // Current scroll position
    //         var windowHeight = $(window).height();

    //         // Check if the scroll position is within the TOC section
    //         if (scrollTop + windowHeight > tocTop && scrollTop < tocBottom) {
    //             // Show the sticky sidebar when within the TOC section
    //             $stickySidebar.css("visibility", "visible");
    //         } else {
    //             // Hide the sticky sidebar when outside the TOC section
    //             $stickySidebar.css("visibility", "hidden");
    //         }
    //     }

    //     // Trigger the toggle function on scroll
    //     $(window).on("scroll", toggleStickyCSS);

    //     // Initial state
    //     toggleStickyCSS();




});
