<header class="shadow py-3 position-sticky top-0 z-1 bg-white">
    <div class="container-fluid" style="max-width: 1535px">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <a href="{{route('home')}}">
                <img src="{{asset('assets/images/logo-clients.png')}}" style="width: 114px;" alt="">
            </a>
            <nav>
                <ul class="d-flex gap-4 align-items-center list-unstyled mb-0">
                    <li class="position-relative">
                        <a href="{{route('my_course')}}" id="aboutUs" class="text-decoration-none text-dark fw-semibold nav-hover"
                            style="cursor: pointer;">
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <div class="fs-5">Khóa học của tôi</div>
                            </div>
                        </a>
                    </li>
                    <li class="position-relative">
                        <div id="books" class="text-decoration-none text-dark fw-semibold nav-hover"
                            style="cursor: pointer;">
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <div class="fs-5">Sách</div>
                                <div class="fs-6">
                                    <i id="xoay-2" class="fa-solid fa-chevron-down icon-xoay"></i>
                                </div>
                            </div>
                            <div id="books-drop" class=" mt-3 position-absolute overflow-hidden overflow-y-auto end-0 nav-drop shadow"
                                style="width: max-content;">
                                <ul class="list-unstyled bg-white mb-0 shadow-sm">
                                    @foreach ($categories as $item)
                                    <li>
                                        <a href="{{route('category_detail',['id'=>$item->Id_Category])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            {{$item->Name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <div id="courses" class="text-decoration-none text-dark fw-semibold nav-hover"
                            style="cursor: pointer;">
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <div class="fs-5">Khóa học</div>
                                <div class="fs-6">
                                    <i id="xoay-1" class="fa-solid fa-chevron-down icon-xoay"></i>
                                </div>
                            </div>
                            <div id="courses-drop"
                                class=" mt-3 position-absolute start-0 overflow-hidden overflow-y-auto nav-drop shadow"
                                style="width: max-content;">
                                <ul class="list-unstyled bg-white mb-0 shadow-sm">
                                    <li>
                                        <a href="{{route('course',['id'=>1])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            Khóa học Basic
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('course',['id'=>1])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            Khóa học Pro
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('course',['id'=>1])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            Khóa học Front-end
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('course',['id'=>1])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            Khóa học Back-end
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('course',['id'=>1])}}" class="text-decoration-none text-dark d-block py-2 nav-hover px-3">
                                            Khóa học Fullstack
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <a href="{{route('cart')}}" class="d-flex text-decoration-none text-dark align-items-center gap-2 rounded-pill py-2 px-3 xam-nhat">
                    <div>
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div>(0)</div>
                </a>
                @guest
                <div class="d-flex align-items-center gap-3">
                    <a href="{{route('register')}}" class="rounded-pill px-4 btn fw-semibold fs-6 btn-chinh">Sign Up</a>
                    <a href="{{route('login')}}" class="rounded-pill px-4 btn fw-semibold fs-6 btn-phu">Login in</a>
                </div>
                @else
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('uploads/users/'.Auth::user()->Avatar)}}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small mt-2" style="">
                        @if (Auth::user()->Role == 1)
                        <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Vào trang quản trị</a></li>
                        @endif
                        <li><a href="{{route('account')}}" class="dropdown-item" href="#">Sửa hồ sơ</a></li>
                        @if (Auth::check())
                        <li><a href="{{route('cart_detail')}}" class="dropdown-item">Theo dõi đơn hàng</a></li>
                        @endif
                        <li><a href="{{route('my_course')}}" class="dropdown-item" href="#">Khóa học của bạn</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
                @endguest
            </div>
        </div>
    </div>
</header>