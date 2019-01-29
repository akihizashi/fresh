<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresh admin page</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin/master.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Font Awesome JS -->
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> --}}
    @stack('head_last')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="/admin/dashboard"><h3 class="text-center">Fresh fruit</h3></a>
            </div>
            @if (Request::is('/admin/dashboard'))
                true
            @endif
            <ul class="list-unstyled components">
                <li class="{{ (Request::url() == 'http://localhost:8000/admin/dashboard') ? 'active' : null }}">
                    <a href="/admin/dashboard">ダッシュボード</a>
                </li>
                <li class="{{ (Request::url() == 'http://localhost:8000/admin/transactions') ? 'active' : null }}">
                    <a href="/admin/transactions">受注</a>
                </li>
                <li class="{{ (Request::url() == 'http://localhost:8000/admin/shops') ? 'active' : null }}">
                    <a href="/admin/shops">商品</a>
                </li>
                <li class="{{ (Request::url() == 'http://localhost:8000/admin/users') ? 'active' : null }}">
                    <a href="/admin/users">会員</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Hi {{ Auth::user()->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    <script>
        feather.replace()
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                tabsize: 2,
            });
        });
    </script>
    <script>
        $("#sidebar ul.components li").on('click', function() {
            $("#sidebar ul li").find('.active').removeClass('active');
            $(this).parent('li').addClass('active');
        })
    </script>
    @stack('body_last')
</body>
</html>