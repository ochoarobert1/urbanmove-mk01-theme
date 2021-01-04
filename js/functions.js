var validateForm = true;
var checkedVal = 0;
AOS.init();


/* SET COOKIES */
function setCookie(cname, cvalue, exdays) {
    "use strict";
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/* GET COOKIES */
function getCookie(cname) {
    "use strict";
    var name = cname + "=",
        ca = document.cookie.split(';'),
        i = 0;
    for (i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/* CUSTOM ON LOAD FUNCTIONS */
function documentCustomLoad() {
    "use strict";
    console.log('Functions Correctly Loaded');

    
    jQuery("input[type=radio]").on('click', function() {
        checkedVal = jQuery(this).val();
        console.log(checkedVal);
    });

    jQuery('.btn-submit').on('click', function(e) {
        e.preventDefault();
        validateForm = true;
        var atLeastOneChecked = false;
        

        jQuery("input[type=radio]").each(function() {
            if (jQuery(this).attr("checked") == "checked") {
                atLeastOneChecked = true;
            }
        });

        if (!atLeastOneChecked) {
            validateForm = false;
        }

        if (jQuery('#origen').val() === '') {
            validateForm = false;
        }

        if (jQuery('#destino').val() === '') {
            validateForm = false;
        }

        if (jQuery('#fechaOrigen').val() === '') {
            validateForm = false;
        }

        
        if (checkedVal != 2) {
            if (jQuery('#fechaRegreso').val() === '') {
                validateForm = false;
            }
        }

        if (jQuery('#quantity').val() === '') {
            validateForm = false;
        }

        if (validateForm == true) {
            jQuery('#errorForm').addClass('d-none');
            jQuery('#searchForm').submit();
        } else {
            jQuery('#errorForm').removeClass('d-none');
            return false;
        }

    });

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
        }
    });

    Date.prototype.addHours = function(h) {
        this.setTime(this.getTime() + (h * 60 * 60 * 1000));
        return this;
    }
    var todayDate = new Date().addHours(12);

    let startpicker = flatpickr('#fechaOrigen', {
        enableTime: true,
        showAlways: false,
        theme: 'material_blue',
        time_24hr: true,
        altInput: true,
        altFormat: 'F j, Y H:i',
        dateFormat: 'Y-m-d H:i',
        locale: {
            firstDayofWeek: 0,
            months: {
                longhand: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            },
            weekdays: {
                shorthand: ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            },
        },
        minDate: todayDate,
        onClose: function(selectedDates, dateStr, instance) {
            endpicker.set('minDate', dateStr);
        },
    });

    let endpicker = flatpickr('#fechaRegreso', {
        enableTime: true,
        showAlways: false,
        theme: 'material_blue',
        time_24hr: true,
        altInput: true,
        altFormat: 'F j, Y H:i',
        dateFormat: 'Y-m-d H:i',
        locale: {
            firstDayofWeek: 0,
            months: {
                longhand: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            },
            weekdays: {
                shorthand: ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            },
        },
        minDate: jQuery('#fechaOrigen').attr('value')
    });

    jQuery('input[name=checkida]').on('change', function(e) {
        if (jQuery('#checkida').is(':checked')) {
            jQuery('#fechaRegresoCont').removeClass('d-none');
        } else {
            jQuery('#fechaRegresoCont').addClass('d-none');
        }
    });

    /* COOKIE CONSENT */
    // IF COOKIE IF SET OR NOT
    var cookieElement = document.getElementsByClassName('urbanmove-privacy-policy-accept');
    var cookieConsent = getCookie("cookie_consent");
    if (cookieConsent != '') {
        cookieElement[0].classList.add("hidden-policy");
    } else {
        cookieElement[0].classList.remove("hidden-policy");
    }

    // SET COOKIE ON CLICK
    var cookieBtn = document.getElementById('privacy-policy-accept-btn');
    cookieBtn.addEventListener("click", function() {
        setCookie('cookie_consent', 'cookie_consent', 7);
        var cookieElement = document.getElementsByClassName('urbanmove-privacy-policy-accept');
        cookieElement[0].classList.add("hidden-policy");
    }, false);
}
document.addEventListener("DOMContentLoaded", documentCustomLoad, false);