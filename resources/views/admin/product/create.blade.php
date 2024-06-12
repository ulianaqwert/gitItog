@extends('layouts.admin_layout')
@section('title', 'Добавить товар')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить товар</h1>

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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">Название</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputCategory"
                                            placeholder="Введите название товара" value={{old('title')}}>
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input type="text" name="price" class="form-control" id="price"
                                            placeholder="Введите цену товара" value={{old('price')}}>
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="count">Количество</label>
                                        <input type="number" name="count" class="form-control" id="count"
                                            placeholder="Введите количество товара" value={{old('count')}}>
                                            @error('count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Выберите категорию</label>
                                        <select name="category_id" class="form-control"  id="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Введите подробную информацию о товаре</label>
                                        <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{old('text')}}</textarea>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Введите состав товара</label>
                                        <textarea name="structure" id="text" cols="30" rows="10" class="form-control" >{{old('structure')}}</textarea>
                                        @error('structure')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Изображение товара</label>
                                        <input type="file" name="img" class="form-control" >
                                        @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label style="margin-top: 10px" for="price">Верхние ноты</label>
                                    <input type="text" name="top" class="form-control" id="top" value={{old('top')}}>
                                    @error('top')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label style="margin-top: 10px" for="price">Средние ноты</label>
                                    <input type="text" name="medium" class="form-control" id="medium" value={{old('medium')}}>
                                    @error('medium')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label style="margin-top: 10px" for="price">Базовые ноты</label>
                                    <input type="text" name="base" class="form-control" id="base" value={{old('base')}}>
                                    @error('base')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
