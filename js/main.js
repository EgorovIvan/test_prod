$(document).ready(function () {



    $('.timezone').val(-new Date().getTimezoneOffset() / 60 - 3);


    $('a[href^="#"]:not(.course-trailer)').on('click', function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });

    $("form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();
        var error = form.validationEngine('validate')


        form.css('height', form.height());

        if ((error) && (!$(this).hasClass('sended'))) {
            form.addClass('sended');

            if (typeof (isProd) == 'undefined' || !isProd) {
                // Отправляем данные формы по API Google
                $.ajax({
                    url: '/config/integrations/google/API/freecall_list.php',
                    data: data,
                    type: "POST",
                    dataType: "html",
                })
                    .always(function () {
                        jQuery.ajax({
                            type: "POST",
                            url: "/config/integrations/amo/amo.php",
                            data: data,
                            complete: function () {
                                form.html('<div class="block-title" style="padding-top: 50px">Данные отправлены</div><div class="form-text">Менеджер свяжется с Вами в ближайшее время.</div>')
                            }
                        });
                    });
            } else {
                $.ajax({
                    url: 'https://docs.google.com/forms/u/1/d/e/1FAIpQLSc6bhxTJrP_yPjwaelNwbhaabnRyzTsvdXUDzjqIe8-ZS0neQ/formResponse',
                    data: data,
                    type: "POST",
                    dataType: "xml",
                    complete: function () {
                        form.html('<div class="block-title" style="padding-top: 50px">Данные отправлены</div><div class="form-text">Менеджер свяжется с Вами в ближайшее время.</div>')
                    }
                });
            }


        }
    });

    // exit popup

    if (typeof (isProd) == 'undefined') {
        isProd = false;
    }
    let show = !isProd;
    let windowWidth = $(window).width();

    // window.exitPopup = function () {
    //     $.fancybox.open({
    //         src: '#exit-popup',
    //         type: 'inline',
    //         toolbar: false
    //     });
    //     show = false;
    // }
    //
    // setTimeout(function () {
    //     $(document).on('mouseleave', function (e) {
    //         if ((e.clientY < 10) && (show == true) && (windowWidth > 720)) {
    //             exitPopup();
    //         }
    //     });
    // }, 15000);
    //
    // if ((windowWidth < 720) && (show == true)) {
    //     setTimeout(exitPopup, 25000);
    // }


    // exit popup




    // course
    var courses = 7;
    if (windowWidth > 720) {
        courses = 7
    }
    $('.course-item').each(function (i, item) {
        if (i > courses) $(item).addClass('hidden');
    });
    $('.course-btn').on('click', function () {

        if ($(this).hasClass('all-open')) {
            $('.course-item').each(function (i, item) {
                if (i > courses) $(item).addClass('hidden');
            });
            $('.course').removeClass('open');
            $(this).removeClass('all-open').text('Показать еще');
        } else {
            $('.course-item').each(function () {
                $(this).removeClass('hidden')
            });
            $('.course').addClass('open');
            $(this).addClass('all-open').text('Скрыть');
        }

    });


    $('.course-item:not(.course-no-popup)').on('click', function () {
        // add info
        var course_data = $(this).find('.course-about'),
            course_text = $(this).find('.course-popup-text').html(),
            course_price = $(this).find('.course-price').html(),
            course_course = course_data.attr('data-course');
        $('.course-popup-block').css('background-image', 'url(' + course_data.attr('data-bgImage') + ')');
        if (course_data.attr('data-trailer')) {
            $('.course-popup-block').find('a').attr('href', course_data.attr('data-trailer'));
        }
        $('.course-popup-image').find('img').attr('src', course_data.attr('data-mobImage'));
        $('.course-about-lessons').text(course_data.attr('data-lessons'));
        $('.course-about-text').html(course_text);
        $('.course-about-price').html(course_price);
        $('.course-popup').attr('id', 'c' + course_course);
        // add info end

        // Доп. обработчики
        // if (course_course && course_course == '02') {
        //     // course02-slider
        //     var course02 = $('#c02 .course02-slider').owlCarousel({
        //         items: 1,
        //         nav: true,
        //         loop: false,
        //         navText: ["Назад", "Дальше"],
        //     });
        //     course02.on('changed.owl.carousel', function (e) {
        //         if ((e.page.index + 1) >= e.page.count) {
        //             $('button.owl-next').css('opacity', '0');
        //         } else {
        //             $('button.owl-next').css('opacity', '1');
        //         }
        //         if (e.page.index == 0) {
        //             $('button.owl-prev').css('opacity', '0');
        //         } else {
        //             $('button.owl-prev').css('opacity', '1');
        //         }
        //     });
            // course02-slider End
        // }
        // Доп. обработчики End
        //popup
        $('.course-popup-overlay').hide();
        $('.course-popup').hide();

        $('.course-popup-overlay').show();
        $('.course-popup').fadeIn();
    });
    $('.course-popup .close, .course-popup-overlay').on('click', function () {
        $('.course-popup-overlay').hide();
        $('.course-popup').fadeOut('fast');
        $('.course-about-text').html('');
    });
    // popup end

    // course end

});


function setTimer(deadline) {
    // Сколько осталось времени
    function getTimeRemaining(endtime) {

        // Получаем разницу. Переводим конечную дату в миллисекунды и отнимаем текущую дату
        let t = endtime - Date.now(),
            // Высчитываем секунды, минуты, часы и дни
            seconds = Math.floor((t / 1000) % 60),
            minutes = Math.floor((t / 1000 / 60) % 60),
            hours = Math.floor((t / 1000 / 60 / 60) % 24)
        days = Math.floor((t / 1000 / 60 / 60 / 24));

        return {
            'total': t,
            'seconds': seconds,
            'minutes': minutes,
            'hours': hours,
            'days': days
        };
    }

    // Форматируем и устанавливаем значения в разметку
    function setClock(id, endtime) {
        // Получаем блок таймера по его id
        let timer = document.getElementById(id),
            days = timer.querySelector('.days'),
            dayname = timer.querySelector('.dayname'),
            hours = timer.querySelector('.hours'),
            minutes = timer.querySelector('.minutes'),
            seconds = timer.querySelector('.seconds'),
            // Обновляем таймер каждую секунду
            timeInterval = setInterval(updateClock, 1000);


        // Функция для обновления таймера
        function updateClock() {
            // Помещаем в t результат функции getTimeRemaining (объект)
            let t = getTimeRemaining(endtime);
            if (t.days <= 0) {
                days.innerHTML = "<i>0</i><i>0</i>";
                dayname.innerHTML = "";
            } else if (t.days < 10) {
                days.innerHTML = "<i>0</i><i>" + t.days + "</i>";
                // Вставляем слово "день" при этом форматируя (дней, дня)
                dayname.innerHTML = formatDays(t.days);
            } else {
                days.innerHTML = "<i>" + t.days + "</i>";
                // Вставляем слово "день" при этом форматируя (дней, дня)
                dayname.innerHTML = formatDays(t.days);
            }
            hours.innerHTML = formatTime(t.hours);
            minutes.innerHTML = formatTime(t.minutes);
            seconds.innerHTML = formatTime(t.seconds);


            // Если Дедлайн прошёл - вставляем в таймер 00:00:00,
            // и останавливаем отсчёт (clearInterval)
            if (t.total <= 0) {
                clearInterval(timeInterval);
                days.innerHTML = "<i>0</i><i>0</i>";
                hours.innerHTML = '<i>0</i><i>0</i>';
                minutes.innerHTML = '<i>0</i><i>0</i>';
                seconds.innerHTML = '<i>0</i><i>0</i>';

                // if(!isProd) {
                //   expire?.();
                // }
            }
        }

        // Функция добавляет 0 к единцам, получаем
        // 03:04:05 вместо 3:4:5
        function formatTime(time) {
            if (time < 10) {
                time = '<i>0</i>' + '<i>' + time + '</i>';
            } else {
                time += '';
                time = '<i>' + time.split('')[0] + '</i><i>' + time.split('')[1] + '</i>';
            }
            return time;
        }

        function formatDays(day) {
            let sb = '',
                dayNew = day % 100,
                lastFigure = dayNew % 10;
            if (dayNew > 10 && dayNew < 20) {
                sb = 'ей';
            }
            else if (lastFigure == 1) {
                sb = "день";
            }
            else if (lastFigure > 1 && lastFigure < 5) {
                sb = 'дня';
            }
            else {
                sb = 'дней';
            }
            return sb;
        }
    }

    setClock('timer', deadline);
    // setClock('timer_1', deadline);
    // setClock('timer_2', deadline);
    // setClock('rates_timer_3', deadline);
    // setClock('rates_timer_4', deadline);
}

function expire() {
    // $('#rates').hide();
    // $('#rates-expired').show();
    // $('.gift-rate__button').hide();
    // $('.gift-rate__gift').show();
    // $('.rates-gift').hide();
}

function message(duration) {

    setTimeout(function () {
        // var num = getRandomInt(1, 3) + +$('.header-already-buy-number').text();

        let num = localStorage.getItem(title + 'cnt') ?? 15;
        $('.header-already-buy-number').text(num);


        // $('.message .message-text').text(mess[getRandomInt(0, (mess.length - 1))]);
        // $('.message').addClass('open');

        if (num < 66) {
            num++;
            localStorage.setItem(title + 'cnt', num);
            // $('.digit').eq(0).html(parseInt(num / 10));
            // $('.digit').eq(1).html(parseInt(num % 10));
            $('.header-already-buy-number').text(num);
        }

        setTimeout(function () {
            // $('.message').removeClass('open');
            var dur = getRandomInt(10, 20) * 1000;
            message(dur)
        }, 5000);
    }, duration);
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min);
}