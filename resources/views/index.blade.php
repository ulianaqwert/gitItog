<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/modalWindow.css">
    <script defer src="/js/modalWindow.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="/js/slick.min.js"></script>
    <script defer src="/js/script.js"></script>
    <script defer src="/js/burger.js"></script>
    <title>Главная</title>
</head>

<body>
    <div class="conteiner">
        <header>
            <nav>
                <div class="nav-img">
                    <img class="nav__image" src="/image/general.png" alt="img">
                </div>
                <div class="nav__info">
                    <ul class="info__ul">
                        <li class="nav__title"><a href="/">bougie</a></li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav__margin-li"><a
                                        href="{{ route('catalog') }}">Каталог</a> </li>
                                <li class="login"><a href="{{ route('login') }}">Вход</a></li>
                            @endif
                        @else
                            <div class="nav__profile">
                                <li class="nav__profile_catalog" class="nav__margin-li"><a
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
                    <div class="about">
                        <h1 class="about__title">посвечим?</h1>
                        <p class="about__desc">Натуральные свечи из своего воска с изюминкой</p>
                        <ul class="about__ul">
                            <li>экологически чистый состав</li>
                            <li>необычные сочетания ароматов</li>
                            <li>безопасные для детей и беременных женщин</li>
                        </ul>
                        <a href="{{ route('catalog') }}"><button class="about__btn">Каталог</button></a>
                    </div>
                </div>
            </nav>
        </header>

        <main>


            <div class="info-company">
                <div class="info-company__info">
                    <div class="info-company__block">
                        <div class="info-company__login">
                            <p>
                                <a class="info-company__a" href="{{ route('login') }}">Авторизуйтесь на сайте</a> и
                                получите доступ к персональным функциям
                            </p>
                        </div>
                        <div>
                            <div class="info-company__slider">
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/покупки.png"
                                            alt="img">
                                        <p class="item-div__desc">Совершайте выгодные покупки</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/cart.png"
                                            alt="img">
                                        <p class="item-div__desc">Добавляйте товары в корзину</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/box.png"
                                            alt="img">
                                        <p class="item-div__desc">Здесь будут ваши заказы</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/heart.png"
                                            alt="img">
                                        <p class="item-div__desc">Лайкайте понравившиеся товары</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-company__slider_480">
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/покупки.png"
                                            alt="img">
                                        <p class="item-div__desc">Совершайте выгодные покупки</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/cart.png"
                                            alt="img">
                                        <p class="item-div__desc">Добавляйте товары в корзину</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/box.png"
                                            alt="img">
                                        <p class="item-div__desc">Здесь будут ваши заказы</p>
                                    </div>
                                </div>
                                <div class="slider__item">
                                    <div class="slider__item-div">
                                        <img style="width: 30px;" class="item-div__img" src="/image/heart.png"
                                            alt="img">
                                        <p class="item-div__desc">Лайкайте понравившиеся товары</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('job') }}">
                        <div class="info-company__div money">
                            <p>
                                Вакансии</p>
                            <p class="info-company__desc">Ждем именно тебя!</p>
                            <img class="info-company__image-money" src="/image/team.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="info-company__contact">
                    <h1>Контакты</h1>
                    @foreach ($contacts as $contact)
                        <p>Телефон: {{ $contact->phone }}</p>
                        <p>Почта: {{ $contact->email }}</p>
                        <p>Адрес офиса: {{ $contact->address }}</p>
                    @endforeach
                </div>
            </div>


            <div class="new">
                <h2 class="new__title">ВЫБЕРИ ЭСТЕТИКУ СВОЕГО ОКРУЖЕНИЯ...</h2>
                <p class="new__desc">Новинки</p>
                <div class="new__cards">
                    @foreach ($newProducts as $product)
                        <div class="cards__card">
                            <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                                <div class="card__img"
                                    style="background-image: url({{ $product->photo }}); background-repeat:no-repeat; background-size: cover;">
                                </div>
                            </a>
                            <div class="card__icons">

                                @if (auth()->user() != null)
                                    @if (in_array($product->id, $arr))
                                        <button><img class="card__basket in_basket"
                                                src="/image/free-icon-tick-3106690.png" alt="img"></button>
                                    @else
                                        <form id="form__basket-{{ $product->id }}"
                                            action="{{ url('/add') }}/{{ $product->id }}" method="POST"
                                            class="ajax_add" data-id="{{ $product->id }}">
                                            @csrf

                                            <button
                                                @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                                type="submit"><img class="card__basket"
                                                    src="/image/free-icon-shopping-bag-2956820 1.png"
                                                    alt="img"></button>
                                        </form>
                                    @endif

                                    @if (in_array($product->id, $fav))
                                        <button class="card__fav"><img src="/image/inFav.png"
                                                alt="img"></button>
                                    @else
                                        <form id="form__fav-{{ $product->id }}"
                                            action="{{ url('/addFav') }}/{{ $product->id }}" method="POST"
                                            class="ajax_addFav" data-id="{{ $product->id }}">
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
                                            class="card__basket message"
                                            src="/image/free-icon-shopping-bag-2956820 1.png" alt="img"></button>
                                    <button
                                        @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                        class="card__fav message"><img class="message" src="/image/productFav.png"
                                            alt="img"></button>
                                @endif

                                <form id="inBasket-{{ $product->id }}" style="display: none;">
                                    <button><img class="card__basket in_basket"
                                            src="/image/free-icon-tick-3106690.png" alt="img"></button>
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
            </div>


            <div class="slider">
                @foreach ($promotions as $promo)
                    <a href="{{ route('promo', $promo->id) }}">
                        <div class="slider__item">
                            <img src="{{ $promo->photo }}" alt="img">
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="slider__800">
                @foreach ($promotions as $promo)
                    <a href="{{ route('promo', $promo->id) }}">
                        <div class="slider__item">
                            <img src="{{ $promo->photo }}" alt="img">
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="slider__480">
                @foreach ($promotions as $promo)
                    <a href="{{ route('promo', $promo->id) }}">
                        <div class="slider__item">
                            <img src="{{ $promo->photo }}" alt="img">
                        </div>
                    </a>
                @endforeach
            </div>


            <div class="popular">
                <h2 class="popular__title">И НАСЛАДИСЬ <br> АТМОСФЕРОЙ СПОКОЙСТВИЯ</h2>
                <p class="popular__desc">Популярное</p>
                <div class="popular__cards">
                    @foreach ($popularProducts as $product)
                        <div class="cards__card">
                            <a href="{{ route('productCatalog', ['id' => $product->id]) }}">
                                <div class="card__img"
                                    style="background-image: url({{ $product->photo }}); background-repeat:no-repeat; background-size: cover;">
                                </div>
                            </a>
                            <div class="card__icons">

                                @if (auth()->user() != null)
                                    @if (in_array($product->id, $arr))
                                        <button><img class="card__basket in_basket"
                                                src="/image/free-icon-tick-3106690.png" alt="img"></button>
                                    @else
                                        <form id="form__basket-{{ $product->id }}"
                                            action="{{ url('/add') }}/{{ $product->id }}" method="POST"
                                            class="ajax_add" data-id="{{ $product->id }}">
                                            @csrf

                                            <button
                                                @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                                type="submit"><img class="card__basket"
                                                    src="/image/free-icon-shopping-bag-2956820 1.png"
                                                    alt="img"></button>
                                        </form>
                                    @endif

                                    @if (in_array($product->id, $fav))
                                        <button class="card__fav"><img src="/image/inFav.png"
                                                alt="img"></button>
                                    @else
                                        <form id="form__fav-{{ $product->id }}"
                                            action="{{ url('/addFav') }}/{{ $product->id }}" method="POST"
                                            class="ajax_addFav" data-id="{{ $product->id }}">
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
                                            class="card__basket message"
                                            src="/image/free-icon-shopping-bag-2956820 1.png" alt="img"></button>
                                    <button
                                        @if ($product->count == 0) @disabled(true) style="opacity: 50%;" @endif
                                        class="card__fav message"><img class="message" src="/image/productFav.png"
                                            alt="img"></button>
                                @endif

                                <form id="inBasket-{{ $product->id }}" style="display: none;">
                                    <button><img class="card__basket in_basket"
                                            src="/image/free-icon-tick-3106690.png" alt="img"></button>
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
            </div>

            <div class="modal-wrapper">
                <div class="modal">
                    <p class="closed">X</p>
                    <h3 class="modal__title">Для начала совершите вход</h3>
                    <p class="modal__desc">Некоторые действия не доступны неавторизированным пользователям</p>
                    <button class="modal__entrance"><a href="{{ route('login') }}">Войти</a></button>
                </div>
            </div>

            <div class="delivery">
                <div class="delivery__info">
                    <h2>ПОКУПАЙТЕ НЕ ВЫХОДЯ ИЗ ДОМА</h2>
                    <p>Доставим к вашей двери или в пункт выдачи.</p>
                    <a href="{{ route('deliveryInfo') }}">Читать больше</a>
                </div>
                <div class="delivery__img">
                    <img src="/image/Group 27.png" alt="img">
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
                event.preventDefault();
                $.ajax({
                    url: "{{ url('add') }}" + "/" + id,
                    data: $('.ajax_add').serialize(),
                    type: 'post',
                })
                $('#form__basket-' + id).css('display', 'none')
                $('#inBasket-' + id).css('display', 'block')
            })


            $('.ajax_addFav').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('addFav') }}" + "/" + id,
                    data: $('.ajax_addFav').serialize(),
                    type: 'post',
                })
                $('#form__fav-' + id).css('display', 'none')
                $('#inFav-' + id).css('display', 'block')
            })
        })
    </script>
    <script src="/js/burger.js"></script>
</body>

</html>
