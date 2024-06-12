@extends('layouts.nav')
@section('title', 'Мои заказы')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/profile.css">
@endsection
@section('content')
    <h1 class="profile__title">Мои заказы</h1>
    <div class="basket">
        <div class="profile profile-order">
            <div class="menu">
                <div class="menu__hello">
                    <h2 class="hello__hello">Здравствуй,</h2>
                    <p class="hello__name">{{ Auth::user()->name }}</p>
                </div>
                <ul class="menu__ul">
                    <li><a class="menu_a" href="{{ route('orderUser') }}"><img class="menu_image" src="/image/order.png"
                                alt=""> Мои заказы</a></li>
                    <li><a class="menu_a" href="{{ route('basket') }}"><img class="menu_image" src="/image/basket.png"
                                alt="">Корзина</a></li>
                    <li><a class="menu_a" href="{{ route('favourite') }}"><img class="menu_image" src="/image/fav.png"
                                alt="">Избранное</a></li>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="menu_a" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img
                                    class="menu_image" src="/image/logout.png" alt="">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="orders">
            @if ($orders->count() == 0)
                <h2 style="font-weight: 200">У вас пока нет заказов, вперед за <a style="font-weight: 300"
                        href="{{ route('catalog') }}"> покупками</a></h2>
            @else
                @foreach ($orders as $order)
                    <div class="orders__order">

                        <div class="order__top">
                            <div class="top">
                                <h2>Заказ #{{ $order->id }}</h2>
                                <p>от {{ $order->date_making }}</p>
                            </div>
                        </div>
                        <div class="order__bottom">
                            @if ($order->status_id == 4)
                                <p style="width: 80%; padding-bottom: 20px;">{{ $order->reason_cancel }}</p>
                            @endif
                            <table>
                                <tr>
                                    <th style="width: 25%">
                                        <p>Способ доставки</p>
                                    </th>
                                    <th>
                                        <p>Адрес</p>
                                    </th>
                                    <th style="padding-left: 30px;">
                                        <p>Статус</p>
                                    </th>
                                </tr>
                                @foreach ($deliveries as $delivery)
                                    @if ($delivery->id == $order->delivery_id)
                                        <td>{{ $delivery->name }}</td>
                                    @endif
                                @endforeach
                                <td style="margin-bottom: 40px">г.
                                    Челябинск, ул. {{ $order->street }}, д.
                                    {{ $order->house }}
                                    @if ($order->flat != null)
                                        , кв. {{ $order->flat }}
                                    @endif
                                </td>
                                @foreach ($statuses as $status)
                                    @if ($status->id == $order->status_id)
                                        <td style="padding-left: 30px;">{{ $status->name }}</td>
                                    @endif
                                @endforeach
                            </table>
                            <a class="order__a" href="{{ route('productsInOrderUser', $order->id) }}">Подробнее ></a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>

@endsection
