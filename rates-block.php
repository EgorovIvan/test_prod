<?php

?>
<?php foreach ($rates as $i => $rate) : ?>
<div class="rates__item" id="<?= $rate['id'] ?>">
    <div class="rates__item-block">
        <h2 class="rates__item-title">
            <?= $rate['title'] ?>
        </h2>
        <div class="rates__item-subtitle">стоимость</div>
        <div class="rates__item-price"><?= rateFormat($rate['price']) ?> ₽</div>
        <div class="rates__item-inner">
            <div class="rates__item-subtitle">полная цена</div>
            <div class="rates__item-subtitle">ваша выгода</div>
            <div class="rates__item-oldprice">
                <?= rateFormat($rate['oldPrice']) ?> ₽
                <span>-<?= ceil(($rate['oldPrice'] - $rate['price'])/$rate['oldPrice'] * 100) ?>%</span>
            </div>
            <div class="rates__item-profit">
                <?= rateFormat($rate['oldPrice'] - $rate['price']) ?> ₽</div>
        </div>
        <div class="rates__item-gift">+<?= $rate['gift'] ?></div>
    </div>
    <ul class="rates__item-list">
        <li>Грамматическая выжимка</li>
        <li>Разговорный тренажёр</li>
        <li>Слова с ассоциациями</li>
        <li>Регулярные мини-задания</li>
        <li>Персональный куратор</li>
        <li>Сертификат об обучении</li>
        <li>Звонки от Second Teacher</li>
    </ul>
</div>
<!--    <div class="rates-month__item --><?php //= isset($rate['active']) ? 'active' : '' ?><!--"-->
<!--         data-order-name="--><?php //= $rate['title'] ?><!-- за --><?php //= rateFormat($rate['price']) ?><!-- ₽"-->
<!--         data-order-rate="--><?php //= $prepay; ?><!--">-->
<!---->
<!--        <div class="rates-month__item-title">-->
<!--           --><?php //= $rate['title'] ?>
<!--        </div>-->
<!---->
<!--        <div class="rates-month__fullprice">-->
<!--            --><?php //= rateFormat($rate['price']) ?><!-- ₽-->
<!--            <span>---><?php //= rateFormat(( $rate['oldPrice'] - $rate['price']) * 100 / $rate['oldPrice']) ?><!--%</span>-->
<!--        </div>-->
<!--        <div class="rates-month__oldprice">-->
<!--            --><?php //= rateFormat($rate['oldPrice']) ?><!-- ₽-->
<!--        </div>-->
<!---->
<!--        <div class="rates-month__gift">-->
<!--            <span>--><?php //= $rate['gift'] ?><!--</span>-->
<!--        </div>-->
<!---->
<!--        <ul class="rates-month__features">-->
<!--            <li>--><?php //= $rate['month'] ?><!--</li>-->
<!--            <li>Грамматическая выжимка</li>-->
<!--            <li>Разговорный тренажёр</li>-->
<!--            <li>Слова с ассоциациями</li>-->
<!--            <li>Регулярные мини-задания</li>-->
<!--            <li>Персональный куратор</li>-->
<!--            <li>Сертификат об обучении</li>-->
<!--            <li>-->
<!--                <a href="#features">Best Teachers</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#features">Звонки от Second Teacher</a>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--        <div class="rates-month__prepayment-block">-->
<!--            <div class="rates-month__prepayment-text">Предоплата</div>-->
<!--            <div class="rates-month__prepayment-price">--><?php //= rateFormat($prepay) ?><!-- ₽</div>-->
<!--        </div>-->
<!---->
<!--        <a href="--><?php //= $rate['link_ru'] ?><!--" class="rates-month__button btn-ru js-tink-eq" target="_blank">-->
<!--            <span class="rates-month__button-text">Внести предоплату<br>российской картой</span>-->
<!--        </a>-->
<!---->
<!--        <a href="--><?php //= $rate['link_en'] ?><!--" class="rates-month__button btn-en" target="_blank">-->
<!--            <span class="rates-month__button-text">Внести предоплату<br>зарубежной картой</span>-->
<!--        </a>-->
<!---->
<!--    </div>-->
<?php endforeach; ?>