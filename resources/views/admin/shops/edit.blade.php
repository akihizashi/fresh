@extends('admin.layouts.master')
  @section('content')
      <h2 class="text-center my-5">Edit product</h2>

      <form method="post" action="/admin/shops/{{ $product->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- <div class="row"> --}}
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Name:</label>
              <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Max length 50" value="{{ $product->name}}"required>
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
        {{-- </div>
        <div class="row"> --}}
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">price:</label>
              <input type="number" name="price" class="form-control" id="formGroupExampleInput" min="1" placeholder="" value="{{ $product->price }}"required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Code:</label>
              <input type="text" name="code" class="form-control" id="" placeholder="Max length 8" value="{{ $product->code }}"required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Reposition:</label>
              <input type="number" name="reposition" class="form-control" min="0" id="" placeholder="" value="{{ $product->reposition }}"required>
            </fieldset>
          </div>
          <div class="col">
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Release:</label>
              <input type="date" name="release" class="form-control" id="" value="{{ $product->release }}"required>
            </fieldset>
          </div>
        {{-- </div> --}}
        <div class="text-right">
          Chose another product image (Best size 400x250):
          <input class="btn btn-sm btn-primary" type="file" name="image" href="#" role="button"></input>
        </div>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">Description:</label>
          <textarea type="text" name="description" class="form-control" id="summernote" placeholder="">
            {{ $product->description }}
          </textarea>
        </fieldset>
        <button type="submit" class="btn btn-outline-dark">Save changes</button>
      </form>
    @include('layouts.create_error')
  @endsection
