<script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>

<!-- <a href="#client-popup-ru" data-fancybox id="clientp-ru"></a> -->
<style>

    .client-popup {
        padding: 1.13rem 1.3rem 0;
        width: 30.5rem;
        height: 22.5rem;
        border-radius: 0.3125rem;
        background: #2F2F2F;
        overflow: hidden;
    }
    .client-popup-header {
        width: 19rem;
        margin: 0 auto 1.31rem;
        color: #FFF;
        text-align: center;
        font-family: "Museo Sans", sans-serif;
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 600;
        line-height: 120%; /* 1.8rem */
    }

    .client-popup input {
        width: 100%;
        height: 4.375rem;
        font-size: 1.25rem;
        border-radius: 0.25rem;
        background: #FFF;
        border: none;
        padding: 1.56rem 2.2rem;
        margin-bottom: 0.69rem;
    }

    .client-popup .btn {
        width: 100%;
        height: 4.125rem;
        color: #FFF;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 700;
        line-height: 75%;
        border-radius: 0.25rem;
        background: #FF3E13;
        padding: 1.5rem;
        border: none;
        cursor: pointer;
    }

    .client-popup .btn:hover {
        filter: brightness(1.25);
        transition: filter .2s;
    }

    @media (min-resolution: 2dppx) {
        .client-popup{
            background: url(./images/client-popap/bg@2x.webp) no-repeat;
            background-size: cover;
        }
    }
</style>
<div class="client-popup" id="client-popup-ru" style="display: none;">
    <div class="client-popup-header">
        Введите ваш контакт для формирования счёта
    </div>
    <form action="" class="">
        <div class="form-row">
            <input type="text" name="email" placeholder="Email" value="<?= $_GET['client'] ?? ''; ?>" class="form-input validate[required, email]">
        </div>
        <div class="form-row">
            <input type="text" name="phone" placeholder="Телефон" class="form-input validate[required, phone] telephone">
        </div>

        <div class="form-row form-row-btn">
            <button class="tinkoffPayRow btn form-btn" type="button" onclick="tinkoffPayFunction(this)">Отправить</button>
        </div>
        <input type="hidden" name="token" value="<?= $csrf_token; ?>">

        <input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1676563079414">
        <input class="tinkoffPayRow" type="hidden" name="frame" value="true">
        <input class="tinkoffPayRow" type="hidden" name="language" value="ru">
        <input class="tinkoffPayRow" type="hidden" value="<?= $prepayPrice ?>" name="amount">
        <input class="tinkoffPayRow" type="hidden" value="<?= md5(microtime()); ?>" name="order">
        <input class="tinkoffPayRow" type="hidden" value="" name="description">

        <input class="tinkoffPayRow" type="hidden" name="receipt" value="">


    </form>
</div>
<?
$email = isset($_GET['client']) ? $_GET['client'] : '';
?>
<script>
    const email = '<?= $email; ?>';

    $(document).ready(function() {
        $('.js-tink-eq').on('click', function(e) {
            e.preventDefault();
            // $('#clientp-ru').trigger('click');
            $.fancybox.open({
                src: '#client-popup-ru',
                type: 'inline',
                toolbar: false
            });
            let name = $(this).closest('.rates__item').attr('data-order-name');
            let rate = $(this).closest('.rates__item').attr('data-order-rate');
            $('#client-popup-ru').find('[name="description"]').val(name);
            $('#client-popup-ru').find('[name="amount"]').val(rate);

        });
    });


    function tinkoffPayFunction(target) {

        let form = target.closest('form');
        let name = form.description.value || "Оплата";
        let amount = form.amount.value;
        let email = form.email.value;
        let phone = form.phone.value;
        let client_name = form.name.value;
        let order_number = form.order.value;

        let valid = $(form).validationEngine('validate');

        if (!$(form).hasClass('sended') && valid) {
            $(form).addClass('sended');
            $.ajax({
                url: '/config/integrations/google/API/list_tpay.php',
                data: {
                    'name': client_name,
                    'email': email,
                    'phone': phone,
                    'token': '<?= $csrf_token; ?>',
                    'order': order_number,
                    'order_name': name,
                    'amount': amount
                },
                type: "POST",
                dataType: "html",
                success: function(res) {
                    $(form).removeClass('sended');
                },
                error: function(res) {
                    $(form).removeClass('sended');
                },
            });

            $.fancybox.close();

            form.receipt.value = JSON.stringify({
                "Email": email,
                "Phone": phone,
                "EmailCompany": "info@englishtochka.ru",
                "Taxation": "usn_income_outcome",
                "Items": [{
                    "Name": name,
                    "Price": amount + '00',
                    "Quantity": 1.00,
                    "Amount": amount + '00',
                    "PaymentMethod": "full_prepayment",
                    "PaymentObject": "service",
                    "Tax": "none"
                }]
            });
            pay(form);
        }
    }
</script>