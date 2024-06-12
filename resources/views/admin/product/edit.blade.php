@extends('layouts.admin_layout')
@section('title', 'Редактирование товара')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование товара: {{ $product['name'] }}</h1>

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
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <!-- <input type="hidden" name="id" value="{{ $product['id'] }}"> -->
                                        <input type="text" name="title" class="form-control" id="name"
                                            value="{{ $product['name'] }}">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="img">Изображение товара</label> <br>

                                        <img name='img' width="100px" src="{{ $product['photo'] }}" alt="img">

                                        <input type="file" name="imgRed" class="form-control mt-2">

                                        <input type="hidden" name="imgHidden" value="{{ $product['photo'] }}">

                                        <label for="price">Цена</label>
                                        <input type="text" name="price" class="form-control" id="price"
                                            value="{{ $product['price'] }}">
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="count">Количество</label>
                                        <input type="number" name="count" class="form-control" id="count"
                                            value="{{ $product['count'] }}">
                                        @error('count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="info">Информация</label>
                                        <textarea name="text" id="text" class="form-control" cols="30" rows="10">{{ $product['info'] }}</textarea>
                                        @error('text')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="info">Состав</label>
                                        <textarea name="structure" id="structure" class="form-control" cols="30" rows="10">{{ $product['structure'] }}</textarea>
                                        @error('structure')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <select name="category_id" id="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}"
                                                    @if ($category['id'] == $product['category_id']) selected @endif>
                                                    {{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label style="margin-top: 10px" for="price">Верхние ноты</label>
                                        <input type="text" name="top" class="form-control" id="top"
                                            value="{{ $product['top'] }}">
                                        @error('top')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label style="margin-top: 10px" for="price">Средние ноты</label>
                                        <input type="text" name="medium" class="form-control" id="medium"
                                            value="{{ $product['medium'] }}">
                                        @error('medium')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label style="margin-top: 10px" for="price">Базовые ноты</label>
                                        <input type="text" name="base" class="form-control" id="base"
                                            value="{{ $product['base'] }}">
                                        @error('base')
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
