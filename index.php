<?php
symlink($_SERVER['DOCUMENT_ROOT'] . '/lp/emoji', $_SERVER['DOCUMENT_ROOT'] . '/lp/emoji2024');

include_once $_SERVER['DOCUMENT_ROOT'] . '/_session/start.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/saleDates.php';

$tink = file_get_contents('images/rates/tink.svg');

$not_include_plugins = [];
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/plugins/includeToHeader.php';

$sale_tag = 'sale ';

if (stripos($_SERVER['SCRIPT_FILENAME'], 'emoji2024/')) {
    $sale_tag = 'sale24 ';
    include 'rates-config-prod.php';
} else {
    include 'rates-config.php';
}

$form_tag = 'year ' . $sale_tag . '16.07';
if (!empty($_GET['utm_source'])) {
    $form_tag .= ' ' . $_GET['utm_source'];
}

$startDate = explode(' ', $dates["start"]);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн-школа английского Алекса Рубанова English Tochka</title>
    <meta property="og:description"
          content="Обучение английскому языку в онлайн школе English Tochka. Удобный сайт для изучения английского дома, в поездках, на отдыхе, отличные преподаватели"/>
    <meta name="description"
          content="Обучение английскому языку в онлайн школе English Tochka. Удобный сайт для изучения английского дома, в поездках, на отдыхе, отличные преподаватели"/>
    <meta property="og:image" content="https://englishtochka.ru/images/blog/share2.jpg"/>
    <meta property="vk:image" content="https://englishtochka.ru/images/blog/share2.jpg"/>
    <meta name="twitter:image:src" content="//englishtochka.ru/images/blog/share2.png"/>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- styles -->
    <link rel="stylesheet/less" href="less/style.less?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/HelveticaNeueCyr.css?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/MuseoSansCyrl.css?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/Montserrat.css?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/BebasNeueCyrillic.css?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/BenzinBold.css?<?= mt_rand(); ?>">
    <link rel="stylesheet" href="fonts/BenzinMedium.css?<?= mt_rand(); ?>">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="js/owl-carousel/dist/assets/owl.carousel.min.css" rel="stylesheet preload" as="style" type="text/css">
    <script defer src="js/owl-carousel/dist/owl.carousel.min.js"></script>
    <script defer src="js/main.js?<?= mt_rand() ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/less"></script>
    <link rel="stylesheet preload" as="style" href="css/jquery.fancybox.min.css">
    <script src="js/jquery.fancybox.min.js"></script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1.5.0/lite-youtube.js"></script>
    <script defer src="js/player.js?<?= mt_rand() ?>"></script>
    <script defer src="js/open-info.js?<?= mt_rand() ?>"></script>
    <script defer src="js/select-rates.js?<?= mt_rand() ?>"></script>
    <script defer src="js/slider-carousel-reviews.js?<?= mt_rand() ?>"></script>
    <script defer src="js/faq.js?<?= mt_rand() ?>"></script>

    <script>
        let title = "<?= $form_tag ?>";
        let countingTime = Date.now() +  15 * 1000 * 60;
        $(document).ready(function () {
            message(4000)
            if (!localStorage.getItem(title)) {
                localStorage.setItem(title, countingTime);
                setTimer(countingTime);
            } else {
                setTimer(localStorage.getItem(title));
            }

            // setTimer(Date.now() + 15 * 1000 * 60);
            // setTimer(new Date("May 20, 2024 00:00:00").getTime());
            $('.timer-already-buy-number').text(localStorage.getItem(title + 'cnt') ?? '11');
        });
    </script>
</head>
<body>
<header class="header">

    <div class="container">
        <div class="header__logo">
                            <?php include '../common/logo.svg'; ?>
        </div>

        <h1 class="header__title">
            National <br>
            Lottery Day
        </h1>

        <div class="header__text">
            Крутите колесо, чтобы получить <br>
            самый выгодный бонус!
        </div>

        <div class="timer-wrapper">

            <div class="timer-button">
                <a href="#rates" class="timer-button__link">
                    Купить со скидкой <br>
                    <span class="timer-already-buy"><span class="timer-already-buy-number">75</span> человек уже внесли предоплату</span>
                </a>
                <a href="#facts" class="timer-button__details">
                    Узнать подробнее
                </a>
            </div>

            <div class="timer-block" id="timer">
                <div class="timer-title">
                    До конца действия <br>
                    предложения осталось:
                </div>
                <div class="timer" style="display: none">
                    <span class="timer-time days">03</span>
                    <span class="timer-text text dayname">Дней</span>
                </div>
                <div class="timer timer--dots" style="display: none">
                    <span class="timer-dots ">:</span>
                </div>

                <div class="timer" style="display: none">
                    <span class="timer-time hours">23</span>
                    <span class="timer-text text">Часов</span>
                </div>
                <div class="timer timer--dots" style="display: none">
                    <span class="timer-dots">:</span>
                </div>
                <div class="timer ">
                    <span class="timer-time minutes">15</span>
                    <span class="timer-text text">Минут</span>
                </div>
                <div class="timer timer--dots">
                    <span class="timer-dots">:</span>
                </div>
                <div class="timer">
                    <span class="timer-time seconds">00</span>
                    <span class="timer-text text">Секунд</span>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="facts" id="facts">
    <div class="facts__img"></div>
    <div class="container">
        <h2 class="facts__title">
            ФАКТЫ О КУРСЕ «ЗАГОВОРИ НА <br>
            АНГЛИЙСКОМ ЗА 2 МЕСЯЦА»:
        </h2>
        <div class="facts__content">
            <div class="content__item">
                <div class="content__item-img"></div>
                <div class="content__item-text">
                    Каждый курс уникален для <br>
                    каждого студента <span>&nbsp;&nbsp;&nbsp;</span>
                </div>
            </div>
            <div class="content__item">
                <div class="content__item-img"></div>
                <div class="content__item-text">
                    Тысячи студентов <br>
                    из 52-х стран <span>&nbsp;&nbsp;&nbsp;</span>
                </div>
            </div>
            <div class="content__item">
                <div class="content__item-img"></div>
                <div class="content__item-text">
                    99,7% - Customer Satisfaction <br>
                    Index (CSI) <span>&nbsp;&nbsp;&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="advantages">
    <div class="advantages__img"></div>
    <div class="container">
        <h2 class="advantages__title">Наши преимущества</h2>
        <ul class="advantages__list">
            <li class="advantages__item">Second teacher</li>
            <li class="advantages__item">Клуб дебатов</li>
            <li class="advantages__item">English buddy</li>
            <li class="advantages__item">Квесты - совершенно новый формат</li>
        </ul>
    </div>
</section>

<section class="info" id="info-teacher">
    <div class="container">
        <div class="info__close"></div>
        <div class="info__title">Second teacher</div>
        <div class="info__text">
            Ваш товарищ, который с вами общается 3 раза в неделю и направляет вас в нужную сторону.
            Вы всегда можете обратиться к нему со своими вопросами по любой теме.
            <br>
            По необходимости, можно увеличить дни общения
            до 5 в неделю.
        </div>
    </div>
</section>

<section class="info" id="info-club">
    <div class="container">
        <div class="info__close"></div>
        <div class="info__title">Клуб дебатов</div>
        <div class="info__text">
            Каждую неделю вы получаете тему, которую будете обсуждать
            <br>
            Поможет вам совершенствовать навыки английского языка через интересные и захватывающие
            дискуссии. Здесь вы сможете практиковать разговорную речь и расширять словарный запас.
        </div>
    </div>
</section>

<section class="info" id="info-buddy">
    <div class="container">
        <div class="info__close"></div>
        <div class="info__title">English buddy</div>
        <div class="info__text">
            Ваш друг по переписке, который готов поддержать
            с вами любую беседу. 
            <br>
            Вы сможете практиковать как письменную, так и устную речь, а главное, вы всегда найдете поддержку, когда вам
            грустно или хочется поговорить.
        </div>
    </div>
</section>

<section class="info" id="info-quests">
    <div class="container">
        <div class="info__close"></div>
        <div class="info__title">Квесты - совершенно новый формат</div>
        <div class="info__text">
            Первый квест:  "Travelling: Destination Unknown"
            <br>
            Вам предстоит спланировать маршрут, познакомиться с местными обычаями и совместными усилиями решить
            неожиданные задачи. Этот квест идеально подходит для любителей путешествий и интерактивного обучения.
        </div>
    </div>
</section>

<section class="rates" id="rates">
    <div class="rates__img"></div>
    <div class="container">
        <h2 class="rates__title">
            Выберите курс, который соответствует вашим целям и задачам!
        </h2>
        <div class="rates__desc">
            Вам будут доступны все преимущества нашей методики,
            а также регулярные занятия с Second Teacher.
        </div>
        <div class="rates__block">
            <div class="select">
                <input class="select__input" type="hidden" name="">
                <div class="select__head" data-option="1">1 спецкурс</div>
                <ul class="select__list" style="display: none;">
                    <?php foreach ($rates as $i => $rate) : ?>
                        <li class="select__item" data-option="<?= $rate['id'] ?>"><?= $rate['gift'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php include 'rates-block.php' ?>

            <?php foreach ($rates as $i => $rate) : ?>
                <div class="rates__block-btns">
                    <a href="<?= $rate['link_ru'] ?>" class="rates__prepayment js-tink-eq"
                       id="prepayment-<?= $rate['id'] ?>" target="_blank">
                    <span class="rates__prepayment-text">
                        Внести предоплату <br>
                        российской картой
                    </span>
                    </a>
                    <a href="<?= $rate['link_en'] ?>" class="rates__prepayment"
                       id="prepayment-<?= $rate['id'] ?>" target="_blank">
                    <span class="rates__prepayment-text">
                        Внести предоплату <br>
                        зарубежной картой
                    </span>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
        <a class="rates__sign-up" href="https://wa.me/+79397662782">
            <span></span>Записаться
        </a>
    </div>
</section>
<section class="results">
    <div class="results__img"></div>
    <h2 class="results__title">
        Результаты обучения
    </h2>
    <div class="results__content">
        <div class="content__item">
            <div class="content__item-img"></div>
            <div class="content__item-text">
                Вы можете пообщаться на «простом» английском и понять собеседника в знакомой вам ситуации, но с трудом
            </div>
        </div>
        <div class="content__item">

            <div class="content__item-img"></div>
            <div class="content__item-text">
                Вы свободно разговариваете на английском, обсуждаете многие темы, понимаете на слух сказанное на
                английском
            </div>
        </div>
        <div class="content__item">
            <div class="content__item-img"></div>
            <div class="content__item-text">
                Вы хорошо говорите и понимаете английскую речь на слух, но все же можете допускать ошибки
            </div>
        </div>
        <div class="content__item">

            <div class="content__item-img"></div>
            <div class="content__item-text">
                Вы бегло говорите на английском и полностью понимаете речь на слух
            </div>
        </div>
    </div>
</section>
<section class="video">
    <div class="video__img"></div>
    <div class="container">
        <h2 class="video__title">
            как проходит обучение
        </h2>
        <div class="video__frame">
            <div class="main-video" id="play"></div>
            <lite-youtube class="main-lite-youtube" videoid="DkDDUOvwyxQ" id="player">
                <a class="lite-youtube-fallback" href="https://www.youtube.com/watch?v=DkDDUOvwyxQ"></a>
            </lite-youtube>
        </div>
    </div>
</section>
<section class="reviews">
    <div class="reviews__img"></div>
    <div class="container">
        <h2 class="reviews__title">Что говорят наши ученики</h2>

        <div class="reviews__slider">
            <div class="reviews__carousel owl-carousel owl-theme">
                <div class="slider-card">
                    <div class="slider-card__img image-1"></div>
                    <div class="slider-card__info">
                        Ирина Оренбургская <br>
                        <span>33 года</span>
                    </div>
                    <div class="slider-card__text">
                        Прохожу обучение в English Tochka уже 3й курс. Мне нравится методика школы - немного теории и
                        закрепление материала в разговорной форме. Именно такой формат помогает преодолеть страх
                        разговаривать.И даже делая ошибки, продолжаешь говорить, не боясь быть непонятой.Чувствую
                        прогресс в знании языка и возможности поддерживать беседу на английском.Также мне повезло с
                        Second Teacher (Анастасия Астафорова). Мне нравятся наши уроки) Всегда пунктуальна и в хорошем
                        настроении! У нас получается болтать как будто уже знакомы долгое время.Именно такой формат мне
                        кажется идеальным, чтобы не было скучных академических занятий,а было живое общение,
                        приближенное к реальности. Уверена мой прогресс будет стабильнее с таким подходом! Спасибо!!!
                    </div>
                </div>

                <div class="slider-card">
                    <div class="slider-card__img image-2"></div>
                    <div class="slider-card__info">
                        Айдина Мурадова<br>
                        <span>26 лет</span>
                    </div>
                    <div class="slider-card__text">
                        Большое спасибо школе за возможность продвинуться в изучении языка! За профессионализм, глубину
                        знаний и терпение.
                        Благодаря школе и поддержке моего учителя я продолжаю step-by-step идти к намеченой цели!
                        Всем ученикам стоит помнить, что изучение любого языка - это дисциплина и труд, но если вы
                        запасетесь этими качествами, то все получится, ведь вы в надежных руках.
                    </div>
                </div>

                <div class="slider-card">
                    <div class="slider-card__img image-3"></div>
                    <div class="slider-card__info">
                        Алексей Зубков <br>
                        <span>30 лет</span>
                    </div>
                    <div class="slider-card__text">
                        Стоит отметить, что школа превзошла все мои ожидания. На многие вопросы, проблемы, что возникали
                        в школе, постепенно нашла ответы.
                        Ежедневные звонки помогают развивать речь, а задания - фантазию и грамматику. Очень итересно
                        каждый новый день изучать новые слова, фразы и выражения. Каждую пятницу я жду с удовольствием
                        потому, что аудирование -это нечто, всё понятно, всё объясняют, а темы очень актуальны. Есть
                        множество разговорных клубов, можно смотреть фильмы и сериалы на английском, есть много
                        позновательной информации, что может пригодиться, да и само оформление сайта приятно, что только
                        способствует обучению.
                    </div>
                </div>

                <div class="slider-card">
                    <div class="slider-card__img image-4"></div>
                    <div class="slider-card__info">
                        Марина Стрельцова <br>
                        <span>41 год</span>
                    </div>
                    <div class="slider-card__text">
                        Школа English Tochka превзошла все мои ожидания! Я занимаюсь в этой школе уже больше года.
                        Начинала обучаться в этой школе я с нуля.
                        Результата долго не пришлось ожидать, я прилежный ученик и выполняла все по программе! Сейчас я
                        без языкового барьера, могу свободно и без стеснений говорить на английском. Когда - то это было
                        моей мечтой, а сейчас это реальность! Учитывая мой опыт и прогресс, я приобрела курс для своей
                        дочки, которая учится в начальной школе. Благодарю учителя Аделю Гатауллину - second teacher
                        моего ребенка за её доброту и профессионализм! За продуктивные и веселые занятия! Благодаря
                        занятиям в English Tochka ребенку гораздо легче дается материал в школе по Английскому и
                        домашнее задание ребенок выполняет легко и быстро на 5-ки!
                    </div>
                </div>

                <div class="slider-card last-item">
                    <div class="slider-card__img image-5"></div>
                    <div class="slider-card__info">
                        Екатерина Сикорская <br>
                        <span>27 лет</span>
                    </div>
                    <div class="slider-card__text">
                        Хочу поблагодарить English Tochka за прекрасную работу, за современный подход к ученикам. Пришла
                        я к вам с нулевым уровнем, даже не знаю буквы, сейчас понимаю грамматику, знаю как читаются
                        слова и произносится слово.И это здорово)
                        Отдельное спасибо моей Second Teacher
                        Анастасии, очень нравилось общение с ней, все доходчиво и понятно объясняла, действительно очень
                        приятный человек и собеседник. Всегда вовремя выходила на связь не было ни одной задержки…15
                        минут пролетало как 3 минуты. В общем только положительные и приятные ЭМОЦИИ.
                        Желаю всей команде процветания и новых достижений!
                    </div>
                </div>
            </div>
        </div>
        <div class="reviews__arrows">
        </div>
    </div>
</section>
<section class="sign-up" id="sign-up">
    <div class="sign-up__img"></div>
    <div class="container">

        <form class="form">
            <h2 class="sign-up__title">
                Запишись на бесплатный <br>
                вводный урок</span>
            </h2>
            <input type="text" class="user form-control validate[required]" name="entry.1367139734"
                   placeholder="Имя и фамилия">
            <input type="text" class="form-input validate[required,custom[email]] mail" name="entry.1795299684"
                   placeholder="E-mail">
            <input type="text" class="form-control validate[required,custom[phone]] phone" name="entry.19922255"
                   placeholder="+7 (___)___-__-__">

            <input class="button" type="submit" value="Записаться">
            <div class="agree">
                Нажимая на кнопку, вы даете согласие на <a href="https://englishtochka.ru/docs/Personaldata.pdf">обработку
                    персональных
                    данных </a>и соглашаетесь с <a href="https://englishtochka.ru/docs/Politics.pdf">политикой
                    конфиденциальности</a>
            </div>

            <input value="
            <?= $country . ';' . $city ?>" type="hidden" class='city' name="entry.556262798">
            <input value="
            <?= $device . $device2 ?>" type="hidden" name="entry.1088525957">
            <input class='timezone' value="" type="hidden" name="entry.1876367705">
            <input value="<?= $form_tag ?>" type="hidden" name="entry.1597975313">
            <input value="
            <?= $_SERVER["REQUEST_URI"] ?>" type="hidden" name="entry.497623239">
            <input value="
            <input value="<?= implode(';', array_map(fn($rate) => $rate['price'], $rates)) ?>" type="hidden"
            name="entry.311220277">
            <input type="hidden" name="token" value="<?= $csrf_token; ?>">
        </form>
    </div>
</section>
<section class="faq">
    <div class="container">
        <h2 class="faq__title">
            часто задаваемые вопросы
        </h2>

        <div class="faq__block">

            <div class="faq__question-block">
                <div class="faq__question">Как долго длится курс?</div>
                <div class="faq__answer">
                    Курс длится 8 недель с момента старта ваших занятий.
                </div>
            </div>

            <div class="faq__question-block">
                <div class="faq__question">Насколько курс интенсивный?</div>
                <div class="faq__answer">
                    Курс разработан специально для взрослых работающих людей. Мы прекрасно понимаем, сколько времени
                    занятой
                    человек может выделять на обучение без отрыва от работы и семьи. Методики, использованные в
                    нашем
                    онлайн-курсе, позволяют не чувствовать интенсивность происходящего и получать удовольствие от
                    процесса,
                    при этом обеспечивают неожиданно быстрый результат. Тем не менее, для тех, кто хочет больше, мы
                    даем еще
                    больше материала для запоминания и отработки.
                </div>
            </div>

            <div class="faq__question-block">
                <div class="faq__question">Что если я живу не в России?</div>
                <div class="faq__answer">
                    Не имеет значения, где вы живете. Если у вас есть доступ в интернет, вы без проблем сможете
                    заниматься.
                </div>
            </div>

            <div class="faq__question-block">
                <div class="faq__question">Какое техническое оснащение требуется для курса?</div>
                <div class="faq__answer">
                    Вам понадобится только хорошее интернет-соединение. Заниматься можно как с компьютера, так и с
                    мобильных
                    устройств.
                </div>
            </div>
        </div>
    </div>
</section>
<div class="koleso"></div>
<?php include '../common/footer.php' ?>
<style>
    .footer {
        background: #454648;
    }

    .fancybox-content {
        padding: 0;
        margin: 0;
    }

    .reviews__carousel {
        width: 79.25rem;
        height: auto;
    }

    @media screen and (max-width: 750px) {

        .fancybox__content {
            padding: 3rem 0;
        }

        .reviews__carousel {
            width: 21rem;
            height: auto;
        }
    }

</style>
<script src="https://game-lead.ru/set/c7964cdda9420e57c6d4ad507bf33482"></script>
<?php
$not_include_plugins = array();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/plugins/includeToFooter.php';
?>
</body>


</html>