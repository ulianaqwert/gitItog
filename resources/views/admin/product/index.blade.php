@extends('layouts.admin_layout')
@section('title', 'Все товары')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все товары</h1>
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">{{session('success')}}</i></h4>
                    </div>
                    @endif
                    <section class="content" style="width: 1200px;">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"> ID </th>
                                                <th> Название </th>
                                                <th> IMG </th>
                                                <th> Цена (руб)</th>
                                                <th> Кол-во </th>
                                                {{-- <th> Информация </th> --}}
                                                <th> Категория </th>
                                                <th style="width: 30%"> </th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach($productsCountZero as $productCountZero)
                                            <tr>
                                                <td> {{$productCountZero->id}} </td>
                                                <td> {{$productCountZero->name}} </td>
                                                <td> {{$productCountZero->photo}} </td>
                                                <td> {{$productCountZero->price}} </td>
                                                <td style="color: red;"> Товар закончился </td>
                                                {{-- <td> {{$productCountZero->info}} </td> --}}
                                                <td> {{$productCountZero->category->name}} </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" href="{{route('product.edit', $productCountZero->id)}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    <form action="{{route('product.destroy', $productCountZero->id)}}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                            <i class="fas fa-trash"> </i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach($products as $product)
                                            <tr>
                                                <td> {{$product->id}} </td>
                                                <td> {{$product->name}} </td>
                                                <td> {{$product->photo}} </td>
                                                <td> {{$product->price}} </td>
                                                <td> {{$product->count}} </td>
                                                {{-- <td> {{$product->info}} </td> --}}
                                                <td> {{$product->category->name}} </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" href="{{route('product.edit', $product->id)}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    <form action="{{route('product.destroy', $product->id)}}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                            <i class="fas fa-trash"> </i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @endsection