@extends('layouts.master')
@include('layouts.sub-navbar')
@section('content')
    <div class="container w-75 mt-5 mb-4">
        <h2 class="page-title text-center pt-5 pb-2">問い合わせ</h2>
        <form class="" action="/contact/confirm" method="request">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">お名前</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">メール</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">電話番号</label>
                <div class="col-sm-10 form-inline">
                    <input name="phone0" type="text" class="form-control" style="width:4em;">
                    <span class="mx-1">-</span>
                    <input name="phone1" type="text" class="form-control" style="width:4em;">
                    <span class="mx-1">-</span>
                    <input name="phone2" type="text" class="form-control" style="width:4em;">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">内容</label>
                <div class="col-sm-10">
                    <textarea name="info" class="form-control"></textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm" name="button">送る</button>
            </div>
        </form>
    </div>
@endsection
