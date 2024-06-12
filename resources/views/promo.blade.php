@extends('layouts.nav')
@section('title', 'Новости')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    {{-- <link rel="stylesheet" href="/css/index.css"> --}}
    <link rel="stylesheet" href="/css/promo.css">
@endsection
@section('content')
    <div class="promo promo__item">
        <img src="{{ $promo->photo }}" alt="img">
        <div class="promo__info">
            <h2 class="promo__title">{{ $promo->name }}</h2>
            <p>{{ $promo->description }}</p>
            <div class="promo__a">
                <a href="{{route('promotions')}}">Смотреть все новости</a>
            </div>
        </div>
    </div>
@endsection
