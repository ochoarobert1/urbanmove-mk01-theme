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
        }
    });

    jQuery('#fechaOrigen').datepicker({
        minDate: new Date(),
        timepicker: true,
        autoClose: true,
        language: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            today: 'Hoy',
            clear: 'Limpiar',
            dateFormat: 'dd/mm/yyyy',
            timeFormat: 'hh:ii aa',
            firstDay: 1
        },
        onSelect(formattedDate, date, inst) {
            var dateIncr = new Date(date);
            dateIncr.setDate(dateIncr.getDate());
            jQuery('#fechaRegreso').datepicker().data('datepicker').update('minDate', dateIncr);
        }
    });

    jQuery('#fechaRegreso').datepicker({
        minDate: new Date(),
        autoClose: true,
        timepicker: true,
        language: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            today: 'Hoy',
            clear: 'Limpiar',
            dateFormat: 'dd/mm/yyyy',
            timeFormat: 'hh:ii aa',
            firstDay: 1
        }
    });

}

function SFGetFormattedDate(date) {
    var dateParts = date.split("/");
    var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
    return dateObject;
}

document.addEventListener("DOMContentLoaded", documentCustomLoad, false);