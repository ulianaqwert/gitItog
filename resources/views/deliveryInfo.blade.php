@extends('layouts.nav')
@section('title', 'Доставка')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/politic.css">
@endsection
@section('content')
    <div class="deliveryInfo">
        <h1>Доставка и оплата</h1>
        <div class="info__item">
        </div>
        <div class="info__item">
            <p class="accordion">Общие правила</p>
            <div class="panel">
                <p>
                    Компания принимает заказы исключительно на территрии города Челяюбинска.
                </p>
            </div>
            <p class="accordion">Курьерская доставка в руки</p>
            <div class="panel">
                <p>Курьер приносит вам отправление лично в руки.
                    Как получить. Курьер принесет заказ вам в офис или домой.
                    Вы проверяеете заказ а месте, после чего оплачиваете его (если товар удовлетворил ваши ожидания), либо
                    отправлете обратно тем же курьером.
                </p>
            </div>
            <p class="accordion accordion_last">Самовывоз из пункта выдачи Сдэк</p>
            <div class="panel panel_last">
                <p>Вы забираете свой заказ в пункте выдачи.
                    Как получить. Когда заказ поступит в выбранный вами пункт выдачи заказов, вам сообщат по номеру телефона
                    о готовности, в пункте выдаче необходимо назвать номер заказа.
                </p>
            </div>
        </div>
    </div>
@endsection
