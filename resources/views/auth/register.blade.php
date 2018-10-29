@extends('layout')

  <div class="container w-25 mt-5 pt-5">
    <h2 class="text-center py-3">Sign up</h2>
    @include('layouts.create_error')
    <form method="post" action="/register">
      {{ csrf_field() }}
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
          <input type="text" name="name" class="form-control" id="" placeholder="Enter UserID" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"></i></div>
        </div>
        <input type="password" name="password" class="form-control" id="" placeholder="Enter password" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"></i></div>
        </div>
        <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Re-Enter password" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-envelope fa-sm"></i></div>
        </div>
        <input type="email" name="email"  class="form-control" id="" placeholder="Enter email" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block my-3">Sign up</button>
    </form>
    <a class="float-right my-4 small" href="/login">Back<i class="fas fa-sign-out-alt mx-1"></i></a>
  </div>
