<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ-панель - @yield('title')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('admin')}}" class="brand-link">
                <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> Админ панель</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="/" class="d-block">Перейти на сайт</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Главная </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-newspaper"></i>
                                <p>Категории
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <p>Все категории</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}" class="nav-link">
                                        <p>Добавить категорию</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('city.index') }}" class="nav-link">
                                        <p>Все города</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('city.create') }}" class="nav-link">
                                        <p>Добавить город</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-newspaper"></i>
                                <p>Пункты самовывоза
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pickup.index') }}" class="nav-link">
                                        <p>Все пункты</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pickup.create') }}" class="nav-link">
                                        <p>Добавить пункт</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-align-left"></i>
                                <p>
                                    Товары
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        <p>Все товары</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('product.create') }}" class="nav-link">
                                        <p>Добавить товар</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-align-left"></i>
                                <p>
                                    Новости
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('promotion.index') }}" class="nav-link">
                                        <p>Все новости</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('promotion.create') }}" class="nav-link">
                                        <p>Добавить новости</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-align-left"></i>
                                <p>
                                    Вакансии
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('jobs.index') }}" class="nav-link">
                                        <p>Все вакансии</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('jobs.create') }}" class="nav-link">
                                        <p>Добавить вакансии</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link">
                                <p>
                                    Пользователи
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('moderation') }}" class="nav-link">
                                <p>
                                    Отзывы
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order') }}" class="nav-link">
                                <p>
                                    Заказы
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contactsAdmin') }}" class="nav-link">
                                <p>
                                    Контакты
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
    </div>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <script src="/admin/plugins/jquery/jquery.min.js"></script>
    <script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/plugins/chart.js/Chart.min.js"></script>
    <script src="/admin/plugins/sparklines/sparkline.js"></script>
    <script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="/admin/plugins/moment/moment.min.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/admin/dist/js/adminlte.js"></script>
    <script src="/admin/dist/js/demo.js"></script>
    <script src="/admin/dist/js/pages/dashboard.js"></script>
    <script src="/admin/admin.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ajax_accept').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('accept') }}" + "/" + id,
                    data: $('.ajax_accept').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#reject-' + id).css('display', 'none')
                        $('#statusName-' + id).html('Принят')
                        $('#finish-' + id).css('display', 'block')
                        $('#accept-' + id).css('display', 'none')
                    }
                })
            })
            $('.ajax_finish').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('finish') }}" + "/" + id,
                    data: $('.ajax_finish').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#statusName-' + id).html('Завершен')
                        $('#finish-' + id).css('display', 'none')
                    }
                })
            })
            $('.ajax_reject').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('reject') }}" + "/" + id,
                    data: $('.ajax_reject').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#statusName-' + id).html('Отклонен')
                        $('#reject-' + id).css('display', 'none')
                        $('#accept-' + id).css('display', 'none')
                    }
                })
            })
            $('.ajax_userAdmin').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('userAdmin') }}" + "/" + id,
                    data: $('.ajax_userAdmin').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#user_role_' + id).html('Администратор')
                        $('#madeAdmin-' + id).css('display', 'none')
                        $('#madeUser-' + id).css('display', 'block')
                        $('#madeGenAdmin-' + id).css('display', 'block')
                    }
                })
            })
            $('.ajax_userGenAdmin').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('userGenAdmin') }}" + "/" + id,
                    data: $('.ajax_userGenAdmin').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#user_role_' + id).html('Гл. администратор')
                        $('#madeGenAdmin-' + id).css('display', 'none')
                        $('#madeAdmin-' + id).css('display', 'block')
                        $('#madeUser-' + id).css('display', 'block')
                    }
                })
            })
            $('.ajax_adminUser').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('adminUser') }}" + "/" + id,
                    data: $('.ajax_adminUser').serialize(),
                    type: 'post',
                    success: function(result) {
                        $('#user_role_' + id).html('Пользователь')
                        $('#madeUser-' + id).css('display', 'none')
                        $('#madeAdmin-' + id).css('display', 'block')
                        $('#madeGenAdmin-' + id).css('display', 'block')
                    }
                })
            })
            $('.ajax_moderationTrue').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('moderationTrue') }}" + "/" + id,
                    data: $('.ajax_moderationTrue').serialize(),
                    type: 'post',
                    success: function(result) {
                       $('#moderationReview-'+id).css('display', 'none')
                       $('#moderationTrue-'+id).css('display', 'block')
                    }
                })
            })
            $('.ajax_moderationFalse').on('submit', function(event) {
                var id = $(this).data('id');
                event.preventDefault();
                $.ajax({
                    url: "{{ url('moderationFalse') }}" + "/" + id,
                    data: $('.ajax_moderationFalse').serialize(),
                    type: 'post',
                    success: function(result) {
                       $('#moderationReview-'+id).css('display', 'none')
                       $('#moderationFalse-'+id).css('display', 'block')
                    }
                })
            })
        })
    </script>

</body>

</html>
