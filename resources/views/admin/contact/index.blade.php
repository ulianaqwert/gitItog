@extends('layouts.admin_layout')
@section('title', 'Контакты')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Контакты</h1>

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
                            <form action="{{ route('contactsUpdate', $contact->id) }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">Телефон</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputCategory"
                                            value="{{ $contact->phone }}">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="exampleInputCategory">Почта</label>
                                        <input type="text" name="email" class="form-control" id="exampleInputCategory"
                                            value="{{ $contact->email }}">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="exampleInputCategory">Адрес офиса</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputCategory"
                                            value="{{ $contact->address }}">
                                        @error('address')
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
