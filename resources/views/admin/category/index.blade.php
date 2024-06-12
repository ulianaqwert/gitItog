@extends('layouts.admin_layout')
@section('title', 'Категории')
@section('content')
<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все категории</h1>
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">{{session('success')}}</i></h4>
                    </div>
                    @endif
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"> ID </th>
                                                <th> Название </th>
                                                <th style="width: 30%"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td> {{$category->id}} </td>
                                                <td> {{$category->name}} </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" href="{{route('category.edit', $category->id)}}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    
                                                    <form action="{{route('category.destroy', $category->id)}}" method="POST" style="display: inline-block">
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