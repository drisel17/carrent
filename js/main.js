
'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Car filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.car-filter').length > 0) {
            var containerEl = document.querySelector('.car-filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".header__menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*--------------------------
        Testimonial Slider
    ----------------------------*/
    $(".car__item__pic__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Testimonial Slider
    ----------------------------*/
    var testimonialSlider = $(".testimonial__slider");
    testimonialSlider.owlCarousel({
        loop: true,
        margin: 0,
        items: 2,
        dots: true,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            768: {
                items: 2
            },
            0: {
                items: 1
            }
        }
    });

    /*-----------------------------
        Car thumb Slider
    -------------------------------*/
    $(".car__thumb__slider").owlCarousel({
        loop: true,
        margin: 25,
        items: 5,
        dots: false,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        mouseDrag: false,
        responsive: {

            768: {
                items: 5
            },
            320: {
                items: 3
            },
            0: {
                items: 2
            }
        }
    });

    /*-----------------------
		Range Slider
	------------------------ */
    var rangeSlider = $(".price-range");
rangeSlider.slider({
    range: true,
    min: 1,
    max: 2000,
    values: [1, 400],
    slide: function (event, ui) {
        if (ui.values[0] !== 1) {
            // If the minimum value is not 1, reset it to 1
            rangeSlider.slider("values", 0, 1);
            return false; // Prevent sliding
        }
        $("#amount").val(ui.values[1]);
    }
});

    $("#amount").val($(".price-range").slider("values", 1));

    var carSlider = $(".car-price-range");
    carSlider.slider({
        range: true,
        min: 1,
        max: 2000,
        values: [1, 400],
        slide: function (event, ui) {
            $("#caramount").val(ui.values[1]);
        }
    });
    $("#caramount").val($(".car-price-range").slider("values", 1));

    var filterSlider = $(".filter-price-range");
    filterSlider.slider({
        range: true,
        min: 1,
        max: 2000,
        values: [1, 400],
        slide: function (event, ui) {
            if (ui.values[0] !== 1) {
                // If the minimum value is not 1, reset it to 1
                rangeSlider.slider("values", 0, 1);
                return false; // Prevent sliding
            }
            $("#filterAmount").val(ui.values[1]);
        }
    });
    $("#filterAmount").val($(".filter-price-range").slider("values", 1));

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
		Single Product
	--------------------*/
    $('.car-thumbs-track .ct').on('click', function () {
        $('.car-thumbs-track .ct').removeClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.car-big-img').attr('src');
        if (imgurl != bigImg) {
            $('.car-big-img').attr({
                src: imgurl
            });
        }
    });

    /*------------------
        Counter Up
    --------------------*/
    $('.counter-num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });


    /*------------------
    Change price dynamically, car-details
    --------------------*/

    document.addEventListener("DOMContentLoaded", function() {
        var pricePerDay = parseInt(document.getElementById("price-per-day").textContent.replace("$", ""));
        var startDateInput = document.getElementById("start-date");
        var endDateInput = document.getElementById("end-date");
        var totalPriceElement = document.getElementById("total-price");
    
        // Function to calculate total price
        function calculateTotalPrice() {
            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);
            var days = Math.max(1, Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24))); // Calculate number of days, minimum 1 day
            var totalPrice = pricePerDay * days;
            totalPriceElement.textContent = "$" + (totalPrice.toFixed(2)); // Update total price display
        }
    
        // Add event listeners to input fields
        endDateInput.addEventListener("change", calculateTotalPrice);
    
        
    });



    /*------------------
    Set the minimum of the drop off date at least +1 day of the pick up one
    --------------------*/

    document.addEventListener("DOMContentLoaded", function() {
        var startDateInput = document.getElementById("start-date");
        var endDateInput = document.getElementById("end-date");
        var submitButton = document.getElementById("submit-button");
        submitButton.disabled;
    
        // Function to update minimum date and enable/disable drop-off date input
        function updateEndDateOptions() {;

            var startDateValue = startDateInput.value; // Assuming startDateInput is your input element
            var startDate = new Date(startDateValue); // Convert the input value to a Date object
            startDate.setDate(startDate.getDate() + 1); // Add one day to the date

            // Convert the modified date back to the format of the input field
            var year = startDate.getFullYear();
            var month = ('0' + (startDate.getMonth() + 1)).slice(-2); // Add leading zero if month is single digit
            var day = ('0' + startDate.getDate()).slice(-2); // Add leading zero if day is single digit
            var formattedDate = year + '-' + month + '-' + day;
    
            // Set minimum date of end date input to one day after selected start date
            endDateInput.min = formattedDate;
            
            // Enable drop-off date input if pick-up date is selected, otherwise disable it
            if (startDateValue !== "") {
                endDateInput.disabled = false;
            } else {
                endDateInput.disabled = true;
                endDateInput.value = ""; // Clear the value if disabled
            }
        }
    
        // Add onchange event listener to the start date input
        startDateInput.addEventListener("change", function() {
            updateEndDateOptions();
        });

        // Initial call to set initial state
        updateEndDateOptions();
    });
    



})(jQuery);