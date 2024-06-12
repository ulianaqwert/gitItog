<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/modalWindow.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/product.css">
    <script defer src="/js/modalWindow.js"></script>
    <script defer src="/js/product.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="/js/burger.js"></script>
    <title>{{ $product->name }}</title>
</head>

<body>
    <div class="conteiner">
        <header>
            <nav style="gap: 150px;">
                <div class="nav-img">
                    <div class="nav__image" style="background-image: url({{ $product->photo }});">
                    </div>
                </div>
                <div class="nav__info">
                    <ul class="info-ul">
                        <li class="nav__title"><a href="/">bougie</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav__margin-li"><a href="{{ route('catalog') }}">Каталог</a> </li>
                                <li class="login"><a href="{{ route('login') }}">Вход</a></li>
                            @endif
                        @else
                            <div class="nav__profile">
                                <li class="nav__profile_catalog" style="margin-left: 40%;" class="nav__margin-li"><a
                                        href="{{ route('catalog') }}">Каталог</a> </li>
                                <li><a href="{{ route('favourite') }}"><img style="width: 20px;" src="/image/heart-fav.png"
                                            alt=""></a></li>
                                <li><a href="{{ route('basket') }}"><img style="width: 20px;" src="/image/bag.png"
                                            alt=""></a></li>
                                <li><a href="{{ route('profileCheck') }}"><img style="width: 20px;" src="/image/user.png"
                                            alt=""></a></li>
                        </div>@endguest
                    </ul>

                    <img class="burger" src="/image/burger.png" alt="img">
                    <div class="info" id="{{ $product->id }}">
                        <h1 class="info__title">{{ $product->name }}</h1>
                        <p class="info__price-p">Цена: <span class="info__price">{{ $product->price }} руб</span></p>
                        <div class="tab-title">
                            <ul class="tab__ul">
                                <li class="tab" data-tab="tab-1">Описание</li>
                                <li class="tab" data-tab="tab-2">Состав</li>
                                <li class="tab" data-tab="tab-3">Аромат</li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-hidden" id="tab-1">
                                <p class="info__desc">{{ $product->info }}</p>
                            </div>
                            <div class="tab-hidden" id="tab-2">
                                <p class="info__desc">{{ $product->structure }}</p>
                            </div>
                            <div class="tab-hidden" id="tab-3">
                                <p class="tab-hidden__p tab-category">
                                    категория...........<span>{{ $product->category->name }}</span></p>
                                <p class="tab-hidden__p">верхние ноты...........<span>{{ $product->top }}</span></p>
                                <p class="tab-hidden__p">средние ноты...........<span>{{ $product->medium }}</span></p>
                                <p class="tab-hidden__p tab-base">базовые
                                    ноты...........<span>{{ $product->base }}</span></p>
                            </div>
                        </div>
                        <p class="review__p"><a class="info__reviews-a"
                                href="{{ route('review', $product->id) }}">{{ $countReviews[0]->count }}
                                отзывa(ов)</a></p>
                        @if ($product->count == 0)
                            <p class="countZero">Товар закончился</p>
                        @endif

                        <div class="info__btns">
                            @if (auth()->user() != null)
                                @if (isset($productInBasket[0]))
                                    <button class="btns__btn-basket">Добавлено в корзину</button>
                                @else
                                    <form action="{{ url('/add') }}/{{ $product->id }}" method="POST"
                                        class="ajax_add" data-id="{{ $product->id }}">
                                        @csrf
                                        <button
                                            @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                            type="submit" class="btns__btn-basket" id="btns__btn-basket">Добавить в
                                            корзину</button>
                                    </form>
                                @endif
                                @if (isset($productInFav[0]))
                                    <button class="btns__btn-fav"><img src="/image/inFavOneProduct.png"
                                            alt="img"></button>
                                @else
                                    <form style="position: static;" id="form__fav-{{ $product->id }}"
                                        action="{{ url('/addFav') }}/{{ $product->id }}" method="POST"
                                        class="btns__btn-fav ajax_addFav" data-id="{{ $product->id }}">
                                        @csrf
                                        <button
                                            @if ($product->count == 0) @disabled(true) style="background: none; border: none; opacity: 50%;" @endif
                                            type="submit"
                                            style="background-color: rgba(0, 0, 0, 0); border: none;"><img
                                                src="/image/productFavOne.png" alt="img" alt="img"></button>
                                    </form>
                                    <button style="display: none;" id="product-{{ $product->id }}"
                                        class="btns__btn-fav"><img src="/image/inFavOneProduct.png"
                                            alt="img"></button>
                                @endif
                            @else
                                <button
                                    @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                    class="btns__btn-basket message">Добавить в корзину</button>
                                <button class="btns__btn-fav" style="border: none;" class="message"
                                    @if ($product->count == 0) @disabled(true) style="background: black; border: none; opacity: 50%;" @endif
                                    type="submit"><img class="message" src="/image/productFav.png"
                                        alt="img"></button>
                            @endif

                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <h2 class="similar-title">Похожие ноты</h2>
            <div class="cards">
                @foreach ($similarProducts as $productS)
                    <div class="cards__card">
                        <a href="{{ route('productCatalog', ['id' => $productS->id]) }}">
                            <div class="card__img"
                                style="width: 250px; height: 350px; background-image: url({{ $productS->photo }}); background-repeat:no-repeat; background-size: cover;">
                            </div>
                        </a>
                        <div class="card__icons">

                            @if (auth()->user() != null)
                                @if (in_array($productS->id, $arr))
                                    <button><img class="card__basket in_basket"
                                            src="/image/free-icon-tick-3106690.png" alt="img"></button>
                                @else
                                    <form id="form__basket-{{ $productS->id }}"
                                        action="{{ url('/add') }}/{{ $productS->id }}" method="POST"
                                        class="ajax_add" data-id="{{ $productS->id }}">
                                        @csrf

                                        <button
                                            @if ($productS->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                            type="submit"><img class="card__basket"
                                                src="/image/free-icon-shopping-bag-2956820 1.png"
                                                alt="img"></button>
                                    </form>
                                @endif

                                @if (in_array($productS->id, $fav))
                                    <button class="card__fav"><img src="/image/inFav.png" alt="img"></button>
                                @else
                                    <form id="form__fav-{{ $productS->id }}"
                                        action="{{ url('/addFav') }}/{{ $productS->id }}" method="POST"
                                        class="ajax_addFav" data-id="{{ $productS->id }}">
                                        @csrf
                                        <button class="fav__btn"
                                            @if ($productS->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                            type="submit"><img src="/image/productFav.png" alt="img"
                                                alt="img"></button>
                                    </form>
                                @endif
                            @else
                                <button
                                    @if ($productS->count == 0) @disabled(true) style="opacity: 50%;" @endif><img
                                        class="card__basket message" src="/image/free-icon-shopping-bag-2956820 1.png"
                                        alt="img"></button>
                                <button
                                    @if ($productS->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                    class="card__fav message"><img class="message" src="/image/productFav.png"
                                        alt="img"></button>
                            @endif

                            <form id="inBasket-{{ $productS->id }}" style="display: none;">
                                <button><img class="card__basket in_basket" src="/image/free-icon-tick-3106690.png"
                                        alt="img"></button>
                            </form>
                            <form id="inFav-{{ $productS->id }}" style="display: none;">
                                <button class="card__fav"><img src="/image/inFav.png" alt="img"></button>
                            </form>
                        </div>
                        @if ($productS->count == 0)
                            <p class="countZero zero-similar">Товар закончился</p>
                        @endif
                        <a href="{{ route('productCatalog', ['id' => $productS->id]) }}">
                            <p class="card__title">{{ $productS->name }}</p>
                        </a>
                        <p class="card__prise">{{ $productS->price }} руб</p>
                    </div>
                @endforeach
            </div>

            <div class="modal-wrapper">
                <div class="modal">
                    <p class="closed">X</p>
                    <h3 class="modal__title">Для начала совершите вход</h3>
                    <p class="modal__desc">Некоторые действия не доступны неавторизированным пользователям</p>
                    <button class="modal__entrance"><a href="{{ route('login') }}">Войти</a></button>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer__info">
                <div class="footer__nav">
                    <ul>
                        <li class="footer__li-title">Страницы сайта</li>
                        <li><a href="{{ route('catalog') }}">Каталог</a></li>
                        <li><a href="{{ route('login') }}">Вход/регистрация</a></li>
                    </ul>
                    <ul>
                        <li class="footer__li-title">Мы в соц. сетях</li>
                        <li><a href="https://vk.com/unokia3310">VK</a></li>
                        <li><a href="#">Telegram</a></li>
                        <li><a href="#">Pinterest</a></li>
                    </ul>
                    <ul>
                        <li class="footer__li-title">Др. страницы</li>
                        <li><a href="{{ route('politic') }}">Политика</a></li>
                        <li><a href="{{ route('deliveryInfo') }}">Доставка</a></li>
                        <li><a href="{{ route('job') }}">Вакансии</a></li>
                        <li><a href="{{ route('promotions') }}">Новости</a></li>
                    </ul>
                </div>
                <div class="footer__email">
                    <ul>
                        <li class="footer__li-title">E-mail</li>
                        <li>Не стесняйся, обращайся к нам по электронной почте</li>
                        <li><a href="#">bougie@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <a href="/">
                <h2 class="footer__title">bougie</h2>
            </a>
        </footer>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ajax_add').on('submit', function(event) {
                var id = $(this).data('id');
                let idOne = $('.info').attr('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('add') }}" + "/" + id,
                    data: $('.ajax_add').serialize(),
                    type: 'post',
                })
                if (id == idOne)
                    $('#btns__btn-basket').html('Добавлено в корзину')
                else {
                    $('#form__basket-' + id).css('display', 'none')
                    $('#inBasket-' + id).css('display', 'block')
                }
            })

            $('.ajax_addFav').on('submit', function(event) {
                var id = $(this).data('id');
                console.log(id)
                let idOne = $('.info').attr('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('addFav') }}" + "/" + id,
                    data: $('.ajax_addFav').serialize(),
                    type: 'post',
                })
                $('#product-' + id).css('display', 'block')
                $('#form__fav-' + id).css('display', 'none')
                $('#inFav-' + id).css('display', 'block')
            })

        })
        let visible = true;
        document.querySelector('.burger').addEventListener('click', function() {
            document.querySelector('.info-ul').classList.toggle('product__burger-ul')
            document.querySelector('.nav__info').classList.toggle('product__burger')
        })
    </script>
</body>

</html>
