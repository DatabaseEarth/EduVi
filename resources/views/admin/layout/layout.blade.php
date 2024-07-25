<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-admin.css')}}">
    @yield('css')
</head>

<body>
    <div class="d-flex gap-0">
        <aside class="bg-white vh-100 shadow-sm position-sticky top-0 overflow-y-auto">
            <div class="header d-flex justify-content-center align-items-center">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/images/Logo-clients.png')}}" style="width: 150px;" alt="">
                </a>
            </div>
            <ul class="list-unstyled">
                @section('aside-menu')
                    @include('admin.block.aside-menu')
                @show
            </ul>
        </aside>
        <article class="">
            <header
                class="header d-flex justify-content-between align-items-center px-4 shadow-sm position-sticky top-0 z-3">
                <h1 class="fs-3">Tổng quan</h1>
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <form action="" method="post" class="search">
                        <div class="input-group border-0">
                            <button type="submit" class="btn color-search rounded-start-5">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="search" class="form-control color-search border-0 rounded-end-5"
                                placeholder="Tìm kiếm...">
                        </div>
                    </form>
                    <a href="#" class="btn-icon">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                    <a href="#" class="btn-icon">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                    <div class="avatar">
                        <img class="w-100" src="{{asset('uploads/users/'.Auth::user()->Avatar)}}" alt="">
                    </div>
                </div>
            </header>
            <main class="p-4">
                @yield('content')
            </main>
        </article>
    </div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('assets/js/script-admin.js')}}"></script>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>