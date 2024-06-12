@extends('layouts.nav')
@section('title', 'Вакансии')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    {{-- <link rel="stylesheet" href="/css/index.css"> --}}
    <link rel="stylesheet" href="/css/job.css">
@endsection
@section('content')
    <div class="jobs">
        <h1 class="jobs__title">Вакансии</h1>
        @foreach ($jobs as $job)
            <div class="job">
                <img class="job__img" src="{{ $job->photo }}" alt="img">
                <div class="job__info">
                    <h1 class="job__title">{{$job->name}}</h1>
                    <p class="job__desc">Описание: {{$job->description}}</p>
                    <p>Заработная плата: {{$job->payment}} руб.</p>
                    <p>График: {{$job->schedule}}.</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
