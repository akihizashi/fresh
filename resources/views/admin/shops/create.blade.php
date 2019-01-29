@extends('admin.layouts.master')
  @section('content')
      <h2 class="text-center my-5">Create new product</h2>

      <form method="post" action="/admin/shops" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- <div class="row"> --}}
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Name:</label>
              <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Max length 50" required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Category:</label>
              <select class="form-control" name="category" id="exampleFormControlSelect1">
                <option value="piece">piece</option>
                <option value="package">package</option>
              </select>
            </fieldset>
          </div>
        {{-- </div> --}}
        {{-- <div class="row"> --}}
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">price:</label>
              <input type="number" name="price" class="form-control" id="formGroupExampleInput" min="1" placeholder="" required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Code:</label>
              <input type="text" name="code" class="form-control" id="" placeholder="Max length 8" required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Reposition:</label>
              <input type="number" name="reposition" class="form-control" min="0" id="" placeholder="" required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Release:</label>
              <input type="date" name="release" class="form-control" id="" required>
            </fieldset>
          </div>
        {{-- </div> --}}
        <div class="text-right">
          Chose product image (Best size 400x250):
          <input class="btn btn-sm btn-primary" type="file" name="image" href="#" role="button"></input>
        </div>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">Description:</label>
          <textarea type="text" name="description" class="form-control" id="summernote" placeholder=""></textarea>
        </fieldset>
        <button type="submit" class="btn btn-default">Save product</button>
      </form>
    @include('layouts.create_error')
  @endsection
