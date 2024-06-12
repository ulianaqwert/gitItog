@extends('layouts.admin_layout')
@section('title', 'Заказы')
@section('content')
    <div class="content-wrapper" style="margin-left: 0px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="width: 2100px; margin-left: 50px;">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все заказы</h1>
                        <ul>
                            <li><a href="{{ route('order') }}" @if (!$statusId) class="active" @endif>Все
                                    заказы</a></li>
                            @foreach ($statuses as $status)
                                <li><a @if ($statusId == $status->id) class="active" @endif
                                        href="{{ route('ordersByStatus', $status->id) }}">{{ $status->name }}</a></li>
                            @endforeach
                        </ul>
                        {{-- @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-disimiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check">{{session('success')}}</i></h4>
                    </div>
                    @endif --}}
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%"> ID </th>
                                                    <th style="width: 10%"> Пользователь </th>
                                                    <th style="width: 20%"> Адрес </th>
                                                    <th style="width: 10%"> Статус </th>
                                                    <th> Доставка </th>
                                                    <th style="width: 25%"> Дата создания </th>
                                                    <th style="width: 25%"> Дата прибытия </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td> {{ $order->id }} </td>
                                                        @foreach ($users as $user)
                                                            @if ($user->id == $order->user_id)
                                                                <td> {{ $user->email }} </td>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($addresses as $address)
                                                            @if ($address->id == $order->address_id)
                                                                <td>г. Челябинск, ул.
                                                                    {{ $address->street }}, д. {{ $address->house }}
                                                                    @if ($address->flat != null)
                                                                        , кв.
                                                                        {{ $address->flat }}
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            @foreach ($statuses as $status)
                                                                @if ($status->id == $order->status_id)
                                                                    <p id="statusName-{{ $order->id }}">
                                                                        {{ $status->name }}</p>
                                                                @endif
                                                            @endforeach
                                                            @if ($order->status_id == 1)
                                                                <form action="{{ url('/accept') }}/{{ $order->id }}"
                                                                    method="POST" class="ajax_accept"
                                                                    data-id="{{ $order->id }}">
                                                                    @csrf
                                                                    <button id="accept-{{ $order->id }}"
                                                                        type="submit" class="btn btn-primary" style="margin-top: 10px">Принять</button>
                                                                </form>
                                                                <form style="display: none;"
                                                                    id="finish-{{ $order->id }}"
                                                                    action="{{ url('/finish') }}/{{ $order->id }}"
                                                                    method="POST" class="ajax_finish"
                                                                    data-id="{{ $order->id }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        id="finish-{{ $order->id }}" class="btn btn-primary" style="margin-top: 10px">Завершить</button>
                                                                </form>
                                                                <form action="{{ url('/reject') }}/{{ $order->id }}"
                                                                    method="POST" class="ajax_reject"
                                                                    data-id="{{ $order->id }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        id="reject-{{ $order->id }}" class="btn btn-primary" style="margin-top: 10px">Отклонить</button>
                                                                </form>
                                                            @elseif($order->status_id == 2)
                                                                <form action="{{ url('/finish') }}/{{ $order->id }}"
                                                                    method="POST" class="ajax_finish"
                                                                    data-id="{{ $order->id }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        id="finish-{{ $order->id }}" class="btn btn-primary" style="margin-top: 10px">Завершить</button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                        @foreach ($deliveries as $delivery)
                                                            @if ($delivery->id == $order->delivery_id)
                                                                <td> {{ $delivery->name }} </td>
                                                            @endif
                                                        @endforeach
                                                        <td> {{ $order->date_making }} </td>
                                                        <td> {{ $order->date_arrival }} </td>
                                                        <td>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('productsInOrder', $order->id) }}">
                                                                Подробнее
                                                            </a>
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
