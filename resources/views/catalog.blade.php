@extends('layouts.nav')
@section('title', 'Каталог')
@section('style')
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/modalWindow.css">
    <link rel="stylesheet" href="/css/general.css">
    <style>
        .relative {
            width: 16vw;
            margin-top: 10px;
            border: 1px solid black;
            padding: 10px 20px;
            border-radius: 10px;
            text-align: center;
        }

        nav[role="navigation"]:first-child{
            background-color: black;
        }

        nav[role="navigation"] {
            /* width: 16vw; */
            margin-top: 40px;
            justify-content: flex-start;
            gap: 3.5%;
        }

        @media(max-width:800px) {
            .relative {
                width: 26vw;
            }
        }

        @media(max-width:480px) {
            .relative {
                width: 35vw;
                font-size: 12px;
            }
        }

        @media(max-width:360px) {
            nav[role="navigation"] {
                flex-direction: column;
        }
        nav[role="navigation"] {
            margin-top: 20px;
        }
        }
    </style>
@endsection
@section('content')
    <div class="conteiner">
        <h1 class="title">Каталог</h1>
        <ul>
            <li><a href="{{ route('catalog') }}" @if (!$categoryId) class="active" @endif>Все ароматы</a></li>
            @foreach ($categories as $category)
                <li><a @if ($categoryId == $category->id) class="active" @endif
                        href="{{ route('productsByCategory', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
        <div class="cards">
            @foreach ($products as $product)
                <div class="cards__card">
                    <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                        <div class="card__img"
                            style="width: 250px; height: 350px; background-image: url({{ $product->photo }}); background-repeat:no-repeat; background-size: cover;">
                        </div>
                    </a>
                    <div class="card__icons">
                        @if (auth()->user() != null)
                            @if (in_array($product->id, $arr))
                                <button><img class="card__basket in_basket" src="/image/free-icon-tick-3106690.png"
                                        alt="img"></button>
                            @else
                                <form id="form__basket-{{ $product->id }}" action="{{ url('/add') }}/{{ $product->id }}"
                                    method="POST" class="ajax_add" data-id="{{ $product->id }}">
                                    @csrf

                                    <button
                                        @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                        type="submit"><img class="card__basket"
                                            src="/image/free-icon-shopping-bag-2956820 1.png" alt="img"></button>
                                </form>
                            @endif

                            @if (in_array($product->id, $fav))
                                <button class="card__fav"><img src="/image/inFav.png" alt="img"></button>
                            @else
                                <form id="form__fav-{{ $product->id }}" action="{{ url('/addFav') }}/{{ $product->id }}"
                                    method="POST" class="ajax_addFav" data-id="{{ $product->id }}">
                                    @csrf
                                    <button class="fav__btn"
                                        @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                        type="submit"><img src="/image/productFav.png" alt="img"
                                            alt="img"></button>
                                </form>
                            @endif
                        @else
                            <button
                                @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif><img
                                    class="card__basket message" src="/image/free-icon-shopping-bag-2956820 1.png"
                                    alt="img"></button>
                            <button
                                @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                class="card__fav message"><img class="message" src="/image/productFav.png"
                                    alt="img"></button>
                        @endif

                        <form id="inBasket-{{ $product->id }}" style="display: none;">
                            <button><img class="card__basket in_basket" src="/image/free-icon-tick-3106690.png"
                                    alt="img"></button>
                        </form>
                        <form id="inFav-{{ $product->id }}" style="display: none;">
                            <button class="card__fav"><img src="/image/inFav.png" alt="img"></button>
                        </form>
                    </div>
                    @if ($product->count == 0)
                        <p class="countZero">Товар закончился</p>
                    @endif
                    <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                        <p class="card__title">{{ $product->name }}</p>
                    </a>
                    <p class="card__prise">{{ $product->price }} руб</p>
                </div>
            @endforeach
        </div>
        {{-- @if (empty(links())) --}}
        {{ $products->links() }}
        {{-- @endif --}}
        <div class="modal-wrapper">
            <div class="modal">
                <p class="closed">X</p>
                <h3 class="modal__title">Для начала совершите вход</h3>
                <p class="modal__desc">Некоторые действия не доступны неавторизированным пользователям</p>
                <button class="modal__entrance"><a href="{{ route('login') }}">Войти</a></button>
            </div>
        </div>
    </div>
@endsection
