@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
    <section class="container-xxl">
        <div class="d-flex align-items-center gap-4">
            <div class="w-50">
                <h2 class="fw-bold mb-3"><span style="color: #F48C06;">Học Online</span> bây giờ dễ dàng hơn rất
                    nhiều
                </h2>
                <span>
                    Eduvi là nhà cung cấp đào tạo toàn cầu có trụ sở trên khắp Vương quốc Anh, chuyên về các khóa
                    đào
                    tạo được công nhận và thiết kế riêng. Chúng tôi phá bỏ các rào cản để có được bằng cấp.
                </span><br>
                <a href="{{route('course',['id'=>1])}}" class="btn btn-lg btn-dark mt-4">
                    Bắt đầu ngay
                </a>
            </div>
            <div class="w-50">
                <img class="w-100" src="assets/images/banner-1.png" alt="">
            </div>
        </div>
    </section>
    <section class="container-xxl">
        <h4 class="fw-bolder mb-3">Khóa học Pro</h4>
        <div class="row">
            @foreach ($course_pro as $item)
            @php
                // dd($item->bill_learning->first())
            @endphp
                <div class="col-lg-3 mb-3">
                <a href="{{route('course',['id'=>$item->Id_Course])}}" class="card border-0 text-decoration-none hover-product mb-4">
                    <div class="rounded-4 overflow-hidden mb-2 position-relative">
                        <img src="{{asset('uploads/courses/'.$item->Image)}}" class="card-img-top w-100" alt="...">
                        <div
                            class="d-flex justify-content-center align-items-center position-absolute top-0 bottom-0 start-0 end-0 bg-dark bg-opacity-50 item-hover">
                            <button class="btn btn-light rounded-5 fs-6 nut-hover">
                                Xem khóa học
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <h5 class="card-title mb-3 fs-6 text-truncate">{{$item->Title}}</h5>
                        <div class="d-flex gap-3">
                            <p class="text-secondary fs-6"><del>{{number_format($item->Price,2,',','.')}}đ</del></p>
                            <p class="text-danger fs-6 fw-semibold">{{number_format($item->Price,2,',','.')}}đ</p>
                        </div>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="container-xxl">
        <h4 class="fw-bolder mb-3">Khóa học miễn phí</h4>
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
    <section class="py-4" style="background-color: rgba(244, 140, 6, 0.1);">
        <div class="container">
            <div class="d-flex align-items-center gap-5">
                <div class="w-50">
                    <h2>
                        Mọi thứ bạn có thể làm trong lớp học thực tế,
                        <span style="color: #F48C06;">bạn đều có thể làm với Skilline</span>
                    </h2>
                    <p class="text-secondary">
                        Phần mềm quản lý trường học của EDUVI giúp các trường học truyền thống và trực tuyến quản lý
                        lịch trình, điểm danh, thanh toán và lớp học ảo, tất cả trong một hệ thống dựa trên đám mây
                        an toàn.
                    </p>
                    <div>
                        <a class="text-body-tertiary fs-5" href="#">Tìm hiểu thêm</a>
                    </div>
                </div>
                <div class="w-50">
                    <img class="w-100" src="assets/images/banner-quang_cao.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <div style="height: 50px;"></div>
    <section class="container-xxl mb-4">
        <div class="row mt-5 ">
            <div class="col-lg-4">
                <div class="p-5 shadow position-relative">
                    <div class="d-flex justify-content-center" style="margin-top: -100px;">
                        <div class="rounded-circle fs-2 text-white d-flex justify-content-center align-items-center"
                            style="background-color: #5B72EE; width: 100px; height: 100px;">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                    </div>
                    <h3 class="fs-4 overflow-hidden d-flex align-items-center justify-content-center fw-semibold text-center my-3"
                        style="height: 57px;">
                        Online Billing, Invoicing, & Contracts
                    </h3>
                    <p class="overflow-hidden px-2 fs-6 text-secondary text-center mb-0" style="height: 72px;">
                        Simple and secure control of your organization’s financial and legal transactions. Send
                        customized invoices and contracts
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-5 shadow position-relative">
                    <div class="d-flex justify-content-center" style="margin-top: -100px;">
                        <div class="rounded-circle fs-2 text-white d-flex justify-content-center align-items-center"
                            style="background-color: #F48C06; width: 100px; height: 100px;">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                    </div>
                    <h3 class="fs-4 overflow-hidden d-flex align-items-center justify-content-center fw-semibold text-center my-3"
                        style="height: 57px;">
                        Easy Scheduling & Attendance Tracking
                    </h3>
                    <p class="overflow-hidden px-2 fs-6 text-secondary text-center mb-0" style="height: 72px;">
                        Schedule and reserve classrooms at one campus or multiple campuses. Keep detailed records of
                        student attendance
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-5 shadow position-relative">
                    <div class="d-flex justify-content-center" style="margin-top: -100px;">
                        <div class="rounded-circle fs-2 text-white d-flex justify-content-center align-items-center"
                            style="background-color: #29B9E7; width: 100px; height: 100px;">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <h3 class="fs-4 overflow-hidden d-flex align-items-center justify-content-center fw-semibold text-center my-3"
                        style="height: 57px;">
                        Customer Tracking
                    </h3>
                    <p class="overflow-hidden px-2 fs-6 text-secondary text-center mb-0" style="height: 72px;">
                        Automate and track emails to individuals or groups. Skilline’s built-in system helps
                        organize
                        your organization
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="container-xxl mb-4">
        <h4 class="fw-bolder mb-3">Sách Mới nhất</h4>
        <div class="row">
            @foreach ($homeProduct as $sp)
               <div class="col-lg-3 mb-3">
                <a href="{{route('product_detail',['id'=>$sp->Id_Product])}}" class="d-block text-decoration-none text-dark product_hover">
                    <div class="overflow-hidden rounded-3 mb-2">
                        <img class="w-100" src="{{asset('uploads/products/'.$sp->Image)}}" alt="">
                    </div>
                    <div class="fw-semibold fs-5">
                        {{$sp->Name}}
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <p class="text-secondary fs-6"><del>{{number_format($sp->Price, 2, ',', '.')}}đ</del></p>
                        <p class="text-danger fs-6 fw-semibold">{{number_format($sp->Price, 2, ',', '.')}}đ</p>
                    </div>
                </a>
            </div> 
            @endforeach
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
