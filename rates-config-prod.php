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
    'price' => 14900,
    'oldPrice' => 62800,
    'gift' => '1 спецкурс',
    'link_ru' => 'https://englishtochka.ru/FB5F0E3',
    'link_en' => 'https://knowperfectly.com/en/course/9546-speak-with-english-tochka-1-course?cc'
];
$rates[] = [
    'id' => '2',
    'title' => 'Два курса',
    'price' => 24900,
    'oldPrice' => 105800,
    'gift' => '2 спецкурса',
    'link_ru' => 'https://englishtochka.ru/6407F21',
    'link_en' => 'https://knowperfectly.com/en/course/9547-speak-with-english-tochka-2-courses?cc'
];
$rates[] = [
    'id' => '3',
    'title' => 'Три курса',
    'price' => 34900,
    'oldPrice' => 160800,
    'gift' => '3 спецкурса',
    'link_ru' => 'https://englishtochka.ru/85259E7',
    'link_en' => 'https://knowperfectly.com/en/course/9548-speak-with-english-tochka-3-courses?cc'
];
$rates[] = [
    'id' => '4',
    'title' => 'Пять курсов',
    'price' => 54900,
    'oldPrice' => 114300,
    'gift' => '5 спецкурсов',
    'link_ru' => 'https://englishtochka.ru/D1E6625',
    'link_en' => 'https://knowperfectly.com/en/course/9549-speak-with-english-tochka-5-courses?cc'
];

?>