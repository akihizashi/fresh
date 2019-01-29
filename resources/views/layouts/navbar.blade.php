<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top pt-2 pb-2">
    <a class="navbar-brand" href="/home"><h3 class="text-light">Fresh fruit</h3></a>
    <div class="hamburger" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <div class="top-bun"></div>
        <div class="meat"></div>
        <div class="bottom-bun"></div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home">トップページ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">ショップ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">問い合わせ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">会社紹介</a>
            </li>
        </ul>
        @if (Auth::check())
            <div class="form-inline mx-3 my-2 my-lg-0">
                <p>
                    <a class="text-light" href="/profile">
                        <i class="icon-general" data-feather="user"></i>
                        <span class="mb-0">Hi {{ Auth::user()->name }}</span>
                    </a>
                </p>
            </div>
        @else
        <div class="form-inline mx-3 my-2 my-lg-0">
            <p>
                <a class="text-light" href="/login"><i class="icon-general" data-feather="user-check"></i>Login</a>
                <span class="text-light mx-1">Or</span>
                <a class="text-light" href="/register"><i class="icon-general" data-feather="user-plus"></i>Sign up</a>
            </p>
        </div>
        @endif
    </div>
</nav>
