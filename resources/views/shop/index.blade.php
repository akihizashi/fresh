@extends('layouts.master')
@include('layouts.sub-navbar')
@section('content')
    <div class="container-fluid mt-5 mb-4">
        @include('layouts.cart')
        <h2 class="page-title text-center">Shop</h2>
        <div class="row">
        @foreach ($products as $product)
          <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card my-2">
              <img class="card-img" src="/storage/product_images/{{ $product->image }}" alt="">
              <div class="card-body">
                  <a class="text-dark" href="/shops/{{ $product->id }}"><h5 class="my-0">{{ $product->name }}</h5></a>
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
        @endforeach
        </div>
        {{-- <div class="row float-right"> --}}
            <div class="my-3">
            {{ $products->links() }}
            </div>
        {{-- </div> --}}
    </div>
@endsection
@section('footer')
    @include('layouts.sub-footer')
@endsection
