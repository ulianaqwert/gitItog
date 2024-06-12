@extends('layouts.nav')
@section('title', 'Вход')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/cards.css">
@endsection
@section('content')
    <div class="container">
        <div class="container__title">Вход/ <span> <a class="title__a" href="{{ route('register') }}"> регистрация</a></span>
        </div>
        <div class="container__input">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('check') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone" autofocus
                                        placeholder="введите телефон">
                                    <br>
                                    @error('phone')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password" placeholder="введите пароль">
                                    <br>
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @error('user')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <img src="/" alt=""> Войти
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
