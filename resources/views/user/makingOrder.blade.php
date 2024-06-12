@extends('layouts.nav')
@section('title', 'Оформление заказа')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/modalWindow.css">
@endsection
@section('content')
    <h1 class="profile__title">Оформление заказа</h1>
    <div class="makingOrder">
        <div class="makingOrder__infoAboutUser">
            <form action="{{ route('finishOrder') }}" method="POST">
                @csrf
                <div class="delivery">
                    <div class="delivery">
                        <input type="radio" name="delivery" id="del" value="{{ $deliveries[0]['id'] }}" checked>
                        <label style="margin-right: 75px" class="tab" data-tab="tab-1"
                            for="del">{{ $deliveries[0]['name'] }}</label>
                        <input type="radio" name="delivery" id="sam" value="{{ $deliveries[1]['id'] }}">
                        <label class="tab" data-tab="tab-2" for="sam">{{ $deliveries[1]['name'] }}</label>
                    </div>
                    <div class="tab-content">
                        <div class="tab-hidden" id="tab-1">
                            <p class="address__pick-p">ВНИМАНИЕ! Доставка доступна исключительно на территории города
                                Челябинск.</p>
                            <div class="address">
                                @foreach ($addresses as $address)
                                    <div class="address-{{ $address->id }} address__item">
                                        <input type="radio" name="address" id="address-{{ $address->id }}"
                                            value="{{ $address->id }}">
                                        <label class="label-address" for="address-{{ $address->id }}">г.
                                            {{ $address->city }}, ул.
                                            {{ $address->street }}, д. {{ $address->house }}
                                            @if ($address->flat != null)
                                                , кв. {{ $address->flat }}
                                            @endif
                                        </label>
                                        <p class="deleteAddress" data-address="{{ $address->id }}">X</p>
                                    </div>
                                @endforeach
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <br>
                                <p id="addAddress" class="message">Добавить адрес +</p>
                            </div>
                        </div>
                        <div class="tab-hidden" id="tab-2">
                            <select name="pick" id="pick">
                                @foreach ($pickups as $pick)
                                    <option value="{{ $pick->id }}">г. Челябинск, ул. {{ $pick->street }}, д.
                                        {{ $pick->house }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button class="makingOrder__infoAboutUser-btn" type="submit">Оформить заказ</button>


            </form>
        </div>
        <div class="makingOrder__products">
            <h2 class="makingOrder__products-title">Сумма заказа: {{ $price[0]->sum }} руб</h2>
            <div class="products">
                @foreach ($baskets as $basket)
                    <div class="products__product">
                        <div
                            style="width: 200px; height: 250px; background-image: url({{ $basket->photo }}); background-repeat:no-repeat; background-size: cover;">
                        </div>
                        <div class="product__info">
                            <h2>{{ $basket->name }}</h2>
                            <p>{{ $basket->price }} руб</p>
                            <p>Кол-во: {{ $basket->count }} шт.</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
    <div class="modal-wrapper">
        <div class="modal">
            <p class="closed">X</p>
            <h3 class="modal__title">Добавьте адрес доставки</h3>
            <form action="{{ url('/addAddress') }}/{{ auth()->user()->id }}" method="POST" class="ajax_addAddress"
                data-id="{{ auth()->user()->id }}">
                @csrf
                <input type="text" name="street" placeholder="введите улицу" class="street"
                    onkeypress="noDigits(event)">
                <input type="text" name="house" placeholder="введите дом">
                <input type="text" name="flat" placeholder="введите квартиру">
                <button class="modal__entrance" type="submit">Добавить</button>
            </form>
        </div>
    </div>

    <div class="modal-wrapper-address">
        <div class="modal">
            <p class="closedAddress">X</p>
            <h3 class="modal__title">Удаление адреса</h3>
            <form method="POST" class="ajax_deleteAddress">
                @csrf
                @method('DELETE')
                <p>Вы точно хотите удалить адрес?</p>
                <button class="modal__entrance" type="submit">Да</button>
            </form>
        </div>
    </div>

    <script src="/js/order.js"></script>
    <script>
        function noDigits(event) {
            if ("1234567890".indexOf(event.key) != -1)
                event.preventDefault();
        }
    </script>

@endsection
