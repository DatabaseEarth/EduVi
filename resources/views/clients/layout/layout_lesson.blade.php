<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-lesson.css')}}">
    @yield('css')
</head>

<body>
    @include('clients.block.template_header_lesson')
    <!-- <div ></div> -->

    <main class="">
        <div class="d-flex">
            <article id="hiddenAricle" class="overflow-y-auto border-end">
                <div style="height: 56px;"></div>
                <div class="w-100 bg-body-secondary" style="overflow: auto;">
                    @yield('video')
                </div>
            </article>
            <aside id="hiddenSidebar" class="overflow-auto border-start position-sticky" style="top: 56px">
                <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                    @yield('navbar-menu')
                </div>
                <div style="height: 57px;"></div>
            </aside>
        </div>
    </main>
    <div style="height: 56px"></div>
    <footer style="background-color: #e5e5e5;" class="z-3 position-fixed bottom-0 start-0 end-0">
        <div class="container-fluid py-2">
            <div class="d-flex justify-content-between">
                <div></div>
                <div class="d-flex gap-2 align-items-center">
                    <button class="btn">
                        <i class="fa-solid fa-chevron-left"></i>
                        Bài trước
                    </button>
                    <button class="btn btn-outline-danger">
                        Bài tiếp theo
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <div>1. Giới thiệu</div>
                    <div id="tabSidebar" style="height: 40px; width: 40px;"
                        class="d-flex justify-content-center align-items-center bg-white text-dark rounded-circle"><i
                            class="fa-solid fa-bars"></i></div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>