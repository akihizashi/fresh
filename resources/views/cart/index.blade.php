@extends('layouts.master')
@include('layouts.sub-navbar')
@section('content')
    <div class="container w-75 mt-5 mb-4">
        <h2 class="page-title text-center pt-5">カート</h2>
        @include('layouts.status')
        @if (session('cart') !== null)
        @foreach (session('cart') as $cartItem)
          <div class="jumbotron py-3">
            <form action="/cart/remove" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="cartItemId" value="{{ $cartItem['id'] }}">
              <button type="submit" class="close float-right" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </form>
            <h5>{{ $cartItem['name']}}</h5>
            <hr class="my-1">
            <div class="row">
              <div class="col">
                <div class="form-inline">
                    数量:
                    <form action="/cart/update" class="ml-2" method="post">
                      {{ csrf_field() }}

                    <input style="width:2rem;border:0;" type="number" name="quantity" value="{{ $cartItem['quantity'] }}" min="1">
                    <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
                    <button type="submit" class="btn btn-info btn-sm pb-0"><i data-feather="refresh-cw"></i></button>
                    </form>
                </div>
              </div>
              <div class="col">単価(税抜き): {{ number_format($cartItem['price']) }} ￥</div>
              <div class="col text-right">集計: {{ number_format($cartItem['quantity']*$cartItem['price']) }} ￥</div>
            </div>
          </div>
        @endforeach
        <div class="alert alert-dark text-right" role="alert">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">合計: {{ number_format($total) }} ￥</div>

        </div>
        <div class="row pb-5 text-right">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">
            <a href="/shop">
              <button type="button" class="btn btn-primary btn-sm">ショッピング引き続き</button>
            </a>
          </div>
          <div class="col">
            <form action="/cart/clear" method="post">
              {{ csrf_field() }}

              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">カート削除</button>
              {{--Modal--}}
              <div class="modal fade" style="margin-top:20rem;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure clear cart?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">キャンセル</button>
                      <button type="submit" class="btn btn-primary btn-sm">削除</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col">
              <a href="/cart/confirm">
                <button type="button" class="btn btn-success btn-sm">注文に進む</button>
              </a>
          </div>
        </div>
        @else
        <div class="alert alert-secondary text-center" role="alert">カートに商品がありません<a href="/shop">ショップ戻る</a></div>
@endif
    ,</div>
@endsection
