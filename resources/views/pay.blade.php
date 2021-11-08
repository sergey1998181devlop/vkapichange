<style>
    @media (min-width: 768px) {

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .parent {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            overflow: auto;
        }

        .block {
            width: 416px;
            height: 224px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -138px 0 0 -191px;
            /*background: #60a839;*/
        }
        .payment-form {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border: none;
        }
    }


</style>
<div class="parent">
    <div class="block">
        <div id="payment-form"></div>
    </div>
</div>


<script type="text/javascript" src="https://www.payanyway.ru/assistant-builder">
</script>
<script type="text/javascript">
    var CryptoJSAesJson = {
        stringify: function (cipherParams) {
            var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
            if (cipherParams.iv) j.iv = cipherParams.iv.toString();
            if (cipherParams.salt) j.s = cipherParams.salt.toString();
            return JSON.stringify(j);
        },
        parse: function (jsonStr) {
            var j = JSON.parse(jsonStr);
            var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
            if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
            if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
            return cipherParams;
        }
    }
    var gets = (function() {
        var a = window.location.search;
        var b = new Object();
        a = a.substring(1).split("&");
        for (var i = 0; i < a.length; i++) {
            c = a[i].split("=");
            b[c[0]] = c[1];
        }
        return b;
    })();
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    var options = {
        account: 92367863,
        amount: "{{ $amountPrice }}",
        description: "Оплата для - Бот продажа/обмен товаров / отдам даром на сумму {{ $amountPrice }} руб" ,
        transactionId: getRandomInt(999999999, 9999999999),
        // testMode : 1,
        customParams : {
            id : gets.id
        }
    };

    var assistant = new Assistant.Builder();

    // платёж прошёл успешно
    assistant.setOnSuccessCallback(function(operationId, transactionId) {

        // todo: здесь можно сделать что угодно – например,
        // перенаправить на другую страницу:
        location.replace("/success-pay?operationId="+operationId+"&transactionId="+transactionId+"&account="+gets.id+"&amountPrice={{ $amountPrice }}");
    });

    // платёж не прошёл
    assistant.setOnFailCallback(function(operationId, transactionId) {
        // todo: действия на ваш вкус
    });

    // платёж обрабатывается
    assistant.setOnInProgressCallback(function(operationId, transactionId) {
        // todo: тоже можно что-нибудь придумать
    });

    assistant.build(options, 'payment-form');

</script>
