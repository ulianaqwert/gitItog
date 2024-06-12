@extends('layouts.admin_layout')
@section('title', 'Пользователи')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="width:1530px;">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все пользователи</h1>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                                <h4><i class="icon fa fa-check">{{ session('success') }}</i></h4>
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
                                                    <th> Имя </th>
                                                    <th> Телефон </th>
                                                    <th> Роль </th>
                                                    @if (auth()->user()->role_id == 3)
                                                        <th>Сменить роль</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td> {{ $user->id }} </td>
                                                        <td> {{ $user->name }} </td>
                                                        <td> {{ $user->phone }} </td>
                                                        @foreach ($roles as $role)
                                                            @if ($role->id == $user->role_id)
                                                                <td id="user_role_{{ $user->id }}"
                                                                    data-name="<?= $user->id ?>" data-id="<?= $user->id ?>">
                                                                    {{ $role->name }} </td>
                                                            @endif
                                                        @endforeach
                                                        @if (auth()->user()->role_id == 3)
                                                            <td>


                                                                @if ($user->role_id == 0)
                                                                    <form
                                                                        action="{{ url('/userAdmin') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_userAdmin"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeAdmin-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать администратором</button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ url('/userGenAdmin') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_userGenAdmin"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeGenAdmin-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать гл.
                                                                            администратором</button>
                                                                    </form>
                                                                @elseif ($user->role_id == 1)
                                                                    <form
                                                                        action="{{ url('/adminUser') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_adminUser"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeUser-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать пользователем</button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ url('/userGenAdmin') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_userGenAdmin"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeGenAdmin-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать гл.
                                                                            администратором</button>
                                                                    </form>
                                                                @else
                                                                    <form
                                                                        action="{{ url('/userAdmin') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_userAdmin"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeAdmin-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать администратором</button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ url('/adminUser') }}/{{ $user->id }}"
                                                                        method="POST" class="ajax_adminUser"
                                                                        data-id="{{ $user->id }}"
                                                                        id="madeUser-{{ $user->id }}">
                                                                        @csrf
                                                                        <button id="user-{{ $user->id }}"
                                                                            type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать пользователем</button>
                                                                    </form>
                                                                @endif


                                                                <form style="display: none"
                                                                    action="{{ url('/userAdmin') }}/{{ $user->id }}"
                                                                    method="POST" class="ajax_userAdmin"
                                                                    data-id="{{ $user->id }}"
                                                                    id="madeAdmin-{{ $user->id }}">
                                                                    @csrf
                                                                    <button id="user-{{ $user->id }}"
                                                                        type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать администратором</button>
                                                                </form>
                                                                <form style="display: none"
                                                                    action="{{ url('/userGenAdmin') }}/{{ $user->id }}"
                                                                    method="POST" class="ajax_userGenAdmin"
                                                                    data-id="{{ $user->id }}"
                                                                    id="madeGenAdmin-{{ $user->id }}">
                                                                    @csrf
                                                                    <button id="user-{{ $user->id }}"
                                                                        type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать гл.
                                                                        администратором</button>
                                                                </form>
                                                                <form style="display: none"
                                                                    action="{{ url('/adminUser') }}/{{ $user->id }}"
                                                                    method="POST" class="ajax_adminUser"
                                                                    data-id="{{ $user->id }}"
                                                                    id="madeUser-{{ $user->id }}">
                                                                    @csrf
                                                                    <button id="user-{{ $user->id }}"
                                                                        type="submit" class="btn btn-primary" style="margin-top: 10px">Сделать пользователем</button>
                                                                </form>
                                                            </td>
                                                        @endif
                                                        <td class="project-actions text-right">
                                                            <br>
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
