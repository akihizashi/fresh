@extends('layouts.master')

  <div class="col-lg-3 col-md-4 col-xs-6 col mx-auto acc-panel">
    <h2 class="text-center py-3">Sign up</h2>
    @include('layouts.create_error')
    <form method="post" action="/register">
      {{ csrf_field() }}
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text">
              <i data-feather="user"></i>
          </div>
        </div>
          <input type="text" name="name" class="form-control" id="" placeholder="Enter user Id" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text">
              <i data-feather="lock"></i>
          </div>
        </div>
        <input type="password" name="password" class="form-control" id="" placeholder="Enter password" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text">
              <i data-feather="lock"></i>
          </div>
        </div>
        <input type="password" name="password_confirmation" class="form-control" id="" placeholder="Re-Enter password" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i data-feather="mail"></i></div>
        </div>
        <input type="email" name="email" class="form-control" id="" placeholder="Enter email" required>
      </div>
      <button type="submit" class="btn btn-general btn-block my-2">
          <span class="small">Sign up</span>
      </button>
    </form>
    <a class="float-right small" href="/login">Back<i class="fas fa-sign-out-alt mx-1"></i></a>
  </div>
