@extends('layouts.master')
@include('layouts.sub-navbar')
@section('content')
    <div class="container w-75 mt-5 mb-4">
        <h2 class="page-title text-center pt-5 pb-2">問い合わせ</h2>
        <div class="jumbotron p-4">
            <h6 class="text-center">
                内容確認
            </h6>
            <hr>
            @if (session('contact'))
                お名前: {{ $contact['name'] }}<br>
                メールアドレス: {{ $contact['email'] }}<br>
                電話番号: {{ $contact['phone0'] }}-
                {{ $contact['phone1'] }}-
                {{ $contact['phone2'] }}<br>
                問い合わせ内容:{{ $contact['info'] }}
            @endif
        </div>
    </div>
@endsection
