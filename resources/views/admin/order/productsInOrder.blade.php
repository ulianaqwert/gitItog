@extends('layouts.admin_layout')
@section('title', 'Заказы')
@section('content')
<h1 style="margin: 50px 0px 0px 20px">Сумма заказа: {{$sum[0]->sum}} руб</h1>
<div class="content-wrapper" style="padding-top: 50px; display: flex; flex-wrap: wrap; margin-left: 20px;">
    <!-- Content Header (Page header) -->
    
    @foreach($products as $product)
    <div class="" style="width: 18rem;">
        <img width="160px" height="235px" src="{{$product->photo}}" class="" alt="img">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <br>
           <p>Количество товара: {{$product->count}}</p>
          {{-- <p>{{$product->product_id}}</p> --}}
          {{-- @foreach($count as $c) --}}
          {{-- @if($c->product_id==$product->product_id) --}}
          <p>Итоговая цена: {{$product->price*$product->count}} руб</p>
          {{-- @endif --}}
          {{-- @endforeach --}}
        </div>
        
        
      </div>
      @endforeach
    <!-- /.content-header -->
    @endsection


