@extends('layouts.admin_layout')
@section('title', 'Редактирование категории')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирований категории: {{$category['name']}}</h1>

                </div><!-- /.col -->
               
            </div><!-- /.row -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check">{{session('success')}}</i></h4>
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
                        <form action="{{route('category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Название</label>
                                    <input type="hidden" name="id" value="{{$category['id']}}">
                                    <input type="text" name="title" class="form-control" id="exampleInputCategory" value="{{$category['name']}}">
                                    @error('title')
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