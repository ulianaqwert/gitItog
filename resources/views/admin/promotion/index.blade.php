@extends('layouts.admin_layout')
@section('title', 'Новости')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="width: 2100px; margin-left: 50px;">
                <div class="col-sm-6">
                    <h1 class="m-0">Все новости</h1>
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
                                                <th width="15%"> Название </th>
                                                <th width="35%"> описание </th>
                                                <th> IMG </th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach($promotions as $promo)
                                            <tr>
                                                <td> {{$promo->id}} </td>
                                                <td> {{$promo->name}} </td>
                                                <td> {{$promo->description}} </td>
                                                <td> {{$promo->photo}} </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" href="{{route('promotion.edit', $promo->id)}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    
                                                    <form action="{{route('promotion.destroy', $promo->id)}}" method="POST" style="display: inline-block">
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