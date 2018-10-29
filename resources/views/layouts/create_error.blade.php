@if (count($errors))
  <div class="alert alert-danger py-1" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
