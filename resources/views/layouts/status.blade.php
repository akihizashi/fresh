@if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
@endif
