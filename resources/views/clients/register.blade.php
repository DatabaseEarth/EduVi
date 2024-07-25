@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
    <form action="{{route('register_add')}}" method="post" class="w-100 d-flex justify-content-center">
        @csrf
        <div class="bg-white p-3 rounded-4" style="max-width: 600px;">
            <div class="d-flex overflow-auto flex-column justify-content-center align-items-center"
                style="padding: 48px; padding-top: 0px; padding-bottom:20px; height: 600px;">
                <a href="index.html" class="d-block rounded-2 overflow-hidden" style="width: 40px; height: 40px;">
                    <img class="w-100" src="images/logo.png" alt="">
                </a>
                <h1 class="fw-bold fs-3 mb-3">Đăng ký tài khoản Eduvi</h1>
                <p class="text-danger text-center" style="font-size: 13px;">
                    Mỗi người nên sử dụng riêng một tài khoản, tài khoản nhiều người sử dụng chung có thể sẽ bị
                    khóa.
                </p>
                <div class="text-start w-100 mb-3">
                    <label class="form-label fw-semibold">Tên của bạn?</label>
                    <input type="text" name="FullName" class="form-control rounded-5 px-3 py-2" style="background-color: #f5f5f5;"
                        placeholder="Họ và tên của bạn?" value="{{old('FullName')}}">
                    @error('FullName')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="text-start w-100 mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="text" name="Email" class="form-control rounded-5 px-3 py-2"
                        style="background-color: #f5f5f5;" placeholder="Địa chỉ email?" value="{{old('FullName')}}">
                     @error('Email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="password" name="Password" class="form-control rounded-5 px-3 py-2 mt-3"
                        style="background-color: #f5f5f5;" placeholder="Mật khẩu" value="{{old('FullName')}}">
                    @error('Password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="my-2 btn btn-info rounded-5 w-100 fw-semibold text-white py-2">Đăng ký</button>
                <div class="mt-4">
                    Bạn đã có tài khoản? <a href="{{route('login')}}" class="text-danger fw-semibold text-decoration-none">Đăng
                        nhập</a>
                </div>
                <p class="text-center mt-3 mb-0" style="font-size: 12px;">Việc bạn tiếp tục sử dụng trang
                    web
                    này
                    đồng
                    nghĩa bạn đồng ý
                    với <a href="#" class="text-dark">điều khoản sử dụng</a> của chúng
                    tôi</p>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>

    </script>
@endsection
