@extends('layouts.master')

  <div class="col-lg-3 col-md-4 col-xs-6 col mx-auto acc-panel text-center">
    <h2 class="text-center pt-3">Fresh fruit</h2>
    <span class="badge badge-warning mb-2">Admin login panel</span>
    @include('layouts.status')
    @include('layouts.create_error')
    <form action="/admin" method="post">
      {{ csrf_field() }}

      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i data-feather="mail"></i></div>
        </div>
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="input-group py-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i data-feather="lock"></i></div>
        </div>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <div class="form-group">
        <p>
            <button type="submit" class="btn btn-general btn-block my-3">
                <span class="small">Login to Fresh fruit</span>
            </button>
        </p>
      </div>
    </form>
  </div>
