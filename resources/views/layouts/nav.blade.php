<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    @yield('style')
    <script defer src="/js/modalWindow.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="/js/burgerGeneral.js"></script>
</head>

<body>
    <header>
        <div class="header__div"></div>
        <header>
            <nav>
                <div class="nav__info">
                    <ul>
                        <li class="nav__title"><a href="/">bougie</a></li>
                        <li class="nav__margin-li"><a href="{{ route('catalog') }}">Каталог</a> </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="login"><a href="{{ route('login') }}">Вход</a></li>
                            @endif
                        @else
                            <div class="nav__profile">
                                <li><a href="{{ route('favourite') }}"><img style="width: 20px;" src="/image/heart-fav.png"
                                            alt=""></a></li>
                                <li><a href="{{ route('basket') }}"><img style="width: 20px;" src="/image/bag.png"
                                            alt=""></a></li>
                                <li><a href="{{ route('profileCheck') }}"><img style="width: 20px;" src="/image/user.png"
                                            alt=""></a></li>
                            </div>
                        @endguest
                    </ul>

                </div>
                <img class="burger" src="/image/burger.png" alt="img">
            </nav>
        </header>
    </header>
    <main class="py-4">
        @yield('content')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ajax_minus').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('minus') }}" + "/" + id,
                    data: $('.ajax_minus').serialize(),
                    type: 'post',
                    success: function(result) {
                        if (result.count > 0) {
                            $('#count-' + id).html(result.count);
                        } else {
                            $('#productInBasket-' + id).css('display', 'none');
                        }
                        if (result.countAllProduct == 0) {
                            $('#productInBasket__priceAndOrder').css('display', 'none')
                            $('#emptyBasket').css('display', 'block')
                        }
                        $('#productInBasket__sum').html(result.price)

                    }
                })
            })
            $('.ajax_plus').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('plus') }}" + "/" + id,
                    data: $('.ajax_plus').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#count-' + id).html(result.count);
                        $('#productInBasket__sum').html(result.price)
                    }
                })
            })
            $('.ajax_delete').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('delete') }}" + "/" + id,
                    data: $('.ajax_delete').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#productInBasket-' + id).css('display', 'none');
                        $('#productInBasket__sum').html(result.price)
                        if (result.countAllProduct == 0) {
                            $('#productInBasket__priceAndOrder').css('display', 'none')
                            $('#emptyBasket').css('display', 'block')
                        }
                    }
                })
            })
            $('.ajax_deleteFromFav').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('deleteFromFav') }}" + "/" + id,
                    data: $('.ajax_deleteFromFav').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#productInBasket-' + id).css('display', 'none');
                        if (result.countAllProduct == 0) {
                            $('#emptyBasket').css('display', 'block')
                        }
                    }
                })
            })
            $('.ajax_add').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('add') }}" + "/" + id,
                    data: $('.ajax_add').serialize(),
                    type: 'post',
                })
                $('#btns__btn-basket').html('Добавлено в корзину')
                $('#form__basket-' + id).css('display', 'none')
                $('#inBasket-' + id).css('display', 'block')
                $('.addInBasketFromFav-' + id).css('display', 'block')
                $('#ajax_add-' + id).css('display', 'none')
            })

            $('.ajax_addFav').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('addFav') }}" + "/" + id,
                    data: $('.ajax_addFav').serialize(),
                    type: 'post',
                })
                $('#addFav-' + id).css('display', 'none')
                $('#fav-' + id).css('display', 'block')
                $('#form__fav-' + id).css('display', 'none')
                $('#inFav-' + id).css('display', 'block')
            })

            $('.ajax_updateUserInfo').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('updateUserInfo') }}" + "/" + id,
                    data: $('.ajax_updateUserInfo').serialize(),
                    type: 'post',
                    // console.log( url('updateUserInfo') )
                    success: function(result) {
                        if (result.error==true) {
                            $('.updateUserInfo__window-error').css('display', 'block')
                            $('.updateUserInfo__window').css('display', 'none')
                        } else {
                            $('.updateUserInfo__window-error').css('display', 'none')
                            $('.updateUserInfo__window').css('display', 'block')
                            $('.hello__name').html(result.name)
                        }
                    }
                })
            })
            $('.ajax_addAddress').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();

                $.ajax({
                    url: "{{ url('addAddress') }}" + "/" + id,
                    data: $('.ajax_addAddress').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('.modal-wrapper').css('display', 'none');
                        if (result.flat != null) {
                            $('.address').prepend(
                                ` <div class="address-` + result.id +
                                ` address__item"> 
                                <input checked type="radio" name="address" id="address-` +
                                result.id + `"
                                    value="` + result.id + `">
                                <label class = "label-address" for="address-` + result.id + `">г. ` + result.city +
                                `, ул. ` + result.street +
                                `, д. ` + result
                                .house + `, кв. ` + result.flat + `</label> <p class = "deleteAddress"
                        data-address = "` + result.id + `" > X </p></div>`)
                        } else {
                            $('.address').prepend(
                                ` <div class="address-` + result.id +
                                ` address__item"> 
                                <input checked type="radio" name="address" id="address-` +
                                result.id + `"
                                    value="` + result.id + `">
                                <label class="label-address" for="address-` + result.id + `">г. ` + result.city +
                                `, ул. ` + result.street +
                                `, д. ` + result
                                .house + `</label> 
                                <p class = "deleteAddress"
                        data-address = "` + result.id + `" > X </p></div>`)

                        }

                    }
                })
            })
            $('.ajax_deleteAddress').on('submit', function(event) {
                let id = $(this).attr('data-id');
                console.log(id)
                event.preventDefault();
                $.ajax({
                    url: "{{ url('deleteAddress') }}" + "/" + id,
                    data: $('.ajax_deleteAddress').serialize(),
                    type: 'delete',
                })

                $('.modal-wrapper-address').css('display', 'none')
                $('.address-' + id).remove();
            })
        })
    </script>
</body>

</html>
