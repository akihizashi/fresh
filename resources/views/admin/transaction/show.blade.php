@extends('admin.layouts.master')
@section('content')
<h2 class="text-center mt-5">Order No. {{ $transaction->id }}</h2>
<p class="text-center">Date of order: {{$transaction->created_at }}</p>
<p class="text-center">Customer: {{ $customer->name }}</p>

    @foreach ($orders as $order)
       Product: {{ $order->name }} <br>
       Quantity: {{ $order->quantity }} <br>
       Price: {{ number_format($order->price) }} ￥ <br>
       Amount: {{ number_format($order->quantity*$order->price) }} ￥ <br>
       <hr>
    @endforeach
    <div class="alert alert-secondary text-right" role="alert">
        Total: {{ number_format($total) }} ￥
    </div>
    

@endsection