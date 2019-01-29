@extends('admin.layouts.master')
@section('content')
  <h2 class="text-center my-5">Users Management</h2>
  <div class="col-sm-12">
      <table class="table table-hover mt-3">
          <thead class="thead-light">
              <tr class="row">
                  <th class="col-sm-1">Id</th>
                  <th class="col-sm-6">Name</th>
                  <th class="col-sm-2">Jointdate</th>
                  <th class="col-sm-3">Permission</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr class="row">
                  <td class="col-sm-1">{{ $user->id }}</td>
                  <td class="col-sm-6">{{ $user->name }}</td>
                  <td class="col-sm-2">{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                  <td class="col-sm-3">{{ $user->role }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
      <div class="float-right">
        {{ $users->links() }}
      </div>
  </div>
@endsection
