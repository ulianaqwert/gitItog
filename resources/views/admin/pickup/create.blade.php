@extends('layouts.admin_layout')
@section('title', 'Добавить пункт')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пункт</h1>

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
                        <form action="{{route('pickup.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="street">Улица</label>
                                    <input type="text" name="street" class="form-control" id="street" placeholder="Введите улицу пункта самовывоза">
                                    @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="house">Дом</label>
                                    <input type="text" name="house" class="form-control" id="house" placeholder="Введите номер дома">
                                    @error('house')
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