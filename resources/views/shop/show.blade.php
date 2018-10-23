@extends('layout')
@section('content')
  @include('layouts.cart')
  <h2 class="text-center"><a href="/shops">Shop</a></h2>
  <div class="row">
      <div class="col-md-4 col-sm-5 col">
        <div class="card my-2">
          <img class="card-img-top" src="/storage/product_images/{{ $product->image }}" alt="">
          <div class="card-body">
              <h5 class="my-0">{{ $product->name }}</h5>
              @if ($product->category == 'CD')
                <span class="badge badge-primary" style="width:4rem;">{{ $product->category }}</span>
              @elseif ($product->category == 'DVD')
                <span class="badge badge-info" style="width:4rem;">{{ $product->category }}</span>
              @elseif ($product->category == 'Album')
                <span class="badge badge-secondary" style="width:4rem;">{{ $product->category }}</span>
              @endif
            <p class="card-text"><small class="text-muted">Release: {{ date('Y/m/d', strtotime($product->release)) }}</small></p>
          </div>
          <div class="card-footer">
              <span class="card-text">￥{{ $product->price }}(No tax)</span>
              @if ($product->reposition == 0)
                <button class="btn btn-sm btn-danger pb-0 pt-1 float-right" title="Out of stock">
                  <i class="my-0" data-feather="x"></i>
                  <i class="my-0" data-feather="shopping-cart"></i>
                </button>
              @else
                <form action="/cart/add" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="hidden" name="name" value="{{ $product->name }}">
                  <input type="hidden" name="code" value="{{ $product->code }}">
                  <input type="hidden" name="price" value="{{ $product->price }}">
                  <button class="btn btn-sm btn-outline-secondary pb-0 pt-1 float-right" type="submit" title="Add to cart">
                    <i class="my-0" data-feather="plus"></i>
                    <i class="my-0" data-feather="shopping-cart"></i>
                  </button>
                </form>
              @endif
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-7 col">
        <div class="container">
          {!! $product->description !!}
        </div>
      </div>
  </div>
  <hr>
  <h5>Relative product</h5>
  <div class="row">
    @foreach ($relative_products as $relative_product)
{{--    ->where('category', '=', $product->category)
                                ->where('id', '<>', $product->id)
                                ->sortByDesc('release')
                                ->take(4)--}}

      <div class="col-md-3 col-sm-6 col-12">
        <div class="card my-2">
          <img class="card-img-top" style="" src="/storage/product_images/{{ $relative_product->image }}" alt="">
          <div class="card-img-overlay pb-5">
            <div class="" style="filter:drop-shadow(1px 1px 1px gray)">
              <a class="text-light" href="/shops/{{ $relative_product->id }}"><h5 class="my-0">{{ $relative_product->name }}</h5></a>
              @if ($relative_product->category == 'CD')
                <span class="badge badge-primary" style="width:4rem;">{{ $relative_product->category }}</span>
              @elseif ($relative_product->category == 'DVD')
                <span class="badge badge-info" style="width:4rem;">{{ $relative_product->category }}</span>
              @elseif ($relative_product->category == 'Album')
                <span class="badge badge-secondary" style="width:4rem;">{{ $relative_product->category }}</span>
              @endif
{{--            <p class="card-text"><small class="text-light">Release: {{ date('Y/m/d', strtotime($relative_product->release)) }}</small></p>--}}
            </div>
          </div>
          <div class="card-footer">
              <span class="card-text">￥{{ $relative_product->price }}(No tax)</span>
              @if ($relative_product->reposition == 0)
                <button class="btn btn-sm btn-danger pb-0 pt-1 float-right" title="Out of stock">
                  <i class="my-0" data-feather="x"></i>
                  <i class="my-0" data-feather="shopping-cart"></i>
                </button>
              @endif
          </div>
        </div>
      </div>
    @endforeach
@endsection
