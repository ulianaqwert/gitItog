@extends('layouts.admin_layout')
@section('title', 'Добавление вакансии')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить вакансию</h1>

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
                        <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="payment">З/П</label>
                                    <input type="text" name="payment" class="form-control" id="payment" value="{{old('payment')}}">
                                    @error('payment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schedule">График</label>
                                    <input type="text" name="schedule" class="form-control" id="schedule" value="{{old('schedule')}}">
                                    @error('schedule')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <label for="description">Введите подробную информацию о вакансии</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="img">Изображение</label>
                                    <input type="file" name="img" class="form-control" >
                                    @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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