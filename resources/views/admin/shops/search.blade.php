@extends('admin.layouts.master')
@section('content')
    <h2 class="text-center py-5">Product search result</h2>
    @if ($searchProductResults->count() == 0)
    <div class="alert alert-danger text-center" role="alert">
        No result found
    </div>
    <a href="/admin/shops">Back</a>
    @endif
    @if ($searchProductResults->count() > 0)
        Result found: {{ $searchProductResults->total() }} <br>
        <a href="/admin/shops">Back</a>
        <div class="col-sm-12">
            <table class="table table-hover mt-3">
                <thead class="thead-light">
                    <tr class="row">
                        <th class="col-sm-1">Cate</th>
                        <th class="col-sm-4">Name</th>
                        <th class="col-sm-2">Code</th>
                        <th class="col-sm-1">Price(￥)</th>
                        <th class="col-sm-1">Repo</th>
                        <th class="col-sm-1 px-0">Release</th>
                        <th class="col-sm-2"></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($searchProductResults as $searchProductResult)
                      <tr class="row">
                          <td class="col-sm-1">{{ $searchProductResult->category }}</td>
                          <td class="col-sm-4">{{ $searchProductResult->name }}</td>
                          <td class="col-sm-2">{{ $searchProductResult->code }}</td>
                          <td class="col-sm-1">{{ $searchProductResult->price }}</td>
                          <td class="col-sm-1">{{ $searchProductResult->reposition }}</td>
                          <td class="col-sm-1 px-0">{{ date('Y-m-d', strtotime($searchProductResult->release)) }}</td>
                          <td class="col-sm-2">
                              <div class="form-inline float-right">
                                  <a href="/admin/shops/{{ $searchProductResult->id }}/edit">
                                      <button type="button" class="btn btn-warning btn-sm mx-2" title="Edit">
                                        <i class="text-light" data-feather="edit-3"></i>
                                      </button>
                                  </a>

                                  <form class="mb-0" action="/admin/shops/{{ $searchProductResult->id }}/delete" method="post">
                                    {{ csrf_field() }}

                                      <input type="hidden" name="_method" value="delete" />
                                      <input type="hidden" name="post_id" value="{{ $searchProductResult->id }}">
                                      {{--Modal--}}
                                      <div class="modal fade" style="margin-top:20rem;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                                                    </div>
                                              </div>
                                          </div>
                                      </div>
                                </form>
                              </div>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="float-right">
              {{ $searchProductResults->appends(Request::only('searchProduct'))->links() }}
            </div>
        </div>
    @endif
@endsection
