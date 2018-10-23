<div class="text-right">
  <a class="text-dark" href="/cart">
    <button type="button" class="btn btn-warning btn-sm pb-0 pt-1"><i class="align-middle mb-1" data-feather="shopping-cart"></i>
      @if (session('cart') !== null)
        <span class="badge badge-light my-1">{{ count(session('cart')) }}</span>
      @else
      <span class="badge badge-light my-1">0</span>
      @endif
    </button>
  </a>
</div>
