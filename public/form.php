<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>qwe</title>
    </head>

    <body>
        <form method="POST" action="https://yoomoney.ru/quickpay/confirm.xml">
            <input type="hidden" name="receiver" value="4100117586304990">
            <input type="hidden" name="formcomment" value="Проект">
            <input type="hidden" name="short-dest" value="Проект">
            <input type="hidden" name="label" value="123">
            <input type="hidden" name="quickpay-form" value="donate">
            <input type="hidden" name="targets" value="транзакция 123">
            <input type="hidden" name="sum" value="10" data-type="number">
            <input type="hidden" name="comment" value="Хотелось бы">
            <!-- <input type="hidden" name="need-fio" value="true">
            <input type="hidden" name="need-email" value="true">
            <input type="hidden" name="need-phone" value="false">
            <input type="hidden" name="need-address" value="false"> -->
            <!-- <label><input type="radio" name="paymentType" value="PC">ЮMoney</label>
            <label><input type="radio" name="paymentType" value="AC">Банковской картой</label> -->
            <input type="submit" value="Перевести">
        </form>
    </body>
</html>

