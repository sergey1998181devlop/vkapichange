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
        width: 472px;
        height: 306px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -125px 0 0 -239px;
        /*background: #60a839;*/
        border: 3px solid #646664;
    }
    .payment-form {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border: none;
    }
    .center .title{
        height: 36px;
        text-align: center;
    }
    .center  .imageBl{
        height: 162px;
        text-align: center;
    }
    .center  .imageBl .imageBlCircle{
        border-radius: 50%;
        width: 253px;
        display: inline-block;
        height: auto;
    }
    .center  .imageBl .imageBlCircle img{
        width: inherit;
        height: inherit;
    }
    .center  .dataSuccess{
        text-align: center;
    }
}
    @media (min-width: 460px) {
        .center .title{
            font-size: 24px;
            height: 71px;
        }
        .center  .dataSuccess p {
            font-size: 25px;
        }
        .block {
            height: 412px;
            width: 583px;
            margin: -127px 0 0 -291px;
        }
    }
</style>
<div class="parent">
    <div class="block">
        <div class="center">
            <div class="title">
                <h3>Бот продажа /обмен товаров <br> отдам даром</h3>
            </div>
            <div class="imageBl">
                <div class="imageBlCircle">
                    <img src="https://sun9-15.userapi.com/impg/bozSdnK7Iof0cmJNCDmc4x2_yiH5h5w5P5z8pg/c2iLiYvgKt0.jpg?size=1200x739&quality=96&sign=c9c41cfa71eef190680f5fd54ae6c04f&type=album">
                </div>
            </div>

            <div class="dataSuccess">
                <p>{{ $userName }} {{ $surName }} для совершения оплаты - выберите способ оплаты в боте!
                </p>
            </div>
        </div>
    </div>
</div>

