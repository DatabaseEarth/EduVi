@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
<section class="container-xxl">
    <h4 class="fw-bolder mt-4 mb-3">Khóa học miễn phí</h4>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <a href="{{route('course',['id'=>1])}}" class="card border-0 text-decoration-none hover-product mb-4">
                <div class="rounded-4 overflow-hidden mb-2 position-relative">
                    <img src="assets/images/khoa-5.png" class="card-img-top w-100" alt="...">
                    <div
                        class="d-flex justify-content-center align-items-center position-absolute top-0 bottom-0 start-0 end-0 bg-dark bg-opacity-50 item-hover">
                        <button class="btn btn-light rounded-5 fs-6 nut-hover">Xem khóa học</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <h5 class="card-title mb-2 fs-6">Lập trình JavaScript cơ bản</h5>
                    <p class="text-secondary">
                        <i class="fa-solid fa-users"></i> 125.416
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="{{route('course',['id'=>1])}}" class="card border-0 text-decoration-none hover-product mb-4">
                <div class="rounded-4 overflow-hidden mb-2 position-relative">
                    <img src="assets/images/khoa-6.png" class="card-img-top w-100" alt="...">
                    <div
                        class="d-flex justify-content-center align-items-center position-absolute top-0 bottom-0 start-0 end-0 bg-dark bg-opacity-50 item-hover">
                        <button class="btn btn-light rounded-5 fs-6 nut-hover">Xem khóa học</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <h5 class="card-title mb-2 fs-6">Xậy dựng Website với ReactJS</h5>
                    <p class="text-secondary">
                        <i class="fa-solid fa-users"></i> 125.416
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="{{route('course',['id'=>1])}}" class="card border-0 text-decoration-none hover-product mb-4">
                <div class="rounded-4 overflow-hidden mb-2 position-relative">
                    <img src="assets/images/khoa-3.png" class="card-img-top w-100" alt="...">
                    <div
                        class="d-flex justify-content-center align-items-center position-absolute top-0 bottom-0 start-0 end-0 bg-dark bg-opacity-50 item-hover">
                        <button class="btn btn-light rounded-5 fs-6 nut-hover">Xem khóa học</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <h5 class="card-title mb-2 fs-6">JavaScript Pro</h5>
                    <p class="text-secondary">
                        <i class="fa-solid fa-users"></i> 125.416
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="{{route('course',['id'=>1])}}" class="card border-0 text-decoration-none hover-product mb-4">
                <div class="rounded-4 overflow-hidden mb-2 position-relative">
                    <img src="assets/images/khoa-4.png" class="card-img-top w-100" alt="...">
                    <div
                        class="d-flex justify-content-center align-items-center position-absolute top-0 bottom-0 start-0 end-0 bg-dark bg-opacity-50 item-hover">
                        <button class="btn btn-light rounded-5 fs-6 nut-hover">Xem khóa học</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <h5 class="card-title mb-2 fs-6">NextJS Pro</h5>
                    <p class="text-secondary">
                        <i class="fa-solid fa-users"></i> 125.416
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

@section('css')
    <style>
        
    </style>
@endsection
@section('script')
    <script>

    </script>
@endsection
