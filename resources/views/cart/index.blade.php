@extends('layouts.master')
@include('layouts.sub-navbar')
@section('content')
    <div class="container w-75 mt-5 mb-4">
        <h2 class="page-title text-center pt-5 pb-2">カート</h2>
        @include('layouts.status')
        @if (session('cart') !== null)
        @foreach (session('cart') as $cartItem)
          <div class="jumbotron py-3">
              <div class="row">
                  <div class="col">
                      <h6>{{ $cartItem['name']}}</h6>
                  </div>
                  <div class="col text-right">
                      <form action="/cart/remove" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="cartItemId" value="{{ $cartItem['id'] }}">
                        <button type="submit" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </form>
                  </div>
              </div>
            <hr class="my-1">
            <div class="row">
              <div class="col">
                <div class="form-inline">
                    <div class="col">
                        <div class="form-inline">
                            数量:
                            <form action="/cart/update" class="ml-2" method="post">
                                {{ csrf_field() }}

                                <input class="form-control" style="width:4em;border:0;" type="number" name="quantity" value="{{ $cartItem['quantity'] }}" min="1">
                                <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
                                <button type="submit" class="btn btn-success"><i data-feather="refresh-cw"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col">単価(税抜き): {{ number_format($cartItem['price']) }} ￥</div>
                    <div class="col text-right">集計: {{ number_format($cartItem['quantity']*$cartItem['price']) }} ￥</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        <div class="alert alert-dark text-right" role="alert">
            合計: {{ number_format($total) }} ￥
        </div>
        <div class="text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/cart/confirm" class="btn btn-primary btn-sm">注文に進む</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">カート削除</button>
            </div>
        </div>
            {{--Modal--}}
            <form action="/cart/clear" method="post">
              {{ csrf_field() }}
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
        @else
        <div class="alert alert-secondary text-center" role="alert">カートに商品がありません<a href="/shop">ショップ戻る</a></div>
        @endif
    </div>
@endsection
