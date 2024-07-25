<header class="bg-dark py-2 px-3 position-fixed top-0 start-0 end-0 z-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center py-2">
            <div class="d-flex align-items-center">
                <a href="{{route('home')}}" class="text-white me-4">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-white fw-bold" style="font-size: 14px;">
                        @yield('title')
                    </div>
                </div>
            </div>
            <div class="d-flex gap-4 align-items-center">
                <div class="text-white" style="font-size: 14px;">
                    @yield('lesson_count') bài học
                </div>
                <div class="text-secondary text-white" style="font-size: 14px;">
                    <i class="fa-solid fa-file me-1"></i> Ghi chú
                </div>
                <div class="text-secondary text-white" style="font-size: 14px;">
                    <i class="fa-solid fa-circle-question me-1"></i> Hướng dẫn
                </div>
            </div>
        </div>
    </div>
</header>