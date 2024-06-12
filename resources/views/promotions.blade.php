@extends('layouts.nav')
@section('title', 'Новости')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    {{-- <link rel="stylesheet" href="/css/index.css"> --}}
    <link rel="stylesheet" href="/css/promo.css">
@endsection
@section('content')
    <div class="promotions">
        <h1 class="promotions__title">Новости</h1>
        @foreach ($promotions as $promo)
            <div class="promo promotion__item">
                <img src="{{ $promo->photo }}" alt="img">
                <div class="promo__info">
                    <h2 class="promo__title promotion__title">{{ $promo->name }}</h2>
                    <p class="promo__info-p">{{ $promo->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
