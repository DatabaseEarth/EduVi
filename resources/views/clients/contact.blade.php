@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="container-xxl">
        <div class="row bg-white my-3">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-last">
                <iframe class="w-100 h-100 mb-3"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.2220813959939!2d106.62529127676237!3d10.853782858768128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1710575474426!5m2!1svi!2s"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                <p>
                    Mọi thắc mắc hoặc góp ý, quý khách vui lòng liên hệ trực tiếp với bộ phận chăm sóc khách hàng của
                    chúng tôi bằng cách điền đầy đủ thông tin vào form bên dưới
                </p>
                <form action="" method="post">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <label for="" class="form-label align-middle">
                                Họ tên
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                            <input class="form-control mb-3" type="text" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <label for="" class="form-label align-middle">
                                Email
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Email">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <label for="" class="form-label align-middle">
                                Điện thoại
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Số điện thoại">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <label for="" class="form-label align-middle">
                                Nội dung
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                            <div class="input-group mb-3">
                                <textarea name="" class="form-control" id="" cols="" rows="2"
                                    placeholder="Nội dung góp ý..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-lg-3 col-lg-9 col-12">
                            <button class="btn text-white" style="background-color: #F48C06">Gửi liên hệ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>

    </script>
@endsection
