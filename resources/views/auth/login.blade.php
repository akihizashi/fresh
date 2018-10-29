@extends('layouts.master')

  <div class="container w-25 mt-5 pt-5">
    <h2 class="text-center py-3">Fresh fruit</h2>
    @include('layouts.status')
    @include('layouts.create_error')
    <form action="/login" method="post">
      {{ csrf_field() }}

      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i data-feather="mail"></i></div>
        </div>
        <input type="email" name="email" class="form-control" id="" placeholder="Enter email" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i data-feather="lock"></i></div>
        </div>
        <input type="password" name="password" class="form-control" id="" placeholder="Enter password" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block my-3">Login to start App</button>
      </div>
    </form>
    <p class="text-center">If you don't have account, click here to <a href="/register" type="" class="">Sign up</a></p>
    {{--<p class="text-center small"><a href="#" class="text-center">Forgot Password</a></p>--}}
  </div>
