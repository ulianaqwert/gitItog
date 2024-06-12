@extends('layouts.nav')
@section('title', 'Регистрация')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/cards.css">
@endsection
@section('content')
    <div class="container">
        <div class="container__title">Регистрация/<a class="title__a" href="{{ route('login') }}"> вход</a></div>
        <div class="container__input">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('registration') }}">
                            @csrf

                            <div class="row mb-3">
                                <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> -->

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus placeholder="введите имя">
                                    <br>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone" placeholder="введите телефон">
                                    <br>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="введите пароль">
                                    <br>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> -->

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="повторите пароль">
                                </div>
                            </div>
                            <div class="polit">
                                <input type="checkbox" class="custom-checkbox" name="checkPolit" id="checkPolit">
                                <label for="checkPolit">А вы согласны с политикой сайта?</label>
                            </div>
                            @error('user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button disabled style="width: 255px;" type="submit" class="btn btn-primary">
                                        {{ __('Зарегистрироваться') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('#checkPolit').addEventListener('change', (e) => {
            console.log(e.target)
            document.querySelector('[type="submit"]').disabled = !e.target.checked
        })
    </script>
@endsection
