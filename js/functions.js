AOS.init();
/* CUSTOM ON LOAD FUNCTIONS */
function documentCustomLoad() {
    "use strict";
    console.log('Functions Correctly Loaded');

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
        minDate: 'today',
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
        if( jQuery('#checkida').is(':checked')) { 
            jQuery('#fechaRegresoCont').removeClass('d-none');
        } else {
            jQuery('#fechaRegresoCont').addClass('d-none');
        }
    });
}
document.addEventListener("DOMContentLoaded", documentCustomLoad, false);