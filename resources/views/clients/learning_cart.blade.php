@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
    <form action="{{route('account_update')}}" method="post" class="container-xxl" enctype="multipart/form-data">
        @csrf
        <h3 class="mt-4">Tài khoản của bạn</h3>
        <div class="border border-2 border-primary-subtle mb-4" style="width: 250px"></div>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="" class="form-label fw-semibold mt-3">Họ và tên</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" name="FullName" value="{{$account->FullName}}" class="form-control" id="" placeholder="Họ và tên">
                </div>
                @error('FullName')
                    <div class="text-danger d-block">
                        {{$message}}
                    </div>
                @enderror
                <label for="" class="form-label fw-semibold mt-3">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="Email" value="{{$account->Email}}" disabled class="form-control" id="" placeholder="Email">
                </div>
                <label for="" class="form-label fw-semibold mt-3">Số điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <input type="number" name="Phone" value="{{$account->Phone}}" class="form-control" id="" placeholder="Số điện thoại">
                </div>
                @error('Phone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
                <label for="" class="form-label fw-semibold mt-3">Địa chỉ</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <input type="text" name="Address" value="{{$account->Address}}" class="form-control" id="" placeholder="Địa chỉ">
                    @error('Address')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="d-flex mb-3 gap-4 align-items-center">
                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center" style="height: 80px; width: 80px">
                        <img id="avatarPreview" src="{{asset('uploads/users/'.$account->Avatar)}}" class="w-100" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <label for="" class="form-label fw-semibold mt-3">Ảnh đại diện</label>
                        <input type="file" name="Avatar" class="form-control" value="{{$account->Avatar}}" onchange="previewAvatar(event)">
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-white">Cập nhật</button>
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
