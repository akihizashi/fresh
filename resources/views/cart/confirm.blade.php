@extends('layouts.master')
@section('content')
    <h2 class="text-center">ご注文を確認</h2>
    <div class="container w-50">
        <form action="/cart/pay" method="post">
            {{ csrf_field() }}
            @if(session('cart') !== null)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">商品名</th>
                            <th scope="col">単価(￥)</th>
                            <th scope="col">数量</th>
                            <th scope="col">集計(￥)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $cartItem['name'] }}</td>
                                <td>{{ number_format($cartItem['price']) }}</td>
                                <td>{{ $cartItem['quantity'] }}</td>
                                <td>{{ number_format($cartItem['price']*$cartItem['quantity']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="alert alert-secondary text-right" role="alert">
                    合計: {{ number_format($total) }} ￥
                    <input type="hidden" name="amount" value="{{ $total }}">
                </div>
                <div class="text-right">
                    <a href="/cart">
                        <button class="btn btn-warning btn-sm" type="button">修正</button>
                    </a>
                    <button class="btn btn-success btn-sm" type="submit">注文に進む</button>
                </div>
            @endif
        </form>
    </div>
@endsection
