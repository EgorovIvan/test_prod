<?php
function rateInt($rateString)
{
    return (int)str_replace(' ', '', $rateString);
}

function rateFormat($number)
{
    return number_format($number, 0, '.', ' ');
}
$prepay = 1990;
$rates = [];
$rates[] = [
    'id' => '1',
    'title' => 'Один курс',
    'price' => 18900,
    'oldPrice' => 65800,
    'gift' => '1 спецкурс',
    'link_ru' => 'https://englishtochka.ru/7D40C90',
    'link_en' => 'https://knowperfectly.com/en/course/9542-speak-in-2-months-1-course-english?cc'
];
$rates[] = [
    'id' => '2',
    'title' => 'Два курса',
    'price' => 33900,
    'oldPrice' => 112800,
    'gift' => '2 спецкурса',
    'link_ru' => 'https://englishtochka.ru/D58EE23',
    'link_en' => 'https://knowperfectly.com/en/course/9543-speak-in-2-months-2-courses-english-point?cc'
];
$rates[] = [
    'id' => '3',
    'title' => 'Три курса',
    'price' => 43900,
    'oldPrice' => 175800,
    'gift' => '3 спецкурса',
    'link_ru' => 'https://englishtochka.ru/0DB7942',
    'link_en' => 'https://knowperfectly.com/en/course/9544-speak-in-2-months-3-courses-english-point?cc'
];
$rates[] = [
    'id' => '4',
    'title' => 'Пять курсов',
    'price' => 58900,
    'oldPrice' => 175800,
    'gift' => '5 спецкурсов',
    'link_ru' => 'https://englishtochka.ru/3AF9528',
    'link_en' => 'https://knowperfectly.com/en/course/9545-speak-in-2-months-5-courses-english-point?cc'
];

?>