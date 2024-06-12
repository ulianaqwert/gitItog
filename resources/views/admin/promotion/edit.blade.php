@extends('layouts.admin_layout')
@section('title', 'Редактирование новости')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование новости: {{ $promotion['name'] }}</h1>

                    </div><!-- /.col -->

                </div><!-- /.row -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">{{ session('success') }}</i></h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="conteiner-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <form action="{{ route('promotion.update', $promotion->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $promotion['name'] }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="img">Изображение</label> <br>

                                        <img name='img' width="100px" src="{{ $promotion['photo'] }}" alt="img">

                                        <input type="file" name="imgRed" class="form-control mt-2">

                                        <input type="hidden" name="imgHidden" value="{{ $promotion['photo'] }}">

                                        <label for="info">Описание</label>
                                        <textarea name="description" id="text" class="form-control" cols="30" rows="10">{{ $promotion->description }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
