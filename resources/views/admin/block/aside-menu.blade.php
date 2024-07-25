<li class="mb-3">
    <a href="{{route('admin.dashboard')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.dashboard')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-chart-pie"></i>
            </div>
            <div>
                Thống kê
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.category.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.category*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                Danh mục
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.product.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.product*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-gift"></i>
            </div>
            <div>
                Sản phẩm
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.user.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.user*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-user"></i>
            </div>
            <div>
                Tài khoản
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.comment.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.comment*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-comment"></i>
            </div>
            <div>
                Bình luận
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.cart.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.cart*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div>
                Đơn hàng
            </div>
        </div>
    </a>
</li>
<li>
    <hr>
</li>
<li class="mb-3">
    <a href="{{route('admin.course.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.course*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div>
                Khóa học
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.chapter.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.chapter*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-chart-bar"></i>
            </div>
            <div>
                Chương
            </div>
        </div>
    </a>
</li>
<li class="mb-3">
    <a href="{{route('admin.lesson.read')}}" class="d-block text-decoration-none color-menu fs-5 fw-semibold py-2 px-4 menu {{request()->routeIs('admin.lesson*')?'menu-active':''}}">
        <div class="d-flex align-items-center gap-3">
            <div class="ms-2 fs-4 icon-menu">
                <i class="fa-solid fa-film"></i>
            </div>
            <div>
                Bài học
            </div>
        </div>
    </a>
</li>